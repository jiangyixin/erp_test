<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:38
 */

namespace Admin\Logic;


use Think\Model;

class WarehouseLogic extends Model{

    /**
     * 删除仓库，只能删除库存为0的仓库
     * @param $data
     * @return array
     */
    public function warehouseDel($data) {
        $num = $this->getDStock()->where(array('warehouse_id' => $data['id']))->Sum('num');
        if ($num > 0){
            $result = array('status'=>'0', 'msg'=>'库存不为空，不能删除');
        } else {
            $result['status'] = $this->getDWarehouse()->delData($data);
        }
        return $result;
    }

    public function getDWarehouse() {
        return D('Admin/warehouse');
    }

    public function getDStock() {
        return D('Admin/stock');
    }
}