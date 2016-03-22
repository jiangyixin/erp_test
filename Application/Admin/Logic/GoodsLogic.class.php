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
            $procurement['count_num'] = 0;
            $procurement['count_price'] = 0;
            foreach ($procurement['detailList'] as $key => $item) {
                $procurement['detailList'][$key]['goods'] = $this->getDg()->checkData(array('id'=>$item['goods_id']));
                $procurement['detailList'][$key]['supplier'] = $this->getDs()->checkData(array('id'=>$item['supplier_id']));
                $procurement['count_num'] += $item['num'];
                $procurement['count_price'] += $item['num'] * $item['per_price'];
            }
        }
        return $procurement;
    }

    /**
     * 获取采购列表信息
     * @param $data
     * @param $page
     * @param $limit
     * @return mixed
     */
    public function getProcurementList($data, $page, $limit) {
        $procurementList = $this->getDp()->where($data)->page($page.", $limit")->select();
        foreach ($procurementList as $key=>$item) {
            $procurementList[$key]['partner'] = D('Admin/Partner')->checkData(array('id'=>$item['partner_id']));
        }
        return $procurementList;
    }

    /**
     * 插入采购单和采购详情
     * @param $procurement
     * @param $detailList
     * @return bool|string
     */
    public function procurement($procurement, $detailList) {
        M()->startTrans();
        // 随机码：当前时间 加上 6位随机数字
        $procurement['coding'] = time() . rand(100000,999999);
        // 状态码  -1：采购失败、 0：采购计划中、 1：采购执行中、 2：到货接收、 3：校验入库、 4：采购完成
        $procurement['status'] = 0;
        $procurement_id = $this->getDp()->addData($procurement);
        if (!$procurement) {
            return false;
        }
        foreach ($detailList as $key=>$item) {
            $detailList[$key]['procurement_id'] = $procurement_id;
        }
        $result = $this->getDpd()->addAll($detailList);
        if ($result) {
            M()->commit();
        } else {
            M()-$this->rollback();
        }
        return $result;
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

    public function getDg() {
        return D('Admin/Goods');
    }

    public function getDgc() {
        return D('Admin/GoodsCode');
    }

    public function getDgg() {
        return D('Admin/GoodsGroup');
    }
}