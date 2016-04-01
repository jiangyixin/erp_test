<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 2:32
 */

namespace Common\Model;

use Think\Model;

class CommonModel extends Model{

    /**
     * 分页查询数据
     * @param $data 根据数据表数据
     * @param $page 查询的页码
     * @param $limit 每页显示的条数
     * @return array[total, rows]
     */
    public function getPageList($data, $page, $limit) {
        $list['total'] = $this->where($data)->count();
        $list['rows'] = $this->where($data)->page($page, $limit)->select();
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

    /**
     * 获得所有数据，并按条件排序
     * @param $data 查询条件
     * @param string $field 默认为id 排序的字段
     * @param string $order 默认为倒序(desc) 排序规则
     * @return mixed 查询结果
     */
    public function getDataListOrder($data, $field='id', $order='desc') {
        return $this->where($data)->order("$field $order")->select();
    }

    /**
     * 根据id找到对应的数据
     * @param $data 根据数据表数据
     * @return array 单条数据
     */
    public function checkData($data) {
        return $this->where($data)->find();
    }

    /**
     * 添加数据
     * @param $data 根据数据表数据
     * @return bool(false)|int(id)
     */
    public function addData($data) {
        if ($this->create($data)) {
            return $this->add();
        } else {
            return false;
        }
    }

    /**
     * 添加多条数据
     * @param $dataList 二位数组
     * @return bool|string
     */
    public function addAllData($dataList) {
        return $this->addAll($dataList);
    }

    /**
     * 根据传递的参数更新数据
     * @param $wdata 选择数据
     * @param $data 保存数据
     * @return bool(false SQL出错)|int(影响的行数)
     */
    public function editData($wdata, $data) {
        return $this->where($wdata)->lock(true)->save($data);
    }

    /**
     * 根据data['id']更新数据
     * @param $data 需要更新的数据（id一致）
     * @return bool(false SQL出错)|int(影响的行数)
     */
    public function editDataById($data) {
        return $this->where('id='.$data['id'])->lock(true)->save($data);
    }

    /**
     * 根据条件删除数据
     * @param $data 根据数据表数据
     * @return bool(false SQL出错)|int(删除的行数)
     */
    public function delData($data) {
        return $this->where($data)->lock(true)->delete();
    }

}