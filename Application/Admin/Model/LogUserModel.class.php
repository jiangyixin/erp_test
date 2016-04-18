<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/7 0007
 * Time: 上午 9:52
 */

namespace Admin\Model;


use Think\Model;

class LogUserModel extends Model{

    /**
     * 分页查询数据
     * @param $data 根据数据表数据
     * @param $page 查询的页码
     * @param $limit 每页显示的条数
     * @return array[total, rows]
     */
    public function getPageList($data, $page, $limit) {
        $list['total'] = $this->where($data)->count();
        $list['rows'] = $this->where($data)->order('id desc')->page($page, $limit)->select();
        return $list;
    }

    /**
     * 获得所有数据
     * @param $data
     * @return bool(false SQL出错)|array(二维数组)
     */
    public function getDataList($data) {
        return $this->where($data)->select();
    }



}