<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/12 0012
 * Time: 上午 9:19
 */

namespace Admin\Controller;


use Think\Page;

class LogController extends AdminController{

    /**
     * 用户日志列表
     */
    public function userLogList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $userLogList = $this->getDUserLogLogic()->getLogList(null, $page, $limit);
        $Page = new Page($userLogList['total'], $limit);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('userLogList', $userLogList);
        $this->display('Log/userLogList');
    }

    public function dbLogList() {
        $page = I('get.p');
        if (!$page) {
            $page = 1;
        }
        $limit = 15;
        $dbLogList = $this->getDDbLog()->getPageList(null, $page, $limit);
        $Page = new Page($dbLogList['total'], $limit);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('dbLogList', $dbLogList);
        $this->display('Log/dbLogList');
    }

    public function getDUserLogLogic() {
        return D('Admin/LogUser', 'Logic');
    }

    public function getDDbLog() {
        return D('Admin/LogDb');
    }
}