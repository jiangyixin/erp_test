<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 上午 9:54
 */

namespace Admin\Controller;


class SupplierController extends AdminController{

    /**
     * 供应商管理首页『供应商列表』
     */
    public function index() {
        $supplierList = $this->getDsLogic()->getSupplierListAndLinkmanList();
        $this->assign('supplierList', $supplierList);
        $this->display('Supplier/index');
    }

    /**
     * 供应商详细信息
     */
    public function supplierInfo() {
        $data['id'] = I('id');
        $supplier = $this->getDsLogic()->getSupplierAndLinkmanList($data);
        $this->assign('supplier', $supplier);
        $way = $_GET['way'];    // show or edit or add
        switch ($way) {
            case 'show':
                $this->display('Supplier/supplierInfo');
                break;
            case 'edit':
                $supplierGroup = $this->getDsg()->getDataList();
                $this->assign('supplierGroup', $supplierGroup);
                $this->display('Supplier/supplierEdit');
                break;
        }
    }

    /**
     * 修改供应商和联系人信息
     */
    public function supplierEdit() {
        $supplier = I('post.supplier');
        $linkmanList = I('post.linkmanList');
        $result1 = $this->getDsLogic()->editSupplierAndLinkmanList($supplier, $linkmanList);
        if ($result1) {
            $result['status'] = 1;
        } else {
            $result['status'] = 0;
        }
        $this->ajaxReturn($result , 'json');
    }

    /**
     * 删除供应商以及当前供应商所有联系人
     */
    public function supplierDel() {
        $data['id'] = I('id');
        $ids = I('request.ids');
        $result = array();
        if ($ids) {
            foreach ($ids as $id) {
                $result[] = $this->getDs()->delData(array('id'=>$id));
                $result[] = $this->getDsl()->delData(array('supplier_id'=>$id));
            }
        }
        if ($data['id']) {
            $result[] = $this->getDs()->delData($data);
            $result[] = $this->getDsl()->delData(array('supplier_id'=>$data['id']));
        }
        if ($result && array_product($result)) {
            $this->success('删除成功，页面即将自动刷新！', 'index');
        } else {
            $this->error('删除失败');
        }
    }

    /**
     * 从供应商列表删除联系人
     */
    public function linkmanDel() {
        $data['id'] = I('id');
        $result['status'] = 0;
        if ($data['id']) {
            $result['status'] = $this->getDsl()->delData($data);
        }
        $this->ajaxReturn($result , 'json');
    }

    /**
     * 联系人列表
     */
    public function linkmanList() {

        $keyword = I('get.keyword');

        $linkmanList = $this->getDsLogic()->getLinkmanList($keyword);
        $this->assign('linkmanList', $linkmanList);
        $this->display('Supplier/linkmanList');
    }

    /**
     * 联系人分组列表
     */
    public function groupList() {
        $supplierGroupList = $this->getDsg()->getDataList();
        $this->assign('supplierGroupList', $supplierGroupList);
        $this->display('Supplier/groupList');
    }

    /**
     * 返回单个供应商信息
     */
    public function groupInfo() {
        $data['id'] = I('get.id');
        if ($data['id']) {
            $group = $this->getDsg()->checkData($data);
            $this->assign('group', $group);
        }
        $this->display('Supplier/groupEdit');
    }


    /**
     * 编辑和添加供应商分组
     */
    public function groupEdit() {
        $group = I('post.');
        if ($group['id']) {
            $result = $this->getDsg()->editDataById($group);
        } else {
            $result = $this->getDsg()->addData($group);
        }
        if ($result) {
            // $this->display('Supplier/groupList');
            $this->success('更新成功', 'groupList');
        } else {
            $this->error('更新失败');
        }

    }

    /**
     * 删除供应商分组
     */
    public function groupDel() {
        $data['id'] = I('id');
        $ids = I('request.ids');
        $result = array();
        if ($ids) {
            foreach ($ids as $id) {
                $result[] = $this->getDsg()->delData(array('id'=>$id));
            }
        }
        if ($data['id']) {
            $result[] = $this->getDsg()->delData($data);
        }
        if ($result && array_product($result)) {
            $this->success('删除成功，页面即将自动刷新！', 'groupList');
        } else {
            $this->error('删除失败');
        }

        // $this->ajaxReturn($result, 'json');
    }


    // get方法
    /**
     * @return \Model|\Think\Model
     */
    public function getDs() {
        return D('Admin/Supplier');
    }

    public function getDsl() {
        return D('Admin/SupplierLinkman');
    }

    public function getDsg() {
        return D('Admin/SupplierGroup');
    }

    public function getDsLogic() {
        return D('Admin/Supplier', 'Logic');
    }

}