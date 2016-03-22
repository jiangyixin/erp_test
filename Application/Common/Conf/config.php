<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL' =>  1, // 如果你的环境不支持PATHINFO 请设置为3号

    'DB_TYPE'   =>  'mysql',
    'DB_HOST'   =>  '127.0.0.1',
    'DB_NAME'   =>  'test',
    'DB_USER'   =>  'root',
    'DB_PWD'    =>  '',
    'DB_PORT'   =>  '3306',
    'DB_PREFIX' =>  'erp_',


    // 模板相关配置
    'TMPL_PARSE_STRING'  => array(
        '__PUBLIC__'     => __ROOT__.'/Public',
        '__CUI__'        => __ROOT__.'/Public/libs/cui',
        '__ADMIN_IMG__'  => __ROOT__.'/'.APP_PATH.'Admin/View/Public/img',
        '__ADMIN_CSS__'  => __ROOT__.'/'.APP_PATH.'Admin/View/Public/css',
        '__ADMIN_JS__'   => __ROOT__.'/'.APP_PATH.'Admin/View/Public/js',
        '__ADMIN_LIBS__' => __ROOT__.'/'.APP_PATH.'Admin/View/Public/libs',
        '__HOME_IMG__'   => __ROOT__.'/'.APP_PATH.'Home/View/Public/img',
        '__HOME_CSS__'   => __ROOT__.'/'.APP_PATH.'Home/View/Public/css',
        '__HOME_JS__'    => __ROOT__.'/'.APP_PATH.'Home/View/Public/js',
        '__HOME_LIBS__'  => __ROOT__.'/'.APP_PATH.'Home/View/Public/libs',
    ),

    // 系统功能模板
    'ADMIN_PUBLIC_LAYOUT' => APP_PATH.'Admin/View/Public/layout.html',

);