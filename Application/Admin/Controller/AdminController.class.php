<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/8 0008
 * Time: 下午 3:42
 */

namespace Admin\Controller;


use Common\Controller\CommonController;

class AdminController extends CommonController{

    /**
     * 初始化方法
     */
    protected function _initialize() {

        $navList = C('nav_list');
        $menuList = C('menu_list');
        // 获取当前菜单项
        $pid = '';
        $curMenuList = array();
        foreach ($navList as $key=>$item) {
            if ($item['name'] == CONTROLLER_NAME) {
                $pid = $key;
            }
        }
        $curMenuList['label'] = $navList[$pid];
        foreach ($menuList as $item) {
            if ($item['pid'] == $pid) {
                $curMenuList['list'][] = $item;
            }
        }

        $this->assign('navList', $navList);
        $this->assign('menuList', $curMenuList);
        $this->assign('_admin_public_layout', C('ADMIN_PUBLIC_LAYOUT'));  // 页面公共继承模版

    }

}