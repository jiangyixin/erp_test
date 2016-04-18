<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:01
 */

namespace Admin\Logic;


use Common\Model\CommonModel;
use Think\Log;

class GoodsLogic extends CommonModel{
    /**
     * 获取一条采购详情
     * @param $data
     * @return mixed
     */
    public function getProcurementDetail($data) {
        $procurement = $this->getDp()->checkData($data);
        if ($procurement) {
            $procurement['detailList'] = $this->getDpd()->getDataList(array('procurement_id'=>$procurement['id']));
            $procurement['partner'] = D('Admin/Partner')->checkData(array('id'=>$procurement['partner_id']));
            $procurement['supplier'] = $this->getDs()->checkData(array('id'=>$procurement['supplier_id']));
            $procurement['count_num'] = 0;
            $procurement['count_price'] = 0;
            foreach ($procurement['detailList'] as $key => $item) {
                $procurement['detailList'][$key]['goods'] = $this->getDg()->checkData(array('id'=>$item['goods_id']));
                $procurement['count_num'] += $item['num'];
                $procurement['count_price'] += $item['num'] * $item['per_price'];
            }
        }
        return $procurement;
    }

    /**
     * 获取一条销售详情
     * @param $data
     * @return mixed
     */
    public function getSellDetail($data) {
        $sell = $this->getDsell()->checkData($data);
        if ($sell) {
            $sell['detailList'] = $this->getDsellDetail()->getDataList(array('sell_id'=>$sell['id']));
            $sell['partner'] = D('Admin/Partner')->checkData(array('id'=>$sell['partner_id']));
            $sell['warehouse_out'] = $this->getDw()->checkData(array('id'=>$sell['warehouse_id_out']));
            $sell['count_num'] = 0;
            $sell['count_price'] = 0;
            foreach ($sell['detailList'] as $key => $item) {
                $sell['detailList'][$key]['goods'] = $this->getDg()->checkData(array('id'=>$item['goods_id']));
                $sell['count_num'] += $item['num'];
                $sell['count_price'] += $item['num'] * $item['per_price'];
                $sell['detailList'][$key]['total'] = D('Admin/Stock')->where(array('goods_id'=>$sell['detailList'][$key]['goods_id'], 'warehouse_id'=>$sell['warehouse_id_out']))->getField('num');
            }
        }
        return $sell;
    }

    /**
     * 获取采购列表信息
     * @param $data
     * @param $page
     * @param $limit
     * @return mixed
     */
    public function getProcurementList($data, $page, $limit) {
        $procurementList = $this->getDp()->where($data)->order('id desc')->page($page.", $limit")->select();
        foreach ($procurementList as $key=>$item) {
            $procurementList[$key]['partner'] = D('Admin/Partner')->checkData(array('id'=>$item['partner_id']));
            $procurementList[$key]['num'] = $this->getDpd()->where(array('procurement_id'=>$item['id']))->count('id');
        }
        return $procurementList;
    }

    /**
     * 获取销售列表信息
     * @param $data
     * @param $page
     * @param $limit
     * @return mixed
     */
    public function getSellList($data, $page, $limit) {
        $sellList = $this->getDsell()->where($data)->order('id desc')->page($page . ", $limit")->select();
        foreach ($sellList as $key => $item) {
            $sellList[$key]['partner'] = D('Admin/Partner')->checkData(array('id'=>$item['partner_id']));
        }
        return $sellList;
    }

    /**
     * 插入和采购单和采购详情
     * @param $procurement
     * @param $detailList
     * @return bool|string
     */
    public function procurement($procurement, $detailList) {
        M()->startTrans();
        // 随机码：当前时间 加上 6位随机数字
        $procurement['no'] = time() . rand(100000,999999);
        // 状态码  -1：采购失败、 0：采购计划中、 1：采购执行中、 2：到货接收、 3：校验入库
        $procurement['status'] = 0;
        $procurement['warehouse_id_in'] = 1;
        $procurement_id = $this->getDp()->addData($procurement);
        if (!$procurement_id) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key=>$item) {
            $detailList[$key]['procurement_id'] = $procurement_id;
        }
        $result = $this->getDpd()->addAllData($detailList);
        if ($result === false) {
            M()->rollback();
            return false;
        } else {
            M()->commit();
            return true;
        }
    }

    /**
     * 编辑采购订单   不可修改状态码为3(已入库)
     * @param $procurement
     * @param $detailList
     * @return bool
     */
    public function procurementEdit($procurement, $detailList) {
        $dbProcurement = $this->getDp()->checkData(array('id'=>$procurement['id']));
        if (!$dbProcurement || $dbProcurement['status'] == 3) { // 已入库或不存在的订单号
            return false;
        }
        if ($procurement['status'] == 3) {
            return false;
        }
        M()->startTrans();
        $result = $this->getDp()->editDataById($procurement);
        if ($result === false) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key => $item) {
            if ($item['id']) {
                $result = $this->getDpd()->editDataById($item);
            } else {
                $item['procurement_id'] = $procurement['id'];
                $result = $this->getDpd()->addData($item);
            }
            if ($result === false) {
                M()->rollback();
                return false;
            }
        }
        if ($result === false) {
            M()->rollback();
            return false;
        } else {
            M()->commit();
            return true;
        }

    }

    /**
     * 插入销售单和销售详情
     * @param $sell
     * @param $detailList
     * @return bool|string
     */
    public function sell($sell, $detailList) {
        M()->startTrans();
        // 随机码：当前时间 加上 6位随机数字
        $sell['no'] = time() . rand(100000,999999);
        // 状态码  -1：取消销售单、 0：生成销售单、 1：出仓完成销售
        $sell['status'] = 0;
        $sell_id = $this->getDsell()->addData($sell);
        if (!$sell_id) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key => $item) {
            $detailList[$key]['sell_id'] = $sell_id;
        }
        $result = $this->getDsellDetail()->addAllData($detailList);
        if ($result) {
            M()->commit();
        } else {
            M()->rollback();
        }
        return $result;
    }

    /**
     * 编辑销售单和销售详情
     * @param $sell
     * @param $detailList
     * @return bool
     */
    public function sellEdit($sell, $detailList) {
        $dbSell = $this->getDsell()->checkData(array('id' => $sell['id']));
        if (!$dbSell || $dbSell['status'] == 1) { // 已出库库或不存在的订单号
            return false;
        }
        if ($sell['status'] == 1) {
            return false;
        }
        M()->startTrans();
        $result = $this->getDsell()->editDataById($sell);
        if ($result === false) {
            M()->rollback();
            return false;
        }
        foreach ($detailList as $key => $item) {
            if ($item['id']) {
                $result = $this->getDsellDetail()->editDataById($item);
            } else {
                $item['sell_id'] = $sell['id'];
                $result = $this->getDsellDetail()->addData($item);
            }
            if ($result === false) {
                M()->rollback();
                return false;
            }
        }
        if ($result === false) {
            M()->rollback();
            return false;
        } else {
            M()->commit();
            return true;
        }
    }


    /**
     * 修改采购单状态
     * @param $procurement
     * @return mixed
     */
    public function updateProcurementStatus($procurement) {
        Log::record('log_procurement: ' . json_encode($procurement));
        $paramProcurement = $procurement;
        if ($procurement['status'] == 3) {  // 修改库存
            $procurement = $this->getDp()->checkData(array('id'=>$procurement['id']));
            // $stockLog = array('no'=>$procurement['no'], 'title'=>$procurement['title'], 'partner_id'=>$procurement['partner_id'], 'note'=>$procurement['note']);
            $pDetailList = $this->getDpd()->getDataList(array('procurement_id'=>$procurement['id']));
            $detailList = array();
            foreach ($pDetailList as $key => $item) {
                $detailList[] = array('goods_id' => $item['goods_id'], 'num' => $item['num'], 'warehouse_id_in'=>$procurement['warehouse_id_in']);
            }
            // $result = $this->getDsLogic()->purchase($stockLog, $detailList);
            M()-$this->startTrans();
            $result = $this->getDsLogic()->updateStockNum($detailList);
            if ($result) {
                $result = $this->getDp()->editDataById($paramProcurement);
            }
            if ($result) {
                M()->commit();
            } else {
                M()->rollback();
            }
        } else {
            $result = $this->getDp()->editDataById($procurement);
        }
        return $result;
    }

    /**
     *
     * @param $sell
     * @return mixed
     */
    public function updateSellStatus($sell) {
        $paramSell = $sell;
        if ($sell['status'] == 1) { //修改库存
            $sell = $this->getDsell()->checkData(array('id' => $sell['id']));
            // $stockLog = array('title'=>$sell['title'], 'partner_id'=>$sell['partner_id'], 'note'=>$sell['note']);
            $sDetailList = $this->getDsellDetail()->getDataList(array('sell_id'=>$sell['id']));
            $detailList = array();
            foreach ($sDetailList as $key => $item) {
                $detailList[] = array('goods_id' => $item['goods_id'], 'num' => $item['num'], 'warehouse_id_out' => $sell['warehouse_id_out']);
            }
            // $result = $this->getDsLogic()->sales($stockLog, $detailList);
            M()-$this->startTrans();
            $result = $this->getDsLogic()->updateStockNum($detailList);
            if ($result) {
                $result = $this->getDsell()->editDataById($paramSell);
            }
            if ($result) {
                M()->commit();
            } else {
                M()->rollback();
            }
        } else {
            $result = $this->getDsell()->editDataById($sell);
        }
        return $result;
    }

    /**
     * 分页获取商品列表
     * @param $data
     * @param $page
     * @param $limit
     * @return mixed
     */
    public function getGoodsList($data, $page, $limit) {
        $goodsList = $this->getDg()->where($data)->page($page.", $limit")->select();
        foreach ($goodsList as $key=>$item) {
            $goodsList[$key]['group'] = $this->getDgg()->checkData(array('id'=>$item['goods_group_id']));
        }
        return $goodsList;
    }

    public function getDsLogic() {
        return D('Admin/Stock', 'Logic');
    }

    public function getDs() {
        return D('Admin/Supplier');
    }

    public function getDp() {
        return D('Admin/Procurement');
    }

    public function getDpd() {
        return D('Admin/ProcurementDetail');
    }

    public function getDsell() {
        return D('Admin/Sell');
    }

    public function getDsellDetail() {
        return D('Admin/SellDetail');
    }

    public function getDg() {
        return D('Admin/Goods');
    }

    public function getDgc() {
        return D('Admin/GoodsCode');
    }

    public function getDgg() {
        return D('Admin/GoodsGroup');
    }

    public function getDw() {
        return D('Admin/Warehouse');
    }
}