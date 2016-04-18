<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 下午 2:32
 */

namespace Common\Model;

use Think\Log;
use Think\Model\AdvModel;

class CommonModel extends AdvModel{

    private $old_data = null;
    private $new_data = null;
    private $diff_before = null;
    private $diff_after = null;

    /**
     * 分页查询数据
     * @param $data 根据数据表数据
     * @param $page 查询的页码
     * @param $limit 每页显示的条数
     * @return array[total, rows]
     */
    public function getPageList($data, $page, $limit) {
        $list = $this->where($data)->order('id desc')->page($page, $limit)->select();
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
     * 根据条件找到对应的数据
     * @param $data 根据数据表数据
     * @return array 单条数据
     */
    public function checkData($data) {
        return $this->where($data)->find();
    }

    /**
     * 根据条件找到所需的字段
     * @param $data
     * @param $field
     * @return mixed
     */
    public function getFieldData($data, $field) {
        return $this->where($data)->getField($field);
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
     * 记录插入日志
     * 插入数据成功后的回调方法
     * @param string $data
     * @param array $options
     */
    public function _after_insert($data='', $options=array()) {
        $logDb = array('table_name'=>$options['table'], 'filter'=>json_encode(array('id'=>$data['id'])), 'crud'=>'c', 'new_data'=>json_encode($data, JSON_UNESCAPED_UNICODE));
        D('Admin/LogDb')->addData($logDb);
    }

    /**
     * 添加多条数据
     * @param $dataList 二位数组
     * @return bool|int
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
        $this->old_data = $this->where($wdata)->find();
        $diff_data = array_diff($data, $this->old_data);
        Log::record('diff_data: ' . json_encode($diff_data));
        if ($diff_data) {
            return $this->where($wdata)->lock(true)->save($data);
        } else {
            return 0;
        }
    }

    /**
     * 根据data['id']更新数据
     * @param $data 需要更新的数据（id一致）
     * @return bool(false SQL出错)|int(影响的行数)
     */
    public function editDataById($data) {
        Log::record('editDataById_data: ' . json_encode($data));
        $this->old_data = $this->where(array('id'=>$data['id']))->find();
        $diff_data = array();
        foreach($this->old_data as $key=>$value) {
            if (array_key_exists($key, $data) && $data[$key] !== $value) {
                $diff_data[$key] = $data[$key];
            }
        }
        Log::record('diff_data: ' . json_encode($diff_data));
        if ($diff_data) {
            return $this->lock(true)->save($data);
        } else {
            return 0;
        }
    }
    /**
     * 记录编辑日志
     * 编辑数据成功后的回调方法
     * @param $data
     * @param array $options
     */
    public function _after_update($data, $options=array()) {
        $this->new_data = $this->where(array('id'=>$data['id']))->find();
        $this->diff_before = array_diff_assoc($this->old_data, $this->new_data);
        $this->diff_after = array_diff_assoc($this->new_data, $this->old_data);
        Log::record('old_data' . json_encode($this->old_data));
        Log::record('new_data' . json_encode($this->new_data));
        Log::record('diff_before' . json_encode($this->diff_before));
        Log::record('diff_after' . json_encode($this->diff_after));
        $logDb = array('table_name'=>$options['table'], 'filter'=>json_encode($options['where'], JSON_UNESCAPED_UNICODE), 'crud'=>'u', 'old_data'=>json_encode($this->diff_before, JSON_UNESCAPED_UNICODE), 'new_data'=>json_encode($this->diff_after, JSON_UNESCAPED_UNICODE));
        D('Admin/LogDb')->addData($logDb);
    }

    /**
     * 根据条件删除数据
     * @param $data 根据数据表数据
     * @return bool(false SQL出错)|int(删除的行数)
     */
    public function delData($data) {
        return $this->where($data)->lock(true)->delete();
    }

    /**
     * 删除数据前的回调方法
     * @param $options
     */
    protected function _before_delete($options) {
        $this->old_data = $this->where($options['where'])->select();
    }

    /**
     * 记录删除日志
     * 删除成功后的回调方法
     * @param $data
     * @param $options
     */
    protected function _after_delete($data,$options) {
        Log::record('options: ' . json_encode($options));
        $logDb = array('table_name'=>$options['table'], 'filter'=>json_encode($options['where'], JSON_UNESCAPED_UNICODE), 'crud'=>'d', 'old_data'=>json_encode($this->old_data, JSON_UNESCAPED_UNICODE));
        D('Admin/LogDb')->addData($logDb);
    }

}