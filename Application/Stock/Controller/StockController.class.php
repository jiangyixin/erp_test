<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:39
 */

namespace Stock\Controller;


use Think\Controller;

class StockController extends Controller{

    private $ds = null;
    private $dsl = null;
    private $dsld = null;
    private $dw = null;

    protected function _initialize() {
        $this->ds = D('Admin/Stock');
        $this->dsl = D('Admin/StockLog');
        $this->dsld = D('Admin/StockLogDetail');
        $this->dw = D('Admin/Warehouse');
    }

    public function purchaseRecords() {

        $dsLogic = D('Admin/Stock', 'Logic');
        $result = $dsLogic->purchaseRecords();
        dump($result);
    }

    /**
     * 销售
     * 商品id、客户id、仓库id、数量、单价、总价、备注
     */
    public function sales() {
        
        $stockLog = array('warehouse_id'=>1, 'titie'=>'ceshi', 'partner'=>'zhangsan', 'status'=>-1, 'in_transfer_out'=>'客户1', 'note'=>'销售');
        $paramList[] = array('goods_id'=>1, 'num'=>3, 'code_list'=>array('001', '002', '003'));
        $paramList[] = array('goods_id'=>2, 'num'=>2, 'code_list'=>array('004', '005'));

        $dsLogic = D('Admin/Stock', 'Logic');
        $result = $dsLogic->sales($stockLog, $paramList);
        dump($result);

    }

    /**
     * 采购
     *  供应商、仓库、商品id、数量、单价、备注、二维码列表
     */
    public function purchase() {

        $paramList[] = array('goods_id'=>1, 'num'=>4, 'code_list'=>array('001', '002', '003', '003'));
        $paramList[] = array('goods_id'=>2, 'num'=>6, 'code_list'=>array('004', '005', '005', '005', '005', '005'));

        $stockLog = array('warehouse_id'=>1, 'titie'=>'ceshi', 'partner'=>'zhangsan', 'in_transfer_out'=>3, 'status'=>1, 'note'=>'采购');

        $dsLogic = D('Admin/Stock', 'Logic');
        $result = $dsLogic->purchase($stockLog, $paramList);
        dump($result);
    }

    public function addWarehouse() {
        $warehouse = array('name'=>'分仓2', 'city'=>'广州', 'partner'=>'lisi', 'tel'=>'542310');
        $result = $this->dw->addData($warehouse);
        dump($result);
    }

}