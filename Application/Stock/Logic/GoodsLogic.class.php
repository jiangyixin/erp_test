<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:01
 */

namespace Stock\Logic;


use Think\Model;

class GoodsLogic extends Model{

    private $dg = null;
    private $dgc = null;
    private $dgg = null;

    protected function _initialize() {
        $this->dg = D('Admin/Goods');
        $this->dgc = D('Admin/GoodsCode');
        $this->dgg = D('Admin/GoodsGroup');
    }



}