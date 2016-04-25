<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:38
 */

namespace Admin\Logic;


use Think\Log;
use Think\Model;

class StockLogic extends Model{

    private $ds = null;
    private $dg = null;
    private $dw = null;
    private $dsl = null;
    private $dsld = null;
    /*private $dsp = null;
    private $dss = null;
    private $dst = null;*/

    protected function _initialize() {
        $this->ds = D('Admin/Stock');
        $this->dg = D('Admin/Goods');
        $this->dw = D('Admin/Warehouse');
        $this->dsl = D('Admin/StockLog');
        $this->dsld = D('Admin/StockLogDetail');
        /*$this->dsp = D('Admin/StockPurchase');
        $this->dss = D('Admin/StockSales');
        $this->dst = D('Admin/StockTransfer');*/
    }

    /**
     * 获取商品和对应的库存列表
     * @param $data
     * @return mixed
     */
    public function getGoodsStockList($data) {
        $goodsList = $this->dg->getDataList($data);
        foreach ($goodsList as $key=>$item) {
            $goodsList[$key]['stockList'] = $this->ds->getDataList(array('goods_id'=>$item['id']));
        }
        return $goodsList;
    }

    /**
     * 获取库存清单
     * @param $data
     * @param $page
     * @param $limit
     * @return mixed 库存列表
     */
    public function getStockList($data, $page, $limit) {
        // $stockList = $this->ds->getDataList($data);
        $stockList = $this->ds->getPageList($data, $page, $limit);
        foreach ($stockList as $key=>$item) {
            $stockList[$key]['goods'] = $this->dg->checkData(array('id'=>$item['goods_id']));
            $stockList[$key]['warehouse'] = $this->dw->checkData(array('id' => $item['warehouse_id']));
            $stockList[$key]['total'] = $this->ds->where(array('goods_id' => $item['goods_id']))->sum('num');
        }
        return $stockList;
    }

    /**
     * 获取库存操作列表
     * @param $data 条件数据
     * @param $page 页码
     * @param $limit 条数
     * @return array 库存操作列表
     */
    public function getStockLogList($data, $page, $limit) {
        $stockLogList = $this->dsl->where($data)->order('id desc')->page($page.", $limit")->select();
        foreach ($stockLogList as $key=>$item) {
            $stockLogList[$key]['partner'] = D('Admin/partner')->checkData(array('id'=>$item['partner_id']));
        }
        return $stockLogList;
    }


    /**
     * 获取某一条库存操作详情
     * @param $data
     * @return bool 
     */
    public function getStockLogDetail($data) {
        $stockLog = $this->dsl->checkData($data);
        if (!$stockLog) {
            return false;
        }
        $stockLog['partner'] = D('Admin/Partner')->checkData(array('id'=>$stockLog['partner_id']));
        $stockLog['detailList'] = $this->dsld->getDataList(array('stock_log_id'=>$stockLog['id']));
        Log::record('--stockLog: ' . json_encode($stockLog));

        $stockLog['warehouse_out'] = $this->dw->checkData(array('id'=>$stockLog['warehouse_id_out']));
        $stockLog['warehouse_in'] = $this->dw->checkData(array('id'=>$stockLog['warehouse_id_in']));
        foreach ($stockLog['detailList'] as $key=>$item) {
            $stockLog['detailList'][$key]['goods'] = $this->dg->checkData(array('id'=>$item['goods_id']));
        }
        return $stockLog;
    }


    /**
     * 仓库调拨
     * @param $stockLog
     * @param $detailList
     * @return bool
     */
    public function transfer($stockLog, $detailList) {
        $result = array();
        // 开启事务
        M()->startTrans();
        $stockLog['no'] = time() . rand(100000,999999); // 生成随机订单编号
        $stockLog['status'] = 0;    // 0表示调拨
        $result[] = $stockLogId = $this->dsl->addData($stockLog);
        if (!$stockLogId) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key => $item) {
            $dataIn['goods_id'] = $dataOut['goods_id'] = $item['goods_id'];
            $dataIn['warehouse_id'] = $stockLog['warehouse_id_in'];
            $dataOut['warehouse_id'] = $stockLog['warehouse_id_out'];
            $stockIn = $this->ds->checkData($dataIn);
            $stockOut = $this->ds->checkData($dataOut);
            // 增加库存检查是否存在该记录
            if ($stockIn) {
                $stockIn['num'] = $stockIn['num'] + $item['num'];
                $result[] = $this->ds->editDataById($stockIn);
            } else {
                $stockIn = array('goods_id'=>$item['goods_id'], 'warehouse_id'=>$stockLog['warehouse_id_in'], 'num'=>$item['num']);
                $result[] = $this->ds->addData($stockIn);
            }
            // 减少库存检查是否超出最大数目
            $stockOut['num'] = $stockOut['num'] - $item['num'];
            if ($stockOut['num'] < 0) {
                M()->rollback();
                return false;
            }
            $result[] = $this->ds->editDataById($stockOut);

            $detailList[$key]['stock_log_id'] = $stockLogId;
        }
        // 插入调拨详情
        $result[] = $this->dsld->addAllData($detailList);
        // 判断result，提交事务或回滚
        if (array_product($result) && $result) {
            M()->commit();
            return true;
        } else {
            M()->rollback();
            return false;
        }
    }

    /**
     * 更新库存数量
     * @param $detailList
     * @return bool
     */
    public function updateStockNum($detailList) {
        Log::record('detailList--------' . json_encode($detailList));
        // M()->startTrans();
        foreach ($detailList as $key => $item) {
            $dataIn['goods_id'] = $dataOut['goods_id'] = $item['goods_id'];
            if ($item['warehouse_id_in']) {
                $dataIn['warehouse_id'] = $item['warehouse_id_in'];
            }
            if ($item['warehouse_id_out']) {
                $dataOut['warehouse_id'] = $item['warehouse_id_out'];
            }

            if ($dataIn['warehouse_id'] && $item['num'] > 0) {  // 增加库存
                $stockIn = $this->ds->checkData($dataIn);
                // 增加库存检查是否存在该记录
                if ($stockIn) {
                    $stockIn['num'] = $stockIn['num'] + $item['num'];
                    $result[] = $this->ds->editDataById($stockIn);
                } else {
                    $stockIn = array('goods_id'=>$item['goods_id'], 'warehouse_id'=>$item['warehouse_id_in'], 'num'=>$item['num']);
                    $result[] = $this->ds->addData($stockIn);
                }
            } else if ($dataOut['warehouse_id'] && $item['num'] > 0) {  // 减少库存
                $stockOut = $this->ds->checkData($dataOut);
                $stockOut['num'] = $stockOut['num'] - $item['num'];
                if ($stockOut['num'] < 0) {
                    // M()->rollback();
                    return false;
                }
                $result[] = $this->ds->editDataById($stockOut);
            }
        }
        // 判断result，提交事务或回滚
        if (array_product($result) && $result) {
            // M()->commit();
            return true;
        } else {
            // M()->rollback();
            return false;
        }
    }



    /**
     * 商品出库
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $detailList array(二维数组) [goods_id、num、warehouse_id、code_list]
     * @return bool 操作结果
     */
    /*public function sales($stockLog, $detailList) {
        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $stockLog['no'] = time() . rand(100000,999999); // 生成随机订单编号
        $stockLog['status'] = -1;    // -1表示出库
        $result[] = $stockLogId = $this->dsl->addData($stockLog);
        if (!$stockLogId) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key=>$item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $item['warehouse_id'];
            $stock = $this->ds->checkData($data);
            // 更新库存（stock）记录
            $stock['num'] = $stock['num'] - $item['num'];
            if ($stock['num'] < 0) {
                Log::record('-----------------库存不够！-----------------');
                M()->rollback();
                return false;
            }
            $result[] = $this->ds->editDataById($stock);

            // 插入库存详情（stock_log_sales）
            $detailList[$key]['stock_log_id'] = $stockLogId;
            // 插入或更新商品编码（code）

        }
        $result[] = $this->dss->addAllData($detailList);
        // 判断result，提交事务或回滚
        if (array_product($result) && $result) {
            M()->commit();
            return true;
        } else {
            M()->rollback();
            return false;
        }

    }*/


    /**
     * 商品入库     status=1
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $detailList array(二维数组) [goods_id、num、warehouse_id、code_list]
     * @return array 操作结果
     */
    /*public function purchase($stockLog, $detailList) {
        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $stockLog['no'] = time() . rand(100000,999999); // 生成随机订单编号
        $stockLog['status'] = 1;    // 1表示入库
        $result[] = $stockLogId = $this->dsl->addData($stockLog);
        if (!$stockLogId) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key=>$item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $item['warehouse_id'];
            $stock = $this->ds->checkData($data);
            // 更新或插入库存（stock）记录
            if ($stock) {
                $stock['num'] = $stock['num'] + $item['num'];
                $result[] = $this->ds->editDataById($stock);
            } else {
                $stock = array('goods_id'=>$item['goods_id'], 'warehouse_id'=>$item['warehouse_id'], 'num'=>$item['num']);
                $result[] = $this->ds->addData($stock);
            }
            // 插入库存详情（stock_log_purchase）
            $detailList[$key]['stock_log_id'] = $stockLogId;
        }
        $result[] = $this->dsp->addAllData($detailList);
        // 判断result，提交事务或回滚
        if (array_product($result) && $result) {
            M()->commit();
            return true;
        } else {
            M()->rollback();
            return false;
        }

    }*/



}