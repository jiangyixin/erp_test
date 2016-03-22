<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 上午 9:54
 */

namespace Stock\Controller;

use \Think\Controller;

class SupplierController extends Controller{

    private $ds = null;
    private $dsl = null;

    protected function _initialize() {
        $ds = D('Admin/Supplier');
        $dsl = D('Admin/SupplierLinkman');
    }

    public function getLinkman() {
        $ds = D('Admin/Supplier', 'Logic');
        $data['id'] = 1;
        $linkman = $ds->getLinkmanInfo($data);
        $supplier = $ds->getSupplierAndLinkmanList(array('id'=>7));
        dump($linkman);
        dump($supplier);
    }

    public function addAllLinkman() {

        $linkmanList[] = array('name'=>'lisi', 'mobile'=>'4626431', 'email'=>'111@broadin.cn', 'supplier_id'=>3, 'rank'=>1);
        $linkmanList[] = array('name'=>'wangwu', 'mobile'=>'131351', 'email'=>'222@broadin.cn', 'supplier_id'=>3,'rank'=>0);

        $dsl = D('Admin/SupplierLinkman');
        $result = $dsl->addAllData($linkmanList);
        dump($result);
    }

    public function addSupplier() {

        $supplier['name'] = 'broadin';
        $supplier['supplier_group_id'] = 3;
        $supplier['tel'] = '0739-123456';
        $supplier['partner'] = 'zhangsan';
        $supplier['note'] = 'beizhu';

        $linkmanList[] = array('name'=>'lisi', 'mobile'=>'4626431', 'email'=>'111@broadin.cn', 'rank'=>1);
        $linkmanList[] = array('name'=>'wangwu', 'mobile'=>'131351', 'email'=>'222@broadin.cn', 'rank'=>0);

        $ds = D('Admin/Supplier', 'Logic');
        $result = $ds->addSupplierAndLinkmanList($supplier, $linkmanList);

        dump($result);
    }

    public function showSupplierGroup() {
        $dsg = D('Admin/SupplierGroup');
        $list = $dsg->getDataList();
        $pageList = $dsg->getPageList(null, 1, 5);
        $this->assign('list', $list);
        dump($list);
        dump($pageList);
        $this->display('Supplier/show');

        $linkmanList[] = array('name'=>'lisi', 'mobile'=>'4626431', 'email'=>'111@broadin.cn', 'rank'=>1);
        $linkmanList[] = array('name'=>'wangwu', 'mobile'=>'131351', 'email'=>'222@broadin.cn', 'rank'=>0);
        dump($linkmanList);

        foreach ($linkmanList as $key=>$item) {
            // $item['supplier_id'] = 3;
            dump($key.':'.json_encode($item));
            $linkmanList[$key]['supplier_id'] = 3;
        }
        dump($linkmanList);
    }

    public function addSupplierGroup() {
        $dsg = D('Admin/SupplierGroup');
        $data['name'] = '李四';
        $data['note'] = 'ceshi';
        $result = $dsg->addData($data);
        dump($result);
    }

    public function editSupplierGroup() {
        $dsg = D('Admin/SupplierGroup');
        $wdata['id'] = 2;
        $data['name'] = 'lisi';
        $result = $dsg->editData($wdata, $data);
        dump($result);
    }

    public function delSupplierGroup() {
        $dsg = D('Admin/SupplierGroup');
        $data['id'] = 1;
        $result = $dsg->delData($data);
        dump($result);
    }

}