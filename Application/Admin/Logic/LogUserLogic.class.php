<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/7 0007
 * Time: 上午 10:04
 */

namespace Admin\Logic;


use Common\Model\CommonModel;
use Think\Log;

class LogUserLogic{
    /**
     * 记录用户操作日志
     * @param $event
     * @param $crud
     */
    public function log($event, $crud) {

        $action = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;

        $log['who'] = 'zhangsan';
        $log['param'] = json_encode(I('post.'), JSON_UNESCAPED_UNICODE);
        $log['event'] = $event;
        $log['crud'] = $crud;
        $log['action'] = $action;

        Log::record(' ------log------ :' . json_encode($log));

        $result = D('Admin/LogUser')->add($log);
        if (!$result) {
            Log::record('日志记录失败！' , 'WARN');
        }
    }

    /**
     * 获取日志列表
     * @param $data
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function getLogList($data, $page, $limit) {
        if ($page && $limit) {
            $logList = D('Admin/LogUser')->getPageList($data, $page, $limit);
        } else {
            $logList = D('Admin/LogUser')->getDataList($data);
        }
        return $logList;
    }



}