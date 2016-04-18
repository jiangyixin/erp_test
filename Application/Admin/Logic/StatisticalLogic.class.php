<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/8 0008
 * Time: 下午 5:02
 */

namespace Admin\Logic;


use Think\Log;
use Think\Model;
use Think\Model\AdvModel;
use Think\Model\RelationModel;

class StatisticalLogic {

    /**
     * 所有销售记录统计
     * @return mixed
     */
    public function salesStatistical() {
        $sql = "SELECT __PREFIX__sell_detail.goods_id, __PREFIX__sell.warehouse_id_out, __PREFIX__goods.name AS goods_name, __PREFIX__goods.norm AS goods_norm, sum(__PREFIX__sell_detail.num) AS num, sum(__PREFIX__sell_detail.num * __PREFIX__sell_detail.per_price) AS count_price, __PREFIX__warehouse.name AS warehouse_name FROM __PREFIX__goods, __PREFIX__sell, __PREFIX__sell_detail, __PREFIX__warehouse WHERE __PREFIX__sell.status = 1 AND __PREFIX__sell.id = __PREFIX__sell_detail.sell_id AND __PREFIX__goods.id = __PREFIX__sell_detail.goods_id AND __PREFIX__sell.warehouse_id_out = __PREFIX__warehouse.id GROUP BY goods_id, __PREFIX__sell.warehouse_id_out";
        $statisticalList = M()->query($sql);
        return $statisticalList;
    }

    /**
     * 按日期统计销售记录
     * @param array $time
     * @return mixed
     */
    public function salesStatisticalByDate($time=array()) {
        $sql = "SELECT erp_sell_detail.goods_id, erp_sell.warehouse_id_out, erp_goods.name AS goods_name, erp_goods.norm AS goods_norm, sum(erp_sell_detail.num) AS num, sum(erp_sell_detail.num * erp_sell_detail.per_price) AS count_price, erp_warehouse.name AS warehouse_name, erp_sell.update_time FROM erp_goods, erp_sell, erp_sell_detail, erp_warehouse WHERE erp_sell.status = 1 AND erp_sell.id = erp_sell_detail.sell_id AND erp_goods.id = erp_sell_detail.goods_id AND erp_sell.warehouse_id_out = erp_warehouse.id";
        if ($time['start']) {
            $sql .= " AND erp_sell.update_time > '%s' ";
        }
        if ($time['end']) {
            $sql .= " AND erp_sell.update_time < '%s' ";
        }
        $sql .= " GROUP BY goods_id, erp_sell.warehouse_id_out ";
        if ($time['start'] && $time['end']) {
            $statisticalList = M()->query($sql, array($time['start'], $time['end']));
        } else if ($time['start'] && !$time['end']) {
            $statisticalList = M()->query($sql, array($time['start']));
        } else if (!$time['start'] && $time['end']) {
            $statisticalList = M()->query($sql, array($time['end']));
        } else if (!$time['start'] && !$time['end']) {
            $statisticalList = M()->query($sql);
        }
        return $statisticalList;
    }

}