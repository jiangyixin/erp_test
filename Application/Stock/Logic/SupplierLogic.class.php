<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 2:20
 */

namespace Stock\Logic;


use Common\Model\CommonModel;
use Think\Model;

class SupplierLogic extends CommonModel{

    private $ds = null;
    private $dsl = null;
    private $dsg = null;

    protected function _initialize() {
        $this->ds = D('Admin/Supplier');
        $this->dsl = D('Admin/SupplierLinkman');
        $this->dsg = D('Admin/SupplierGroup');
    }

    /**
     * 获得供应商信息和这个供应商的所有联系人信息
     * @param $data 查询条件
     * @return mixed array
     */
    public function getSupplierAndLinkmanList($data) {
        $supplier = $this->ds->checkData($data);
        $supplier['linkman'] = $this->dsl->getDataList(array('supplier_id'=>$supplier['id']));
        return $supplier;
    }

    /**
     * 获取联系人信息和所属供应商
     * @param $data 查询条件
     * @return mixed array 联系人信息
     */
    public function getLinkmanInfo($data) {
        $linkman = $this->dsl->checkData($data);
        $linkman['supplier'] = $this->ds->checkData(array('id'=>$linkman['supplier_id']));
        return $linkman;
    }

    /**
     * 添加供应商和供应商联系人
     * @param $supplier array 供应商数据
     * @param $linkmanList array[array] 联系人列表
     * @return mixed 结果
     */
    public function addSupplierAndLinkmanList($supplier, $linkmanList) {
        $result = $this->ds->addData($supplier);
        if ($result > 0 && !empty($linkmanList)) {
            foreach ($linkmanList as $key=>$item) {
                $linkmanList[$key]['supplier_id'] = $result;
            }
            $dsl = D('Admin/SupplierLinkman');
            $result = $dsl->addAllData($linkmanList);
        }
        return $result;
    }

}