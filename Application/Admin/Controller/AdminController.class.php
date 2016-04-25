<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/8 0008
 * Time: 下午 3:42
 */

namespace Admin\Controller;


use Common\Controller\CommonController;
use MongoDB\BSON\Timestamp;

class AdminController extends CommonController{

    /**
     * 初始化方法
     */
    protected function _initialize() {

        $navList = C('nav_list');
        $titleList = C('title_list');
        $menuList = C('menu_list');
        // 获取当前菜单项
        $nav_id = '';
        $curMenuList = array();
        $controller = CONTROLLER_NAME;
        if ($controller == 'Supplier') {
            $controller = 'Goods';
        }
        foreach ($navList as $key => $item) {
            if ($item['name'] == $controller) {
                $nav_id = $key;
                break;
            }
        }
        foreach ($titleList as $key => $item) {
            if ($nav_id == $item['nav_id']) {
                $curMenuList[$key]['label'] = $item;
                foreach ($menuList as $name => $value) {
                    if ($key == $value['title_id']) {
                        $curMenuList[$key]['list'][] = $value;
                    }
                }
            }
        }
        $curTime = date('Y-m-d H:i:s');
        $this->assign('navList', $navList);
        $this->assign('menuList', $curMenuList);
        $this->assign('_admin_public_layout', C('ADMIN_PUBLIC_LAYOUT'));  // 页面公共继承模版
        $this->assign('curTime', $curTime);
    }

}