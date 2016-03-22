<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:38
 */

namespace Stock\Logic;


use Think\Model;

class StockLogic extends Model{

    private $ds = null;
    private $dgc = null;
    private $dsl = null;
    private $dsld = null;

    protected function _initialize() {
        $this->ds = D('Admin/Stock');
        $this->dgc = D('Admin/GoodsCode');
        $this->dsl = D('Admin/StockLog');
        $this->dsld = D('Admin/StockLogDetail');
    }

    /**
     * 按条件获取库存操作记录
     * @return array stockLogList
     */
    public function purchaseRecords($time2) {

        $time1 = date("Y-m-d", time());
        $time2 = date("Y-m-d", (time() + 3600*24));

        $str = $time1 ? "time > '$time1' AND " : "";
        $str .= $time2 ? " time < '$time2' AND " : "";
        $str .= ' status = 1 ';

        \Think\Log::record('str: '.$str);
        $stockLogList = $this->dsl->getDataList($str);
        foreach ($stockLogList as $key=>$item) {
            $stockLogList[$key]['detail'] = $this->dsld->getDataList('stock_log_id='.$item['id']);
            $dsupplier = D('Admin/Supplier');
            $stockLogList[$key]['supplier'] = $dsupplier->checkData('id='.$item['in_transfer_out']);
        }
        return $stockLogList;
    }

    /**
     * 商品出库
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $paramList array(二维数组) [goods_id、num、code_list]
     * @return array 操作结果
     */
    public function sales($stockLog, $paramList) {
        // 库存减少 stock
        // code 减少
        // 记录 stock_log
        // 详情 stock_log_detail

        $start_time=microtime(true);
        \Think\Log::record('start_time: '.$start_time);
        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $result[] = $stockLogId = $this->dsl->addData($stockLog);

        foreach ($paramList as $item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $stockLog['warehouse_id'];
            $stock = $this->ds->checkData($data);
            // 更新库存（stock）记录
            if ($stock) {
                $stock['num'] = $stock['num'] - $item['num'];
                $result[] = $this->ds->editDataById($stock);
            } else {
            }
            // 插入库存详情（stock_log_detail）
            if ($stockLogId) {
                $stockLogDetail = array('stock_log_id'=>$stockLogId, 'code_list'=>implode(',', $item['code_list']), 'goods_id'=>$item['goods_id'], 'num'=>$item['num']);
                $result[] = $this->dsld->addData($stockLogDetail);
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
        if (array_product($result)) {
            M()->commit();
            return ture;
        } else {
            M()->rollback();
            return false;
        }
        // return $result;
        \Think\Log::record('result: '.json_encode($result));
        $end_time=microtime(true);
        \Think\Log::record('end_time: '.$end_time);
        $total=$end_time-$start_time;
        \Think\Log::record('total: '.$total);

    }

    /**
     * 商品入库
     * @param $stockLog array[warehouse_id、partner、in_transfer_out、status、note]
     * @param $paramList array(二维数组) [goods_id、num、code_list]
     * @return array 操作结果
     */
    public function purchase($stockLog, $paramList) {
        $start_time=microtime(true);
        \Think\Log::record('start_time: '.$start_time);
        $result = array();
        // 开启事务
        M()->startTrans();
        // 插入库存记录（stock_log）
        $result[] = $stockLogId = $this->dsl->addData($stockLog);

        foreach ($paramList as $item) {
            $data['goods_id'] = $item['goods_id'];
            $data['warehouse_id'] = $stockLog['warehouse_id'];
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
                $stockLogDetail = array('stock_log_id'=>$stockLogId, 'code_list'=>implode(',', $item['code_list']), 'goods_id'=>$item['goods_id'], 'num'=>$item['num']);
                $result[] = $this->dsld->addData($stockLogDetail);
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
        if (array_product($result)) {
            M()->commit();
            return ture;
        } else {
            M()->rollback();
            return false;
        }
        // return $result;

        $end_time=microtime(true);
        \Think\Log::record('end_time: '.$end_time);
        $total=$end_time-$start_time;
        \Think\Log::record('total: '.$total);

    }

}