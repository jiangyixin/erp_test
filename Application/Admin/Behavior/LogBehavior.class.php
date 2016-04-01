<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/1 0001
 * Time: 上午 11:15
 */

namespace Admin\Behavior;

use Think\Behavior;
use Think\Log;

class LogBehavior extends Behavior{

    /**
     * 执行行为 run方法是Behavior唯一的接口
     * @access public
     * @param mixed $params 行为参数
     * @return void
     */
    public function run(&$params) {
        Log::record('------------------------------LogBehavior-----start------------------------------------');
        Log::record('model_name: ' . MODULE_NAME);
        Log::record('controller_name: ' . CONTROLLER_NAME);
        Log::record('action_name: ' . ACTION_NAME);
        Log::record('__action__: ' . __ACTION__);
        if (IS_POST) {
            Log::record('post param: ' . json_encode(I('post.')));
        } else {
            Log::record('get param: ' . json_encode(I('get.')));
        }
    }
}