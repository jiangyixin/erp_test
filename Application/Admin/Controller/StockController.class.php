<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 5:39
 */

namespace Admin\Controller;

use Think\Log;
use Think\Page;

class StockController extends AdminController{

    /**
     * 库存盘点
     */
    public function stocktaking() {

    }

    /**
     * 仓储首页，仓库列表
     */
    public function index() {
        $warehouseList = $this->getDw()->getDataList();
        foreach ($warehouseList as $key=>$item) {
            $warehouseList[$key]['partner'] = $this->getDp()->checkData(array('id'=>$item['partner_id']));
        }
        $this->assign('warehouseList', $warehouseList);
        $this->display('Stock/index');
    }

    /**
     * !!!
     * 删除仓库
     */
    public function warehouseDel() {
        $data['id'] = I('id');
        if ($data['id']) {
            $result = D('Admin/warehouse', 'Logic')->warehouseDel($data);
        }
        if ($result['status']) {
            $this->success('删除成功，页面即将自动刷新！', 'index');
        } else {
            $msg = $result['msg'] ? $result['msg'] : '删除失败';
            $this->error($msg);
        }
    }

    /**
     * 单个仓库信息
     */
    public function warehouseInfo() {
        $data['id'] = I('id');
        if ($data['id']) {
            $warehouse = $this->getDw()->checkData($data);
            $this->assign('warehouse', $warehouse);
        }

        $partnerList = $this->getDp()->getDataList();
        $this->assign('partnerList', $partnerList);
        $this->display('Stock/warehouseEdit');
    }

    /**
     * 新增和修改仓库信息
     */
    public function warehouseEdit() {
        $warehouse = I('post.warehouse');
        if ($warehouse['id']) {
            $result = $this->getDw()->editDataById($warehouse);
        } else {
            $result = $this->getDw()->addData($warehouse);
        }
        if ($result) {
            $this->success('更新成功，页面即将跳转！', 'index');
        } else {
            $this->error('更新失败');
        }
    }

    /**
     * 库存列表，库存清单
     *
     * 当前仓库库存信息
     */
    public function stockList() {
        $data['warehouse_id'] = I('id');
        if (!$data['warehouse_id'] || $data['warehouse_id'] === 0) {
            $data = null;
        }
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $count = $this->getDs()->where($data)->count();
        $Page = new Page($count, $limit);
        $show = $Page->show();
        $stockList = $this->getDsLogic()->getStockList($data, $page, $limit);

        $this->assign('stockList', $stockList);
        $this->assign('page', $show);
        $this->display('Stock/stockList');
    }

    /**
     * 采购、入库
     *  供应商、仓库、商品id、数量、单价、备注、二维码列表
     */
    public function purchase() {
        if (IS_POST) {
            $stockLog = I('post.stockLog');
            $detailList = I('post.detailList');

            $result = $this->getDsLogic()->purchase($stockLog, $detailList);

            if ($result) {
                $this->success('操作成功！', 'purchaseList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $partnerList = $this->getDp()->getDataList();
            $goodsList = $this->getDg()->getDataList();
            $warehouseList = $this->getDw()->getDataList();
            $supplierList = $this->getDsupplier()->getDataList();
            $this->assign('supplierList', $supplierList);
            $this->assign('partnerList', $partnerList);
            $this->assign('goodsList', $goodsList);
            $this->assign('warehouseList', $warehouseList);
            $this->display('Stock/purchase');
        }
    }

    /**
     * 入库记录
     */
    public function purchaseList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $data['status'] = 1;
        $count = $this->getDsl()->where($data)->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $stockLogList = $this->getDsLogic()->getStockLogList($data, $page, $limit);
        $this->assign('stockLogList', $stockLogList);
        $this->assign('page', $show);
        $this->display('Stock/purchaseList');
    }

    /**
     * 调拨
     */
    public function transfer() {
        if (IS_POST) {
            $stockLog = I('post.stockLog');
            $detailList = I('post.detailList');

            $result = $this->getDsLogic()->transfer($stockLog, $detailList);
            if ($result) {
                $this->success('操作成功！', 'transferList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $partnerList = $this->getDp()->getDataList();
            $goodsList = $this->getDsLogic()->getGoodsStockList();
            $warehouseList = $this->getDw()->getDataList();
            $this->assign('partnerList', $partnerList);
            $this->assign('goodsList', $goodsList);
            $this->assign('warehouseList', $warehouseList);
            $this->display('Stock/transfer');
        }
    }

    /**
     * 调拨列表
     */
    public function transferList() {
        $page = I('get.p', 1);
        $limit = 15;
        $data['status'] = 0;
        $count = $this->getDst()->where($data)->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $stockLogList = $this->getDsLogic()->getStockLogList($data, $page, $limit);

        $this->assign('stockLogList', $stockLogList);
        $this->assign('page', $show);
        $this->display('Stock/transferList');
    }

    /**
     * 销售、出库
     * 商品id、客户id、仓库id、数量、单价、总价、备注
     */
    public function sales() {
        if (IS_POST) {
            $stockLog = I('post.stockLog');
            $detailList = I('post.detailList');
            $result = $this->getDsLogic()->sales($stockLog, $detailList);
            if ($result) {
                $this->success('操作成功！', 'stockLogList');
            } else {
                $this->error('操作失败！');
            }
        } else {
            $partnerList = $this->getDp()->getDataList();
            $goodsList = $this->getDsLogic()->getGoodsStockList();
            $warehouseList = $this->getDw()->getDataList();
            $this->assign('partnerList', $partnerList);
            $this->assign('goodsList', $goodsList);
            $this->assign('warehouseList', $warehouseList);
            $this->display('Stock/sales');
        }
    }

    /**
     * 出库记录
     */
    public function salesList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $data['status'] = -1;
        $count = $this->getDsl()->where($data)->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $stockLogList = $this->getDsLogic()->getStockLogList($data, $page, $limit);

        $this->assign('stockLogList', $stockLogList);
        $this->assign('page', $show);
        $this->display('Stock/salesList');
    }

    /**
     * 库存操作记录
     */
    public function stockLogList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $count = $this->getDsl()->count();
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $stockLogList = $this->getDsLogic()->getStockLogList(null, $page, $limit);

        $this->assign('stockLogList', $stockLogList);
        $this->assign('page', $show);
        $this->display('stockLogList');
    }

    /**
     * 库存调拨详情
     */
    public function transferDetail() {
        $data['id'] = I('id');
        $stockLog = $this->getDsLogic()->getStockLogDetail($data);
        $this->assign('stockLog', $stockLog);
        $this->display('Stock/transferDetail');
    }

    /**
     * 库存操作记录详情
     */
    public function stockLogDetail() {
        $data['id'] = I('id');
        $stockLog = $this->getDsLogic()->getStockLogDetail($data);
        Log::record('--stockLog: ' . json_encode($stockLog));
        $this->assign('stockLog', $stockLog);
        $this->display('Stock/stockLogDetail');
    }


    // get 方法
    public function getDg() {
        return D('Admin/Goods');
    }

    public function getDs() {
        return D('Admin/Stock');
    }

    public function getDsl() {
        return D('Admin/StockLog');
    }

    public function getDsld() {
        return D('Admin/StockLogDetail');
    }

    public function getDw() {
        return D('Admin/Warehouse');
    }

    public function getDsLogic() {
        return D('Admin/Stock', 'Logic');
    }

    public function getDp() {
        return D('Admin/Partner');
    }

    public function getDsp() {
        return D('Admin/StockPurchase');
    }

    public function getDss() {
        return D('Admin/StockSales');
    }

    public function getDst() {
        return D('Admin/StockTransfer');
    }

    public function getDsupplier() {
        return D('Admin/Supplier');
    }
}