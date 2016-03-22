<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:19
 */

namespace Admin\Controller;



class GoodsController extends AdminController{

    /**
     * 采购详情
     */
    public function procurementDetail() {
        $data['id'] = I('id');
        if ($data['id']) {
            $procurement = $this->getDgLogic()->getProcurementDetail($data);
            $this->assign('procurement', $procurement);
            $this->display('Goods/procurementDetail');
        }
    }

    /**
     * 采购单列表
     */
    public function procurementList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $count = $this->getDp()->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $procurementList = $this->getDgLogic()->getProcurementList(null, $page, $limit);

        $this->assign('procurementList', $procurementList);
        $this->assign('page', $show);
        $this->display('Goods/procurementList');
    }

    /**
     * 新建采购单
     */
    public function procurement() {
        if (IS_POST) {
            $procurement = I('post.procurement');
            $detailList = I('post.detailList');
            if (!$procurement || !$detailList) {
                return;
            }
            $result = $this->getDgLogic()->procurement($procurement, $detailList);
            if ($result) {
                $this->success('操作成功！', '');
            } else {
                $this->error('操作失败！');
            }
            \Think\Log::record('$procurement: ' . json_encode($procurement));

        } else {
            $goodsList = $this->getDg()->getDataList();
            $supplierList = $this->getDs()->getDataList();
            $partnerList = $this->getDPartner()->getDataList();
            $this->assign('partnerList', $partnerList);
            $this->assign('goodsList', $goodsList);
            $this->assign('supplierList', $supplierList);
            $this->display('Goods/procurement');
        }

    }


    public function addGoodsCode() {

        $goodsCodeList[] = array('code'=>'001', 'goods_id'=>1, 'supplier_id'=>3, 'warehouse_id'=>1);
        $goodsCodeList[] = array('code'=>'002', 'goods_id'=>1, 'supplier_id'=>3, 'warehouse_id'=>1);
        $goodsCodeList[] = array('code'=>'003', 'goods_id'=>1, 'supplier_id'=>3, 'warehouse_id'=>1);
        $goodsCodeList[] = array('code'=>'004', 'goods_id'=>2, 'supplier_id'=>4, 'warehouse_id'=>1);
        $goodsCodeList[] = array('code'=>'005', 'goods_id'=>2, 'supplier_id'=>4, 'warehouse_id'=>1);

        $result = $this->dgc->addAllData($goodsCodeList);
        dump($result);
    }

    public function addGoods() {

        $goodsList[] = array('goods_group_id'=>1, 'name'=>'乐me移动电源','norm'=>'安卓版', 'num'=>999);
        $goodsList[] = array('goods_group_id'=>1, 'name'=>'乐me移动电源','norm'=>'苹果版', 'num'=>699);

        $result = $this->dg->addAllData($goodsList);
        dump($result);
    }


    public function addGoodsGroup() {
        $goodsGroup['name'] = '乐me音箱';
        $goodsGroup['note'] = '新品上市';
        $result = $this->getDgg()->addData($goodsGroup);
        dump($result);
    }


    public function getDs() {
        return D('Admin/Supplier');
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

    public function getDgLogic() {
        return D('Admin/Goods', 'Logic');
    }

    public function getDp() {
        return D('Admin/Procurement');
    }

    public function getDpd() {
        return D('Admin/ProcurementDetail');
    }

    public function getDPartner() {
        return D('Admin/Partner');
    }
}