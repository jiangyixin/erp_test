<?php
return array(
	//'配置项'=>'配置值'
    // 后台菜单配置
    'nav_list' => array(
        '1' => array(
            'id'    => '1',
            'name'  => 'Index',
            'title' => '首页',
            'icon'  => 'fa fa-home',
            'url'   => 'Admin/Index/index'
        ),
        /*'2' => array(
            'name'  => 'Supplier',
            'title' => '供应商',
            'icon'  => 'fa fa-newspaper-o',
            'url'   => 'Admin/Supplier/index'
        ),*/
        '2' => array(
            'id'    => '2',
            'name'  => 'Stock',
            'title' => '仓储',
            'icon'  => 'fa fa-inbox',
            'url'   => 'Admin/Stock/index'
        ),
        '3' => array(
            'id'    => '3',
            'name'  => 'Goods',
            'title' => '采购',
            'icon'  => 'fa fa-shopping-cart',
            'url'   => 'Admin/Goods/procurement'
        ),
        '4' => array(
            'id'    => '4',
            'name'  => 'Sell',
            'title' => '销售',
            'icon'  => 'fa fa-shopping-cart',
            'url'   => 'Admin/Sell/sell'
        ),
        '5' => array(
            'id'    => '5',
            'name'  => 'Log',
            'title' => '日志',
            'icon'  => 'fa fa-file-text-o',
            'url'   => 'Admin/Log/dbLogList'
        ),
    ),

    'title_list' => array(
        '1' => array(
            'nav_id'   => '1',
            'title' => '首页管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '2' => array(
            'nav_id'   => '3',
            'title' => '商品管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '3' => array(
            'nav_id'   => '2',
            'title' => '仓储管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '4' => array(
            'nav_id'   => '3',
            'title' => '供应商管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '5' => array(
            'nav_id'   => '3',
            'title' => '采购管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '6' => array(
            'nav_id'   => '4',
            'title' => '销售管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
        '7' => array(
            'nav_id'   => '5',
            'title' => '日志管理',
            'icon'  => 'fa fa-folder-open-o',
        ),
    ),

    'menu_list' => array(
        array(
            'title_id'   => '4',
            'name'  => 'index',
            'title' => '供应商列表',
            'icon'  => 'fa fa-credit-card',
            'url'   => 'Admin/Supplier/index'
        ),
        array(
            'title_id'   => '4',
            'name'  => 'groupList',
            'title' => '供应商分组',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Supplier/groupList'
        ),
        /*array(
            'title_id'   => '2',
            'name'  => 'linkmanList',
            'title' => '联系人',
            'icon'  => 'fa fa-users',
            'url'   => 'Admin/Supplier/linkmanList'
        ),*/
        array(
            'title_id'   => '3',
            'name'  => 'index',
            'title' => '仓库列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Stock/index'
        ),
        array(
            'title_id'   => '3',
            'name'  => 'stockList',
            'title' => '库存清单',
            'icon'  => 'fa fa-list-alt',
            'url'   => 'Admin/Stock/stockList'
        ),
        /*array(
            'title_id'   => '3',
            'name'  => 'purchaseList',
            'title' => '入库',
            'icon'  => 'fa fa-sign-in',
            'url'   => 'Admin/Stock/purchaseList'
        ),
        array(
            'title_id'   => '3',
            'name'  => 'salesList',
            'title' => '出库',
            'icon'  => 'fa fa-sign-out',
            'url'   => 'Admin/Stock/salesList'
        ),*/
        array(
            'title_id'   => '3',
            'name'  => 'transferList',
            'title' => '调拨',
            'icon'  => 'fa fa-refresh',
            'url'   => 'Admin/Stock/transferList'
        ),
        array(
            'title_id'   => '3',
            'name'  => 'stocktaking',
            'title' => '库存盘点',
            'icon'  => 'fa fa-building-o',
            'url'   => 'Admin/Stock/stocktaking'
        ),
        /*array(
            'title_id'   => '3',
            'name'  => 'stockLogList',
            'title' => '库存操作记录',
            'icon'  => 'fa fa-file',
            'url'   => 'Admin/Stock/stockLogList'
        ),*/
        array(
            'title_id'   => '5',
            'name'  => 'procurement',
            'title' => '新建采购单',
            'icon'  => 'fa fa-plus-square',
            'url'   => 'Admin/Goods/procurement'
        ),
        array(
            'title_id'   => '5',
            'name'  => 'procurementList',
            'title' => '采购单列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/procurementList'
        ),
        array(
            'title_id'   => '2',
            'name'  => 'goodsGroupList',
            'title' => '商品分组列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/goodsGroupList'
        ),
        array(
            'title_id'   => '2',
            'name'  => 'goodsList',
            'title' => '商品列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Goods/goodsList'
        ),
        array(
            'title_id'   => '6',
            'name'  => 'sell',
            'title' => '新建销售单',
            'icon'  => 'fa fa-plus-square',
            'url'   => 'Admin/Sell/sell'
        ),
        array(
            'title_id'   => '6',
            'name'  => 'sellList',
            'title' => '销售单列表',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Sell/sellList'
        ),
        array(
            'title_id'   => '6',
            'name'  => 'sellStatistical',
            'title' => '销售统计',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Sell/sellStatistical'
        ),
        array(
            'title_id'   => '7',
            'name'  => 'dbLogList',
            'title' => '系统操作日志',
            'icon'  => 'fa fa-list',
            'url'   => 'Admin/Log/dbLogList'
        ),
    ),

);