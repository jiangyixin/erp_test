<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:19
 */

namespace Stock\Controller;


use Think\Controller;

class GoodsController extends Controller{

    private $dg = null;
    private $dgc = null;
    private $dgg = null;

    protected function _initialize() {
        $this->dg = D('Admin/Goods');
        $this->dgc = D('Admin/GoodsCode');
        $this->dgg = D('Admin/GoodsGroup');
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
        $goodsGroup['name'] = '移动电源';
        $goodsGroup['note'] = '新品上市';
        $result = $this->dgg->addData($goodsGroup);
        dump($result);
    }

}