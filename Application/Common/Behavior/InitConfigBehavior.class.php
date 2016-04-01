<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/8 0008
 * Time: 下午 5:15
 */

namespace Common\Behavior;


use Think\Behavior;
use Think\Log;

class InitConfigBehavior extends Behavior{

    /**
     * 执行行为 run方法是Behavior唯一的接口
     * @access public
     * @param mixed $params 行为参数
     * @return void
     */
    public function run(&$params) {
        Log::record('------------------------------InitConfig-----start------------------------------------');

    }
}