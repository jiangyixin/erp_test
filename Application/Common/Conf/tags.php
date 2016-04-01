<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
return array(
    // 'app_init'     => array('Common\Behavior\InitModuleBehavior'),
    'app_begin'    => array('Common\Behavior\InitConfigBehavior'), //初始化系统配置行为扩展
    'action_begin' => array('Admin\Behavior\LogBehavior'), //初始化
);
