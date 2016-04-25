<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30 0030
 * Time: 下午 2:03
 */

namespace Admin\Controller;


use Think\Log;
class SellController extends AdminController{

    /**
     * 销售统计
     */
    public function sellStatistical() {
        if (IS_POST) {
            // 按日期查询
            $time = I('post.time');
            $statisticalList =  D('Admin/Statistical', 'Logic')->salesStatisticalByDate($time);
            $data['list'] = $statisticalList;
            $data['status'] = 1;
            $this->ajaxReturn($data, 'json');
        } else {
            $statisticalList =  D('Admin/Statistical', 'Logic')->salesStatistical();
            $warehouseList = D('Admin/Warehouse')->getDataList();
            $goodsList = D('Admin/Goods')->getDataList();
            $this->assign('warehouseList', $warehouseList);
            $this->assign('goodsList', $goodsList);
            $this->assign('statisticalList', $statisticalList);
            $this->display('Sell/sellStatistical');
        }
    }

    /**
     * 新增销售
     */
    public function sell() {
        if (IS_POST) {
            $sell = I('post.sell');
            $detailList = I('post.detailList');
            if (!$sell || !$detailList) {
                return;
            }
            $result = $this->getDgLogic()->sell($sell, $detailList);
            if ($result) {
                $this->success('操作成功！', 'sellList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $goodsList = D('Admin/Stock', 'Logic')->getGoodsStockList();
            $warehouseList = $this->getDw()->getDataList();
            $partnerList = $this->getDPartner()->getDataList();
            $this->assign('partnerList', $partnerList);
            $this->assign('goodsList', $goodsList);
            $this->assign('warehouseList', $warehouseList);
            $this->display('Sell/sell');
        }
    }

    /**
     * 编辑销售订单
     */
    public function sellEdit() {
        if (IS_POST) {
            $sell = I('post.sell');
            $detailList = I('post.detailList');
            if (!$sell || !$detailList) {
                return;
            }
            $result = $this->getDgLogic()->sellEdit($sell, $detailList);
            if ($result) {
                $this->success('操作成功！', 'sellList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $data['id'] = I('id');
            if ($data['id']) {
                $sell = $this->getDgLogic()->getSellDetail($data);
                $goodsList = D('Admin/Stock', 'Logic')->getGoodsStockList();
                $warehouseList = $this->getDw()->getDataList();
                $partnerList = $this->getDPartner()->getDataList();
                $this->assign('sell', $sell);
                $this->assign('partnerList', $partnerList);
                $this->assign('goodsList', $goodsList);
                $this->assign('warehouseList', $warehouseList);
                $this->display('Sell/sellEdit');
            }
        }
    }

    /**
     * 销售单列表
     */
    public function sellList() {
        $page = I('get.p', 1);
        $limit = 10;
        $count = $this->getDsell()->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $sellList = $this->getDgLogic()->getSellList(null, $page, $limit);

        $this->assign('sellList', $sellList);
        $this->assign('page', $show);
        $this->display('Sell/sellList');
    }

    /**
     * 修改销售订单状态
     */
    public function updateSellStatus() {
        $sell = I('post.sell');
        if ($sell.id && $sell.status) {
            $result = $this->getDgLogic()->updateSellStatus($sell);
            if ($result) {
                $this->success('更新成功，页面即将自动刷新！', 'sellList');
            } else {
                $this->error('更新失败');
            }
        }
    }

    /**
     * 销售详情
     */
    public function sellDetail() {
        $data['id'] = I('id');
        if ($data['id']) {
            $sell = $this->getDgLogic()->getSellDetail($data);
            $this->assign('sell', $sell);
            $this->display('Sell/sellDetail');
        }
    }

    public function getDw() {
        return D('Admin/Warehouse');
    }

    public function getDg() {
        return D('Admin/Goods');
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

    public function getDsell() {
        return D('Admin/Sell');
    }

    public function getDsellDetail() {
        return D('Admin/SellDetail');
    }

    public function getDPartner() {
        return D('Admin/Partner');
    }

}