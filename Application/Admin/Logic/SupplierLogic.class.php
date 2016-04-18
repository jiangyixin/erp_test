<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 2:20
 */

namespace Admin\Logic;


use Common\Model\CommonModel;
use Think\Log;

class SupplierLogic extends CommonModel{

    private $ds = null;
    private $dsl = null;
    private $dsg = null;
    private $dp = null;
    private $drsp = null;

    protected function _initialize() {
        $this->ds = D('Admin/Supplier');
        $this->dsl = D('Admin/SupplierLinkman');
        $this->dsg = D('Admin/SupplierGroup');
        $this->dp = D('Admin/Partner');
        $this->drsp = D('Admin/SupplierPartner');

    }

    /**
     * 获取当前供应商采购信息
     * @param $data
     * @return mixed
     */
    public function getSupplierProcurement($data) {
        if ($data) {
            $supplier = D('Admin/Supplier')->checkData($data);
            $procurementList = D('Admin/Procurement')->getDataList(array('supplier_id'=>$supplier['id']));
            foreach ($procurementList as $key => $item) {
                $procurementList[$key]['detailList'] = D('Admin/ProcurementDetail')->getDataList(array('procurement_id'=>$item['id']));

            }
            $supplier['procurementList'] = $procurementList;
            return $supplier;
        }
    }

    /**
     * 根据id或名字获取联系人列表 为空则表示查询所有
     * @param $data id or name
     * @return mixed
     */
    public function getLinkmanList($data) {
        if ($data) {
            $where['_logic'] = 'or';
            $where['id'] = $data;
            $where['name'] = array('like',"%$data%");
        }
        $linkmanList = $this->dsl->getDataList($where);
        foreach ($linkmanList as $key=>$item) {
            $linkmanList[$key]['supplier'] = $this->ds->checkData(array('id'=>$item['supplier_id']));
        }
        return $linkmanList;
    }

    /**
     * 获得供应商列表以级联系人、负责人信息列表
     * @param $data 查询条件
     * @return mixed array
     */
    public function getSupplierListAndLinkmanList($data) {
        $supplierList = $this->ds->getDataList($data);
        foreach ($supplierList as $key=>$item) {
            $relationList = $this->drsp->getDataList(array('supplier_id'=>$item['id']));
            $partnerList = array();
            foreach ($relationList as $relation) {
                $partnerList[] = $this->dp->checkData(array('id'=>$relation['partner_id']));
            }
            $supplierList[$key]['partner'] = $partnerList;
            $supplierList[$key]['supplier_group'] = $this->dsg->checkData(array('id'=>$item['supplier_group_id']));
            $supplierList[$key]['linkman'] = $this->dsl->getDataList(array('supplier_id'=>$item['id']));
        }
        return $supplierList;
    }

    /**
     * 获得单个供应商信息和这个供应商的所有联系人信息
     * @param $data 查询条件
     * @return mixed array
     */
    public function getSupplierAndLinkmanList($data) {
        $supplier = $this->ds->checkData($data);
        $supplier['group'] = $this->dsg->checkData(array('id'=>$supplier['supplier_group_id']));
        $supplier['linkman'] = $this->dsl->getDataList(array('supplier_id'=>$supplier['id']));

        return $supplier;
    }

    /**
     * 获取单个联系人信息和所属供应商
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

    /**
     * 编辑和添加供应商和联系人信息
     * @param $supplier array 供应商数据
     * @param $linkmanList array[array] 联系人列表
     * @return bool
     */
    public function editSupplierAndLinkmanList($supplier, $linkmanList) {
        M()->startTrans();
        if ($supplier['id']) {
            $result = $this->ds->editDataById($supplier);
        } else {
            $result = $supplier['id'] = $this->ds->addData($supplier);
        }
        if ($result === false) {
            M()->rollback();
            return false;
        }
        foreach ($linkmanList as $item) {
            if ($item['id']) {
                if (!$item['supplier_id']) {
                    $item['supplier_id'] = $supplier['id'];
                }
                $result = $this->dsl->editDataById($item);
            } else {
                $item['supplier_id'] = $supplier['id'];
                $result = $this->dsl->addData($item);
            }
            if ($result === false) {
                M()->rollback();
                return false;
            }
        }
        if ($result !== false) {
            M()->commit();
            return true;
        }
    }

}