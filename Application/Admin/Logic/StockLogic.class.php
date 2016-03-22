<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:38
 */

namespace Admin\Logic;


use Think\Model;

class StockLogic extends Model{

    private $ds = null;
    private $dg = null;
    private $dw = null;
    private $dgc = null;
    private $dsl = null;
    private $dsld = null;

    protected function _initialize() {
        $this->ds = D('Admin/Stock');
        $this->dg = D('Admin/Goods');
        $this->dw = D('Admin/Warehouse');
        $this->dgc = D('Admin/GoodsCode');
        $this->dsl = D('Admin/StockLog');
        $this->dsld = D('Admin/StockLogDetail');
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
     * @return mixed 库存列表
     */
    public function getStockList($data) {
        $stockList = $this->ds->getDataList($data);

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
        foreach ($stockLog['detailList'] as $key=>$item) {
            $stockLog['detailList'][$key]['goods'] = $this->dg->checkData(array('id'=>$item['goods_id']));
            $stockLog['detailList'][$key]['warehouse'] = $this->dw->checkData(array('id'=>$item['warehouse_id']));
        }
        return $stockLog;
    }

    /**
     * 按条件获取库存操作记录
     * @return array stockLogList
     */
    public function purchaseRecords($str) {
        /*
        $time1 = date("Y-m-d", time());
        $time2 = date("Y-m-d", (time() + 3600*24));
        $str = $time1 ? "time > '$time1' AND " : "";
        $str .= $time2 ? " time < '$time2' AND " : "";
        $str .= ' status = 1 ';
        */
        \Think\Log::record('str: '.$str);
        $stockLogList = $this->dsl->getDataList($str);
        foreach ($stockLogList as $key=>$item) {
            $stockLogList[$key]['detail'] = $this->dsld->getDataList('stock_log_id='.$item['id']);
            $dSupplier = D('Admin/Supplier');
            $stockLogList[$key]['supplier'] = $dSupplier->checkData('id='.$item['in_transfer_out']);
        }
        return $stockLogList;
    }

    /**
     * 商品出库
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $detailList array(二维数组) [goods_id、num、warehouse_id、code_list]
     * @return array 操作结果
     */
    public function sales($stockLog, $detailList) {
        // 库存减少 stock
        // code 减少
        // 记录 stock_log
        // 详情 stock_log_detail
        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $stockLog['status'] = -1;    // -1表示出库
        $result[] = $stockLogId = $this->dsl->addData($stockLog);
        \Think\Log::record('--detailList: '.json_encode($detailList));
        foreach ($detailList as $key=>$item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $item['warehouse_id'];
            $stock = $this->ds->checkData($data);
            // 更新库存（stock）记录
            if ($stock) {
                $stock['num'] = $stock['num'] - $item['num'];
                if ($stock['num'] < 0) {
                    M()->rollback();
                    return false;
                }
                \Think\Log::record('--stock: '.json_encode($stock));
                $result[] = $this->ds->editDataById($stock);
            } else {
            }
            // 插入库存详情（stock_log_detail）
            if ($stockLogId) {
                $detailList[$key]['stock_log_id'] = $stockLogId;
                $result[] = $this->dsld->addData($detailList[$key]);
            }
            // 插入或更新商品编码（code）
            $newCodeList = array_count_values($item['code_list']);
            foreach ($newCodeList as $key=>$vo) {
                $code = $this->dgc->checkData('code='.$key);
                if ($code) {
                    $code['num'] = $code['num'] - $vo;
                    $result[] = $this->dgc->editDataById($code);
                } else {
                }
            }

        }
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
     * 商品入库     status=1
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $detailList array(二维数组) [goods_id、num、warehouse_id、code_list]
     * @return array 操作结果
     */
    public function purchase($stockLog, $detailList) {

        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $stockLog['status'] = 1;    // 1表示入库
        $result[] = $stockLogId = $this->dsl->addData($stockLog);

        foreach ($detailList as $key=>$item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $item['warehouse_id'];
            $stock = $this->ds->checkData($data);
            // 更新或插入库存（stock）记录
            if ($stock) {
                $stock['num'] = $stock['num'] + $item['num'];
                $result[] = $this->ds->editDataById($stock);
            } else {
                $stock = array('goods_id'=>$item['goods_id'], 'warehouse_id'=>$data['warehouse_id'], 'num'=>$item['num']);
                $result[] = $this->ds->addData($stock);
            }
            // 插入库存详情（stock_log_detail）
            if ($stockLogId) {
                $detailList[$key]['stock_log_id'] = $stockLogId;
                $result[] = $this->dsld->addData($detailList[$key]);
            }
            // 插入或更新商品编码（code）
            $newCodeList = array_count_values($item['code_list']);
            foreach ($newCodeList as $key=>$vo) {
                $code = $this->dgc->checkData('code='.$key);
                if ($code) {
                    $code['num'] = $code['num'] + $vo;
                    $result[] = $this->dgc->editDataById($code);
                } else {
                    $code = array('code'=>$key, 'goods_id'=>$item['goods_id'], 'supplier_id'=>$stockLog['in_transfer_out'], 'num'=>$vo);
                    $result[] = $this->dgc->addData($code);
                }
            }

        }
        // 判断result，提交事务或回滚
        if (array_product($result) && $result) {
            M()->commit();
            return true;
        } else {
            M()->rollback();
            return false;
        }

    }

}