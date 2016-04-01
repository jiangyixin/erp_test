<?php
return array(
	//'配置项'=>'配置值'
    // 后台菜单配置
    'nav_list' => array(
        '1' => array(
            'name'  => 'Index',
            'title' => '首页',
            'icon'  => 'fa fa-home',
            'url'   => 'Admin/Index/index'
        ),
        '2' => array(
            'name'  => 'Supplier',
            'title' => '供应商',
            'icon'  => 'fa fa-newspaper-o',
            'url'   => 'Admin/Supplier/index'
        ),
        '3' => array(
            'name'  => 'Stock',
            'title' => '仓储',
            'icon'  => 'fa fa-inbox',
            'url'   => 'Admin/Stock/index'
        ),
        '4' => array(
            'name'  => 'Goods',
            'title' => '采购',
            'icon'  => 'fa fa-shopping-cart',
            'url'   => 'Admin/Goods/procurement'
        ),
        '5' => array(
            'name'  => 'Sell',
            'title' => '销售',
            'icon'  => 'fa fa-shopping-cart',
            'url'   => 'Admin/Sell/sell'
        ),
    ),

    'menu_list' => array(
        array(
            'pid'   => '2',
            'name'  => 'index',
            'title' => '供应商列表',
            'icon'  => 'fa fa-credit-card',
            'url'   => 'Admin/Supplier/index'
        ),
        array(
            'pid'   => '2',
            'name'  => 'groupList',
            'title' => '供应商分组',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Supplier/groupList'
        ),
        /*array(
            'pid'   => '2',
            'name'  => 'linkmanList',
            'title' => '联系人',
            'icon'  => 'fa fa-users',
            'url'   => 'Admin/Supplier/linkmanList'
        ),*/
        array(
            'pid'   => '3',
            'name'  => 'index',
            'title' => '仓库列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Stock/index'
        ),
        array(
            'pid'   => '3',
            'name'  => 'stockList',
            'title' => '库存清单',
            'icon'  => 'fa fa-list-alt',
            'url'   => 'Admin/Stock/stockList'
        ),
        array(
            'pid'   => '3',
            'name'  => 'purchaseList',
            'title' => '入库',
            'icon'  => 'fa fa-sign-in',
            'url'   => 'Admin/Stock/purchaseList'
        ),
        array(
            'pid'   => '3',
            'name'  => 'salesList',
            'title' => '出库',
            'icon'  => 'fa fa-sign-out',
            'url'   => 'Admin/Stock/salesList'
        ),
        array(
            'pid'   => '3',
            'name'  => 'transferList',
            'title' => '调拨',
            'icon'  => 'fa fa-refresh',
            'url'   => 'Admin/Stock/transferList'
        ),
        array(
            'pid'   => '3',
            'name'  => 'stockLogList',
            'title' => '库存操作记录',
            'icon'  => 'fa fa-file',
            'url'   => 'Admin/Stock/stockLogList'
        ),
        array(
            'pid'   => '4',
            'name'  => 'procurement',
            'title' => '新建采购单',
            'icon'  => 'fa fa-plus-square',
            'url'   => 'Admin/Goods/procurement'
        ),
        array(
            'pid'   => '4',
            'name'  => 'procurementList',
            'title' => '采购单列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/procurementList'
        ),
        array(
            'pid'   => '4',
            'name'  => 'goodsGroupList',
            'title' => '商品分组列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/goodsGroupList'
        ),
        array(
            'pid'   => '4',
            'name'  => 'goodsList',
            'title' => '商品列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/goodsList'
        ),
        array(
            'pid'   => '5',
            'name'  => 'sell',
            'title' => '新建销售单',
            'icon'  => 'fa fa-plus-square',
            'url'   => 'Admin/Sell/sell'
        ),
        array(
            'pid'   => '5',
            'name'  => 'sellList',
            'title' => '销售单列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Sell/sellList'
        ),
        array(
            'pid'   => '5',
            'name'  => 'sellStatistical',
            'title' => '销售统计',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Sell/sellStatistical'
        ),
    ),

);