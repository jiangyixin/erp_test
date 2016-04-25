<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:19
 */

namespace Admin\Controller;


use Think\Log;
use Think\Page;

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
     * 编辑
     */
    public function procurementEdit() {
        if (IS_POST) {
            $procurement = I('post.procurement');
            $detailList = I('post.detailList');
            if (!$procurement || !$detailList) {
                return;
            }
            $result = $this->getDgLogic()->procurementEdit($procurement, $detailList);
            Log::record('---------' . json_encode($result));
            if ($result) {
                $this->success('操作成功！', 'procurementList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $data['id'] = I('id');
            if ($data['id']) {
                $procurement = $this->getDgLogic()->getProcurementDetail($data);
                $goodsList = $this->getDg()->getDataList();
                $supplierList = $this->getDs()->getDataList();
                $partnerList = $this->getDPartner()->getDataList();
                $this->assign('partnerList', $partnerList);
                $this->assign('goodsList', $goodsList);
                $this->assign('supplierList', $supplierList);
                $this->assign('procurement', $procurement);
                $this->display('Goods/procurementEdit');
            }
        }
    }

    /**
     * 删除采购详情-商品列表
     */
    public function procurementDetailDel() {
        $data['id'] = I('id');
        if ($data['id']) {
            $result['status'] = $this->getDpd()->delData($data);
        }
        if ($result) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
        // $this->ajaxReturn($result , 'json');
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
     * 修改订购单状态
     */
    public function updateStatus() {
        $procurement = I('post.procurement');
        if ($procurement['id'] && $procurement['status']) {
            $result = $this->getDgLogic()->updateProcurementStatus($procurement);
            if ($result) {
                $this->success('更新成功，页面即将自动刷新！', 'procurementList');
            } else {
                $this->error('更新失败');
            }
        }
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
                $this->success('操作成功！', 'procurementList');
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

    /**
     * 商品分组列表
     */
    public function goodsGroupList() {
        $goodsGroupList = $this->getDgg()->getDataList();
        $this->assign('goodsGroupList', $goodsGroupList);
        $this->display('Goods/goodsGroupList');
    }

    /**
     * 商品分组信息
     */
    public function goodsGroupInfo() {
        $data['id'] = I('get.id');
        if ($data['id']) {
            $goodsGroup = $this->getDgg()->checkData($data);
            $this->assign('goodsGroup', $goodsGroup);
        }
        $this->display('Goods/goodsGroupEdit');
    }

    /**
     * 删除商品分组
     */
    public function goodsGroupDel() {
        $data['id'] = I('id');
        $ids = I('request.ids');
        $result = array();
        if ($ids) {
            foreach ($ids as $id) {
                $result[] = $this->getDgg()->delData(array('id'=>$id));
            }
        }
        if ($data['id']) {
            $result[] = $this->getDgg()->delData($data);
        }
        if ($result && array_product($result)) {
            $this->success('删除成功，页面即将自动刷新！', 'goodsGroupList');
        } else {
            $this->error('删除失败');
        }

        // $this->ajaxReturn($result, 'json');
    }

    /**
     * 编辑商品分组信息
     */
    public function goodsGroupEdit() {
        $group = I('post.');
        if ($group['id']) {
            $result = $this->getDgg()->editDataById($group);
        } else {
            $result = $this->getDgg()->addData($group);
        }
        if ($result) {
            $this->success('更新成功', 'goodsGroupList');
        } else {
            $this->error('更新失败');
        }
    }

    /**
     * 商品列表
     */
    public function goodsList() {
        $goodsList = $this->getDgLogic()->getGoodsList();
        $this->assign('goodsList', $goodsList);
        $this->display('Goods/goodsList');
    }

    /**
     * 商品信息
     */
    public function goodsInfo() {
        $data['id'] = I('get.id');
        if ($data['id']) {
            $goods = $this->getDg()->checkData($data);
            $this->assign('goods', $goods);
        }
        $groupList = $this->getDgg()->getDataList();
        $this->assign('groupList', $groupList);
        $this->display('Goods/goodsEdit');
    }

    /**
     * 删除商品
     */
    public function goodsDel() {
        $data['id'] = I('id');
        $ids = I('request.ids');
        $result = array();
        if ($ids) {
            foreach ($ids as $id) {
                $result[] = $this->getDg()->delData(array('id'=>$id));
            }
        }
        if ($data['id']) {
            $result[] = $this->getDg()->delData($data);
        }
        if ($result && array_product($result)) {
            $this->success('删除成功，页面即将自动刷新！', 'goodsList');
        } else {
            $this->error('删除失败');
        }

    }

    /**
     * 编辑商品信息
     */
    public function goodsEdit() {
        $group = I('post.');
        if ($group['id']) {
            $result = $this->getDg()->editDataById($group);
        } else {
            $result = $this->getDg()->addData($group);
        }
        if ($result) {
            $this->success('更新成功', 'goodsList');
        } else {
            $this->error('更新失败');
        }
    }

    public function getDs() {
        return D('Admin/Supplier');
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

    public function getDPartner() {
        return D('Admin/Partner');
    }
}