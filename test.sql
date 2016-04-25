-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-25 04:58:00
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `erp_goods`
--

CREATE TABLE `erp_goods` (
  `id` int(11) NOT NULL,
  `goods_group_id` int(11) DEFAULT NULL COMMENT '分组id',
  `name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '商品名',
  `norm` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '规格',
  `price` decimal(10,2) DEFAULT NULL COMMENT '采购价格',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- 转存表中的数据 `erp_goods`
--

INSERT INTO `erp_goods` (`id`, `goods_group_id`, `name`, `norm`, `price`, `create_time`, `update_time`, `note`) VALUES
(1, 1, '乐me移动电源', '安卓版', '50.00', '2016-03-03 09:31:13', '2016-04-13 06:10:24', NULL),
(2, 1, '乐me移动电源', '苹果版', '50.00', '2016-03-03 09:31:13', '2016-04-13 06:10:29', NULL),
(4, 3, '乐me音箱', '中型', '388.00', '2016-03-28 07:10:17', '2016-04-13 06:10:42', '无价格'),
(5, 3, '乐me音箱', '小型', '288.00', '2016-04-13 06:11:23', '2016-04-25 02:29:46', NULL),
(6, 3, '乐me音箱', '大型', '588.00', '2016-04-19 01:37:54', '2016-04-25 02:29:49', NULL),
(7, 2, '乐me一体机', '黑色', '388.00', '2016-04-19 01:41:03', '2016-04-25 02:29:54', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `erp_goods_group`
--

CREATE TABLE `erp_goods_group` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '分组名',
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分组';

--
-- 转存表中的数据 `erp_goods_group`
--

INSERT INTO `erp_goods_group` (`id`, `name`, `note`) VALUES
(1, '移动电源', '新品上市'),
(2, '机顶盒', '1'),
(3, '音箱', '新品上市'),
(6, '后视镜', '新品');

-- --------------------------------------------------------

--
-- 表的结构 `erp_log_db`
--

CREATE TABLE `erp_log_db` (
  `id` int(11) NOT NULL,
  `who` varchar(100) DEFAULT NULL,
  `table_name` varchar(100) NOT NULL COMMENT '表名',
  `filter` varchar(1024) DEFAULT NULL COMMENT '筛选条件',
  `crud` varchar(10) NOT NULL COMMENT 'CRUD',
  `old_data` varchar(4096) DEFAULT NULL,
  `new_data` varchar(4096) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='数据库日志表';

--
-- 转存表中的数据 `erp_log_db`
--

INSERT INTO `erp_log_db` (`id`, `who`, `table_name`, `filter`, `crud`, `old_data`, `new_data`, `create_time`) VALUES
(87, NULL, 'erp_supplier', '{"id":"14"}', 'c', NULL, '{"id":"14","name":"ceshi2","supplier_group_id":4,"tel":"18216430852","address":"武荆街60号","note":""}', '2016-04-12 11:00:18'),
(89, NULL, 'erp_supplier_linkman', '{"id":"25"}', 'c', NULL, '{"name":"caccc","supplier_id":14,"mobile":"212312313","tel":"","email":"","qq":"","note":"","id":"25"}', '2016-04-12 11:01:58'),
(91, NULL, 'erp_supplier', '{"id":8}', 'u', '{"update_time":"2016-04-08 11:54:41","note":"55555"}', '{"update_time":"2016-04-12 19:05:12","note":"1111111"}', '2016-04-12 11:05:12'),
(92, NULL, 'erp_supplier', '{"id":13}', 'd', '{"id":"13","name":"ceshi1","supplier_group_id":"2","tel":"18216430852","address":"武荆街60号","partner_id":null,"create_time":"2016-04-12 18:57:08","update_time":"2016-04-12 18:57:08","note":""}', NULL, '2016-04-12 11:07:36'),
(93, NULL, 'erp_supplier_linkman', '{"supplier_id":13}', 'd', '{"id":"22","name":"lixunhuan","supplier_id":"13","mobile":"18216430852","tel":"","email":"123412123@qq.com","qq":"","rank":"0","create_time":"2016-04-12 18:57:08","update_time":"2016-04-12 18:57:08","note":""}', NULL, '2016-04-12 11:07:36'),
(94, NULL, 'erp_supplier', '{"id":14}', 'd', '{"id":"14","name":"ceshi2","supplier_group_id":"4","tel":"18216430852","address":"武荆街60号","partner_id":null,"create_time":"2016-04-12 19:00:18","update_time":"2016-04-12 19:03:32","note":"cccccc"}', NULL, '2016-04-12 11:07:36'),
(95, NULL, 'erp_supplier_linkman', '{"supplier_id":14}', 'd', '{"id":"24","name":"aaa","supplier_id":"14","mobile":"123123123","tel":"12313","email":"","qq":"123","rank":"0","create_time":"2016-04-12 19:00:18","update_time":"2016-04-12 19:00:18","note":"123123"}', NULL, '2016-04-12 11:07:36'),
(96, NULL, 'erp_supplier', '{"id":"15"}', 'c', NULL, '{"id":"15","name":"cs","supplier_group_id":2,"tel":"11","address":"11","note":""}', '2016-04-12 11:09:30'),
(97, NULL, 'erp_supplier', '{"id":15}', 'd', '[{"id":"15","name":"cs","supplier_group_id":"2","tel":"11","address":"11","partner_id":null,"create_time":"2016-04-12 19:09:30","update_time":"2016-04-12 19:09:30","note":""}]', NULL, '2016-04-12 11:09:36'),
(98, NULL, 'erp_supplier_linkman', '{"supplier_id":15}', 'd', '[{"id":"26","name":"11","supplier_id":"15","mobile":"212","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-12 19:09:30","update_time":"2016-04-12 19:09:30","note":""},{"id":"27","name":"333","supplier_id":"15","mobile":"1212","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-12 19:09:30","update_time":"2016-04-12 19:09:30","note":""}]', NULL, '2016-04-12 11:09:36'),
(99, NULL, 'erp_stock_log', '{"id":"69"}', 'c', NULL, '{"partner_id":1,"note":"","no":"1460460117418823","status":0,"id":"69"}', '2016-04-12 11:21:57'),
(100, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"9"}', '{"num":"11"}', '2016-04-12 11:21:57'),
(101, NULL, 'erp_stock', '{"id":4}', 'u', '{"num":"4"}', '{"num":"2"}', '2016-04-12 11:21:57'),
(102, NULL, 'erp_goods', '{"id":"5"}', 'c', NULL, '{"id":"5","name":"乐me","norm":"小型","goods_group_id":3,"note":""}', '2016-04-13 06:11:24'),
(103, NULL, 'erp_goods', '{"id":5}', 'u', '{"name":"乐me","update_time":"2016-04-13 14:13:24"}', '{"name":"乐me音箱","update_time":"2016-04-13 14:15:38"}', '2016-04-13 06:15:38'),
(104, NULL, 'erp_supplier', '{"id":"9"}', 'c', NULL, '{"id":"9","name":"测试","supplier_group_id":2,"tel":"2755124","address":"深圳市","note":""}', '2016-04-13 06:21:39'),
(105, NULL, 'erp_supplier', '{"id":9}', 'd', '[{"id":"9","name":"测试","supplier_group_id":"2","tel":"2755124","address":"深圳市","partner_id":null,"create_time":"2016-04-13 14:21:39","update_time":"2016-04-13 14:21:39","note":""}]', NULL, '2016-04-13 06:28:38'),
(106, NULL, 'erp_supplier_linkman', '{"supplier_id":9}', 'd', '[{"id":"16","name":"刘备","supplier_id":"9","mobile":"18595452458","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-13 14:21:39","update_time":"2016-04-13 14:21:39","note":""}]', NULL, '2016-04-13 06:28:38'),
(107, NULL, 'erp_supplier', '{"id":"10"}', 'c', NULL, '{"id":"10","name":"测试","supplier_group_id":2,"tel":"4361262","address":"湖南省长沙市","note":""}', '2016-04-13 06:41:57'),
(108, NULL, 'erp_supplier', '{"id":10}', 'd', '[{"id":"10","name":"测试","supplier_group_id":"2","tel":"4361262","address":"湖南省长沙市","partner_id":null,"create_time":"2016-04-13 14:41:57","update_time":"2016-04-13 14:41:57","note":""}]', NULL, '2016-04-13 06:42:15'),
(109, NULL, 'erp_supplier_linkman', '{"supplier_id":10}', 'd', '[{"id":"17","name":"关羽","supplier_id":"10","mobile":"158646513221","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-13 14:41:57","update_time":"2016-04-13 14:41:57","note":""}]', NULL, '2016-04-13 06:42:15'),
(110, NULL, 'erp_supplier', '{"id":"11"}', 'c', NULL, '{"id":"11","name":"测试","supplier_group_id":2,"tel":"0739-465125","address":"湖南湘潭雨湖区","note":""}', '2016-04-13 06:45:47'),
(111, NULL, 'erp_supplier', '{"id":11}', 'd', '[{"id":"11","name":"测试","supplier_group_id":"2","tel":"0739-465125","address":"湖南湘潭雨湖区","partner_id":null,"create_time":"2016-04-13 14:45:46","update_time":"2016-04-13 14:45:46","note":""}]', NULL, '2016-04-13 06:45:57'),
(112, NULL, 'erp_supplier_linkman', '{"supplier_id":11}', 'd', '[{"id":"18","name":"张飞","supplier_id":"11","mobile":"18565456554","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-13 14:45:47","update_time":"2016-04-13 14:45:47","note":""}]', NULL, '2016-04-13 06:45:57'),
(113, NULL, 'erp_supplier', '{"id":"12"}', 'c', NULL, '{"id":"12","name":"ceshi","supplier_group_id":2,"tel":"12313","address":"123","note":""}', '2016-04-13 07:04:58'),
(114, NULL, 'erp_supplier', '{"id":12}', 'd', '[{"id":"12","name":"ceshi","supplier_group_id":"2","tel":"12313","address":"123","partner_id":null,"create_time":"2016-04-13 15:04:58","update_time":"2016-04-13 15:04:58","note":""}]', NULL, '2016-04-13 07:05:09'),
(115, NULL, 'erp_supplier_linkman', '{"supplier_id":12}', 'd', '[{"id":"19","name":"123","supplier_id":"12","mobile":"1231","tel":"","email":"","qq":"","rank":"0","create_time":"2016-04-13 15:04:58","update_time":"2016-04-13 15:04:58","note":""}]', NULL, '2016-04-13 07:05:10'),
(116, NULL, 'erp_supplier_group', '{"id":"8"}', 'c', NULL, '{"id":"8","name":"cs","note":"1"}', '2016-04-13 07:38:35'),
(117, NULL, 'erp_supplier_group', '{"id":8}', 'd', '[{"id":"8","name":"cs","note":"1"}]', NULL, '2016-04-13 07:38:43'),
(118, NULL, 'erp_warehouse', '{"id":1}', 'u', '{"update_time":"2016-03-22 13:49:59","note":""}', '{"update_time":"2016-04-13 15:51:22","note":"我是长备注"}', '2016-04-13 07:51:23'),
(119, NULL, 'erp_supplier', '{"id":4}', 'u', '{"update_time":"2016-04-08 10:10:57","note":"beizhu"}', '{"update_time":"2016-04-13 15:54:06","note":"beizhu\\n132\\n123"}', '2016-04-13 07:54:06'),
(120, NULL, 'erp_supplier', '{"id":4}', 'u', '{"update_time":"2016-04-13 15:54:06","note":"beizhu\\n132\\n123"}', '{"update_time":"2016-04-13 15:56:06","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注"}', '2016-04-13 07:56:06'),
(121, NULL, 'erp_supplier', '{"id":4}', 'u', '{"update_time":"2016-04-13 15:56:06","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注"}', '{"update_time":"2016-04-13 15:57:19","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长\\n\\n\\n备注我是长备注我是长备注"}', '2016-04-13 07:57:19'),
(122, NULL, 'erp_supplier', '{"id":4}', 'u', '{"update_time":"2016-04-13 15:57:19","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长\\n\\n\\n备注我是长备注我是长备注"}', '{"update_time":"2016-04-13 15:57:39","note":"我是长备注我是长备注我是长备注我是长备注我是长备注"}', '2016-04-13 07:57:39'),
(123, NULL, 'erp_supplier_group', '{"id":2}', 'u', '{"note":"ceshi1"}', '{"note":"ceshi1123\\r\\nqweq\\r\\nqw\\r\\nqwe"}', '2016-04-13 07:58:59'),
(124, NULL, 'erp_supplier_group', '{"id":2}', 'u', '{"note":"ceshi1123\\r\\nqweq\\r\\nqw\\r\\nqwe"}', '{"note":"ceshi1123  ceshi            hc\\r\\n affffffffffff"}', '2016-04-13 07:59:54'),
(125, NULL, 'erp_supplier_group', '{"id":2}', 'u', '{"note":"ceshi1123  ceshi            hc\\r\\n affffffffffff"}', '{"note":"ceshi112"}', '2016-04-13 08:00:06'),
(126, NULL, 'erp_warehouse', '{"id":1}', 'u', '{"update_time":"2016-04-13 15:51:22","note":"我是长备注"}', '{"update_time":"2016-04-13 16:11:27","note":"我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注"}', '2016-04-13 08:11:27'),
(127, NULL, 'erp_warehouse', '{"id":"4"}', 'c', NULL, '{"id":"4","name":"cs","partner_id":1,"tel":"111","address":"2222","note":"q"}', '2016-04-13 08:23:36'),
(128, NULL, 'erp_warehouse', '{"id":4}', 'd', '[{"id":"4","name":"cs","address":"2222","partner_id":"1","tel":"111","create_time":"2016-04-13 16:23:36","update_time":"2016-04-13 16:23:36","note":"q"}]', NULL, '2016-04-13 08:23:44'),
(129, NULL, 'erp_warehouse', '{"id":"5"}', 'c', NULL, '{"id":"5","name":"测试","partner_id":1,"tel":"111","address":"233","note":""}', '2016-04-13 08:47:38'),
(130, NULL, 'erp_warehouse', '{"id":5}', 'd', '[{"id":"5","name":"测试","address":"233","partner_id":"1","tel":"111","create_time":"2016-04-13 16:47:38","update_time":"2016-04-13 16:47:38","note":""}]', NULL, '2016-04-13 08:47:45'),
(131, NULL, 'erp_supplier_linkman', '{"id":9}', 'd', '[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","email":"123","qq":"","create_time":"2016-03-10 18:09:56","update_time":"2016-03-11 09:33:58","note":"222"}]', NULL, '2016-04-14 02:02:07'),
(132, NULL, 'erp_supplier_linkman', '{"id":10}', 'u', '{"email":"123","update_time":"2016-03-11 09:33:58"}', '{"email":"123@qq.com","update_time":"2016-04-14 12:00:41"}', '2016-04-14 04:00:41'),
(133, NULL, 'erp_supplier_linkman', '{"id":14}', 'u', '{"email":"111","update_time":"2016-03-14 10:49:10"}', '{"email":"111@qq.com","update_time":"2016-04-14 12:00:41"}', '2016-04-14 04:00:41'),
(134, NULL, 'erp_supplier_linkman', '{"id":"16"}', 'c', NULL, '{"id":"16","name":"王五","mobile":"15831553554","email":"540872052@qq.com","qq":"","note":"","supplier_id":4}', '2016-04-14 04:00:41'),
(135, NULL, 'erp_supplier_linkman', '{"id":16}', 'u', '{"name":"王五","update_time":"2016-04-14 12:00:41"}', '{"name":"liubei","update_time":"2016-04-14 14:04:47"}', '2016-04-14 06:04:47'),
(136, NULL, 'erp_warehouse', '{"id":2}', 'u', '{"update_time":"2016-03-14 18:03:31","note":null}', '{"update_time":"2016-04-14 14:08:28","note":"beizhu"}', '2016-04-14 06:08:28'),
(137, NULL, 'erp_warehouse', '{"id":"4"}', 'c', NULL, '{"id":"4","name":"测试仓库","partner_id":1,"tel":"18216430852","address":"武荆街60号","note":""}', '2016-04-14 06:08:51'),
(138, NULL, 'erp_warehouse', '{"id":4}', 'd', '[{"id":"4","name":"测试仓库","address":"武荆街60号","partner_id":"1","tel":"18216430852","create_time":"2016-04-14 14:08:51","update_time":"2016-04-14 14:08:51","note":""}]', NULL, '2016-04-14 06:08:59'),
(139, NULL, 'erp_warehouse', '{"id":"5"}', 'c', NULL, '{"id":"5","name":"测试","partner_id":2,"tel":"18216430852","address":"软件产业基地4A栋","note":""}', '2016-04-14 06:10:56'),
(141, NULL, 'erp_stock_log', '{"id":"2"}', 'c', NULL, '{"title":"transfer","warehouse_id_in":2,"warehouse_id_out":1,"partner_id":1,"create_time":"","note":"","no":"1460619049575570","status":0,"id":"2"}', '2016-04-14 07:30:49'),
(142, NULL, 'erp_stock', '{"id":"3"}', 'c', NULL, '{"goods_id":1,"warehouse_id":2,"num":10,"id":"3"}', '2016-04-14 07:30:49'),
(143, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"10"}', '{"num":"0"}', '2016-04-14 07:30:49'),
(144, NULL, 'erp_stock', '{"id":"4"}', 'c', NULL, '{"goods_id":2,"warehouse_id":2,"num":10,"id":"4"}', '2016-04-14 07:30:49'),
(145, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"10"}', '{"num":"0"}', '2016-04-14 07:30:49'),
(146, NULL, 'erp_stock_log', '{"id":"3"}', 'c', NULL, '{"title":"ttt","warehouse_id_in":1,"warehouse_id_out":2,"partner_id":2,"create_time":"2016-04-14 15:58:34","note":"","no":"1460620757365979","status":0,"id":"3"}', '2016-04-14 07:59:17'),
(147, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"0"}', '{"num":"5"}', '2016-04-14 07:59:17'),
(148, NULL, 'erp_stock', '{"id":3}', 'u', '{"num":"10"}', '{"num":"5"}', '2016-04-14 07:59:17'),
(149, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"5"}', '{"num":"8"}', '2016-04-14 07:59:17'),
(150, NULL, 'erp_stock', '{"id":3}', 'u', '{"num":"5"}', '{"num":"2"}', '2016-04-14 07:59:17'),
(153, NULL, 'erp_stock_log', '{"id":"6"}', 'c', NULL, '{"title":"","warehouse_id_in":0,"warehouse_id_out":2,"partner_id":0,"create_time":"2016-04-14 16:06:57","note":"","no":"1460621326413549","status":0,"id":"6"}', '2016-04-14 08:08:47'),
(154, NULL, 'erp_stock', '{"id":"5"}', 'c', NULL, '{"goods_id":2,"warehouse_id":0,"num":5,"id":"5"}', '2016-04-14 08:08:47'),
(155, NULL, 'erp_stock', '{"id":4}', 'u', '{"num":"10"}', '{"num":"5"}', '2016-04-14 08:08:47'),
(156, NULL, 'erp_supplier', '{"id":"9"}', 'c', NULL, '{"id":"9","name":"zs","tel":"12312313","address":"","note":""}', '2016-04-14 08:11:29'),
(157, NULL, 'erp_supplier', '{"id":"10"}', 'c', NULL, '{"id":"10","name":"zs","tel":"12312313","address":"","note":""}', '2016-04-14 08:11:34'),
(158, NULL, 'erp_supplier', '{"id":"11"}', 'c', NULL, '{"id":"11","name":"zs","tel":"12312313","address":"","note":""}', '2016-04-14 08:11:53'),
(159, NULL, 'erp_supplier', '{"id":"12"}', 'c', NULL, '{"id":"12","name":"zs","tel":"123","address":"","note":""}', '2016-04-14 08:12:23'),
(160, NULL, 'erp_supplier', '{"id":9}', 'd', '[{"id":"9","name":"zs","supplier_group_id":"0","tel":"12312313","address":"","partner_id":null,"create_time":"2016-04-14 16:11:29","update_time":"2016-04-14 16:11:29","note":""}]', NULL, '2016-04-14 08:12:35'),
(161, NULL, 'erp_supplier_linkman', '{"supplier_id":9}', 'd', '[]', NULL, '2016-04-14 08:12:35'),
(162, NULL, 'erp_supplier', '{"id":12}', 'd', '[{"id":"12","name":"zs","supplier_group_id":"0","tel":"123","address":"","partner_id":null,"create_time":"2016-04-14 16:12:23","update_time":"2016-04-14 16:12:23","note":""}]', NULL, '2016-04-14 08:12:41'),
(163, NULL, 'erp_supplier_linkman', '{"supplier_id":12}', 'd', '[{"id":"17","name":"123123","supplier_id":"12","mobile":"123123","email":"","qq":"","create_time":"2016-04-14 16:12:23","update_time":"2016-04-14 16:12:23","note":""}]', NULL, '2016-04-14 08:12:41'),
(164, NULL, 'erp_supplier', '{"id":11}', 'd', '[{"id":"11","name":"zs","supplier_group_id":"0","tel":"12312313","address":"","partner_id":null,"create_time":"2016-04-14 16:11:53","update_time":"2016-04-14 16:11:53","note":""}]', NULL, '2016-04-14 08:12:49'),
(165, NULL, 'erp_supplier_linkman', '{"supplier_id":11}', 'd', '[]', NULL, '2016-04-14 08:12:49'),
(166, NULL, 'erp_supplier', '{"id":10}', 'd', '[{"id":"10","name":"zs","supplier_group_id":"0","tel":"12312313","address":"","partner_id":null,"create_time":"2016-04-14 16:11:34","update_time":"2016-04-14 16:11:34","note":""}]', NULL, '2016-04-14 08:15:03'),
(167, NULL, 'erp_supplier_linkman', '{"supplier_id":10}', 'd', '[]', NULL, '2016-04-14 08:15:03'),
(168, NULL, 'erp_supplier', '{"id":"13"}', 'c', NULL, '{"id":"13","name":"sss","tel":"1812312323","address":"","note":""}', '2016-04-14 08:17:25'),
(169, NULL, 'erp_supplier_linkman', '{"id":"18"}', 'c', NULL, '{"id":"18","name":"zsssss","mobile":"1312123123123","email":"","qq":"","note":"","supplier_id":13}', '2016-04-14 08:17:25'),
(170, NULL, 'erp_supplier', '{"id":13}', 'u', '{"supplier_group_id":"0","update_time":"2016-04-14 16:17:25"}', '{"supplier_group_id":"4","update_time":"2016-04-14 16:21:05"}', '2016-04-14 08:21:05'),
(171, NULL, 'erp_stock_log', '{"id":"7"}', 'c', NULL, '{"title":"ceshi","warehouse_id_out":1,"warehouse_id_in":2,"partner_id":2,"create_time":"2016-04-14 16:30:37","note":"","no":"1460622700511135","status":0,"id":"7"}', '2016-04-14 08:31:40'),
(172, NULL, 'erp_stock', '{"id":3}', 'u', '{"num":"2"}', '{"num":"7"}', '2016-04-14 08:31:41'),
(173, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"8"}', '{"num":"3"}', '2016-04-14 08:31:41'),
(174, NULL, 'erp_warehouse', '{"id":5}', 'u', '{"update_time":"2016-04-14 14:10:56","note":""}', '{"update_time":"2016-04-14 16:38:22","note":"aaa"}', '2016-04-14 08:38:23'),
(180, NULL, 'erp_procurement', '{"id":"6"}', 'c', NULL, '{"title":" 采购","supplier_id":7,"partner_id":1,"update_time":"2016-04-14 17:53:19","total_price":"19640.00","note":"测试","no":"1460627699919552","status":0,"id":"6"}', '2016-04-14 09:54:59'),
(182, NULL, 'erp_procurement', '{"id":"8"}', 'c', NULL, '{"title":"采购","supplier_id":4,"partner_id":1,"update_time":"2016-04-15 10:07:58","total_price":"4000.00","note":"优惠","no":"1460686133344610","status":0,"warehouse_id_in":1,"id":"8"}', '2016-04-15 02:08:53'),
(183, NULL, 'erp_procurement', '{"id":8}', 'u', '{"partner_id":"1","update_time":"2016-04-15 10:07:58"}', '{"partner_id":"2","update_time":"2016-04-15 10:10:39"}', '2016-04-15 02:10:50'),
(184, NULL, 'erp_procurement_detail', '{"id":4}', 'd', '[{"id":"4","procurement_id":"6","goods_id":"1","num":"100","per_price":"50.00","note":null,"create_time":"2016-04-14 17:54:59","update_time":"2016-04-14 18:06:05"}]', NULL, '2016-04-15 02:15:31'),
(185, NULL, 'erp_procurement', '{"id":6}', 'u', '{"total_price":"19640.00","update_time":"2016-04-14 17:53:19"}', '{"total_price":"14600.00","update_time":"2016-04-15 10:37:51"}', '2016-04-15 02:38:13'),
(186, NULL, 'erp_sell', '{"id":"1"}', 'c', NULL, '{"title":"销售","warehouse_id_out":2,"partner_id":1,"customer":"","update_time":"2016-04-15 14:14:28","total_price":"150.00","note":"测试","no":"1460700899414895","status":0,"id":"1"}', '2016-04-15 06:14:59'),
(187, NULL, 'erp_sell', '{"id":1}', 'u', '{"customer":""}', '{"customer":"曹操"}', '2016-04-15 06:38:51'),
(188, NULL, 'erp_procurement', '{"id":6}', 'u', '{"status":"0","update_time":"2016-04-15 10:37:51"}', '{"status":"1","update_time":"2016-04-15 15:51:37"}', '2016-04-15 07:51:38'),
(189, NULL, 'erp_procurement', '{"id":6}', 'u', '{"status":"1","update_time":"2016-04-15 15:51:37"}', '{"status":"2","update_time":"2016-04-15 15:51:42"}', '2016-04-15 07:51:42'),
(190, NULL, 'erp_procurement', '{"id":8}', 'u', '{"status":"0","update_time":"2016-04-15 10:10:39"}', '{"status":"1","update_time":"2016-04-15 16:31:41"}', '2016-04-15 08:31:42'),
(191, NULL, 'erp_stock', '{"id":"5"}', 'c', NULL, '{"goods_id":4,"warehouse_id":1,"num":10,"id":"5"}', '2016-04-15 08:42:08'),
(192, NULL, 'erp_stock', '{"id":"6"}', 'c', NULL, '{"goods_id":5,"warehouse_id":1,"num":20,"id":"6"}', '2016-04-15 08:42:08'),
(193, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"5"}', '{"num":"105"}', '2016-04-15 08:42:08'),
(194, NULL, 'erp_procurement', '{"id":6}', 'u', '{"status":"2","update_time":"2016-04-15 16:41:44"}', '{"status":"3","update_time":"2016-04-15 16:42:08"}', '2016-04-15 08:42:08'),
(195, NULL, 'erp_procurement', '{"id":8}', 'u', '{"status":"1","update_time":"2016-04-15 16:48:29"}', '{"status":"2","update_time":"2016-04-15 16:48:44"}', '2016-04-15 08:48:44'),
(196, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"3"}', '{"num":"33"}', '2016-04-15 08:51:06'),
(197, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"105"}', '{"num":"125"}', '2016-04-15 08:51:06'),
(198, NULL, 'erp_stock', '{"id":5}', 'u', '{"num":"10"}', '{"num":"15"}', '2016-04-15 08:51:06'),
(199, NULL, 'erp_procurement', '{"id":8}', 'u', '{"no":"1460686133344610","status":"2","update_time":"2016-04-15 16:49:47"}', '{"no":"","status":"3","update_time":"2016-04-15 16:51:06"}', '2016-04-15 08:51:06'),
(200, NULL, 'erp_procurement', '{"id":"9"}', 'c', NULL, '{"title":"采购","supplier_id":8,"partner_id":2,"update_time":"2016-04-15 16:54:00","total_price":"2500.00","note":"aa","no":"1460710466653244","status":0,"warehouse_id_in":1,"id":"9"}', '2016-04-15 08:54:26'),
(201, NULL, 'erp_procurement', '{"id":9}', 'u', '{"update_time":"2016-04-15 16:54:00"}', '{"update_time":"2016-04-15 16:54:35"}', '2016-04-15 08:54:37'),
(202, NULL, 'erp_procurement', '{"id":9}', 'u', '{"status":"0","update_time":"2016-04-15 16:54:35"}', '{"status":"2","update_time":"2016-04-15 16:56:39"}', '2016-04-15 08:56:43'),
(205, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"33"}', '{"num":"83"}', '2016-04-15 08:58:56'),
(206, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"83"}', '{"num":"133"}', '2016-04-15 09:00:34'),
(207, NULL, 'erp_procurement', '{"id":9}', 'u', '{"status":"2","update_time":"2016-04-15 16:56:39"}', '{"status":"3","update_time":"2016-04-15 17:00:34"}', '2016-04-15 09:00:34'),
(208, NULL, 'erp_stock_log', '{"id":"8"}', 'c', NULL, '{"title":"","warehouse_id_out":1,"warehouse_id_in":2,"partner_id":2,"create_time":"2016-04-15 17:01:15","note":"","no":"1460710902767501","status":0,"id":"8"}', '2016-04-15 09:01:42'),
(209, NULL, 'erp_stock', '{"id":3}', 'u', '{"num":"7"}', '{"num":"40"}', '2016-04-15 09:01:42'),
(210, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"133"}', '{"num":"100"}', '2016-04-15 09:01:42'),
(211, NULL, 'erp_stock', '{"id":4}', 'u', '{"num":"5"}', '{"num":"30"}', '2016-04-15 09:01:42'),
(212, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"125"}', '{"num":"100"}', '2016-04-15 09:01:42'),
(213, NULL, 'erp_stock', '{"id":"7"}', 'c', NULL, '{"goods_id":5,"warehouse_id":2,"num":5,"id":"7"}', '2016-04-15 09:01:42'),
(214, NULL, 'erp_stock', '{"id":6}', 'u', '{"num":"20"}', '{"num":"15"}', '2016-04-15 09:01:42'),
(215, NULL, 'erp_sell', '{"id":1}', 'u', '{"status":"0"}', '{"status":"-1"}', '2016-04-15 09:06:12'),
(216, NULL, 'erp_sell', '{"id":1}', 'u', '{"status":"-1"}', '{"status":"0"}', '2016-04-15 09:06:19'),
(217, NULL, 'erp_stock', '{"id":3}', 'u', '{"num":"40"}', '{"num":"38"}', '2016-04-15 09:06:25'),
(218, NULL, 'erp_stock', '{"id":4}', 'u', '{"num":"30"}', '{"num":"29"}', '2016-04-15 09:06:25'),
(219, NULL, 'erp_sell', '{"id":1}', 'u', '{"status":"0","update_time":"2016-04-15 14:14:28"}', '{"status":"1","update_time":"2016-04-15 17:06:25"}', '2016-04-15 09:06:25'),
(220, NULL, 'erp_sell', '{"id":"2"}', 'c', NULL, '{"title":"销售","warehouse_id_out":1,"partner_id":1,"customer":"abc","update_time":"2016-04-15 17:07:42","total_price":"2440.00","note":"销售","no":"1460711292336151","status":0,"id":"2"}', '2016-04-15 09:08:12'),
(221, NULL, 'erp_warehouse', '{"id":5}', 'd', '[{"id":"5","name":"测试","address":"软件产业基地4A栋","partner_id":"2","tel":"18216430852","create_time":"2016-04-14 14:10:56","update_time":"2016-04-14 16:38:22","note":"aaa"}]', NULL, '2016-04-15 09:15:12'),
(222, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"100"}', '{"num":"90"}', '2016-04-15 09:39:18'),
(223, NULL, 'erp_stock', '{"id":5}', 'u', '{"num":"15"}', '{"num":"10"}', '2016-04-15 09:39:18'),
(224, NULL, 'erp_sell', '{"id":2}', 'u', '{"status":"0","update_time":"2016-04-15 17:07:42"}', '{"status":"1","update_time":"2016-04-15 17:39:18"}', '2016-04-15 09:39:18'),
(225, NULL, 'erp_stock_log', '{"id":"9"}', 'c', NULL, '{"title":"","warehouse_id_out":1,"warehouse_id_in":3,"partner_id":2,"create_time":"2016-04-15 17:39:35","note":"","no":"1460713197596334","status":0,"id":"9"}', '2016-04-15 09:39:57'),
(226, NULL, 'erp_stock', '{"id":"8"}', 'c', NULL, '{"goods_id":1,"warehouse_id":3,"num":30,"id":"8"}', '2016-04-15 09:39:57'),
(227, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"90"}', '{"num":"60"}', '2016-04-15 09:39:57'),
(228, NULL, 'erp_stock', '{"id":"9"}', 'c', NULL, '{"goods_id":2,"warehouse_id":3,"num":20,"id":"9"}', '2016-04-15 09:39:57'),
(229, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"100"}', '{"num":"80"}', '2016-04-15 09:39:57'),
(230, NULL, 'erp_stock', '{"id":"10"}', 'c', NULL, '{"goods_id":4,"warehouse_id":3,"num":3,"id":"10"}', '2016-04-15 09:39:57'),
(231, NULL, 'erp_stock', '{"id":5}', 'u', '{"num":"10"}', '{"num":"7"}', '2016-04-15 09:39:57'),
(232, NULL, 'erp_stock', '{"id":"11"}', 'c', NULL, '{"goods_id":5,"warehouse_id":3,"num":5,"id":"11"}', '2016-04-15 09:39:57'),
(233, NULL, 'erp_stock', '{"id":6}', 'u', '{"num":"15"}', '{"num":"10"}', '2016-04-15 09:39:57'),
(234, NULL, 'erp_sell', '{"id":"3"}', 'c', NULL, '{"title":"xxxx","warehouse_id_out":3,"partner_id":2,"customer":"","update_time":"2016-04-15 17:40:05","total_price":"1114.00","note":"","no":"1460713244553625","status":0,"id":"3"}', '2016-04-15 09:40:44'),
(235, NULL, 'erp_stock', '{"id":11}', 'u', '{"num":"5"}', '{"num":"2"}', '2016-04-15 09:40:55'),
(236, NULL, 'erp_stock', '{"id":9}', 'u', '{"num":"20"}', '{"num":"18"}', '2016-04-15 09:40:55'),
(237, NULL, 'erp_stock', '{"id":8}', 'u', '{"num":"30"}', '{"num":"27"}', '2016-04-15 09:40:55'),
(238, NULL, 'erp_sell', '{"id":3}', 'u', '{"status":"0","update_time":"2016-04-15 17:40:05"}', '{"status":"1","update_time":"2016-04-15 17:40:55"}', '2016-04-15 09:40:55'),
(239, NULL, 'erp_goods', '{"id":"6"}', 'c', NULL, '{"id":"6","name":"乐me音箱","norm":"大型","price":"588","goods_group_id":3,"note":""}', '2016-04-19 01:37:54'),
(240, NULL, 'erp_goods', '{"id":"7"}', 'c', NULL, '{"id":"7","name":"乐me一体机","norm":"黑色","price":"388","goods_group_id":2,"note":""}', '2016-04-19 01:41:03'),
(241, NULL, 'erp_goods_group', '{"id":3}', 'u', '{"name":"乐me音箱"}', '{"name":"音箱"}', '2016-04-19 01:44:24'),
(242, NULL, 'erp_procurement', '{"id":"10"}', 'c', NULL, '{"title":"11","supplier_id":4,"partner_id":1,"update_time":"2016-04-22 17:20:05","total_price":"1626.00","note":"","no":"1461316833970693","status":0,"warehouse_id_in":1,"id":"10"}', '2016-04-22 09:20:33'),
(243, NULL, 'erp_procurement', '{"id":10}', 'u', '{"status":"0","update_time":"2016-04-22 17:20:05"}', '{"status":"1","update_time":"2016-04-22 17:20:44"}', '2016-04-22 09:20:44'),
(244, NULL, 'erp_procurement', '{"id":10}', 'u', '{"total_price":"1626.00","update_time":"2016-04-22 17:20:44"}', '{"total_price":"2176.00","update_time":"2016-04-22 17:20:58"}', '2016-04-22 09:21:02'),
(245, NULL, 'erp_procurement_detail', '{"id":9}', 'u', '{"num":"1","update_time":"2016-04-22 17:20:33"}', '{"num":"12","update_time":"2016-04-22 17:21:02"}', '2016-04-22 09:21:02'),
(246, NULL, 'erp_procurement', '{"id":10}', 'u', '{"status":"1","update_time":"2016-04-22 17:20:58"}', '{"status":"2","update_time":"2016-04-22 17:21:09"}', '2016-04-22 09:21:09'),
(247, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"60"}', '{"num":"72"}', '2016-04-22 09:21:18'),
(248, NULL, 'erp_stock', '{"id":1}', 'u', '{"num":"72"}', '{"num":"83"}', '2016-04-22 09:21:18'),
(249, NULL, 'erp_stock', '{"id":2}', 'u', '{"num":"80"}', '{"num":"81"}', '2016-04-22 09:21:18'),
(250, NULL, 'erp_stock', '{"id":"12"}', 'c', NULL, '{"goods_id":6,"warehouse_id":1,"num":1,"id":"12"}', '2016-04-22 09:21:18'),
(251, NULL, 'erp_stock', '{"id":"13"}', 'c', NULL, '{"goods_id":7,"warehouse_id":1,"num":1,"id":"13"}', '2016-04-22 09:21:18'),
(252, NULL, 'erp_procurement', '{"id":10}', 'u', '{"status":"2","update_time":"2016-04-22 17:21:09"}', '{"status":"3","update_time":"2016-04-22 17:21:18"}', '2016-04-22 09:21:18');

-- --------------------------------------------------------

--
-- 表的结构 `erp_log_user`
--

CREATE TABLE `erp_log_user` (
  `id` int(11) NOT NULL,
  `who` varchar(100) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event` varchar(1024) NOT NULL COMMENT '事件',
  `crud` varchar(100) DEFAULT NULL COMMENT '增删改查',
  `param` varchar(4096) DEFAULT NULL COMMENT 'post参数',
  `action` varchar(1024) NOT NULL COMMENT '当前操作的URL地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日志表';

--
-- 转存表中的数据 `erp_log_user`
--

INSERT INTO `erp_log_user` (`id`, `who`, `create_time`, `event`, `crud`, `param`, `action`) VALUES
(2, 'zhangsan', '2016-04-07 07:11:29', '编辑供应商和联系人信息', 'update', '{"supplier":{"id":"8","name":"\\u534e\\u7f8e","supplier_group_id":"3","tel":"0546-3165131","address":"\\u6df1\\u5733\\u5e02\\u798f\\u7530\\u533a\\u9999\\u6885\\u5317","note":"\\u65e0"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(3, 'zhangsan', '2016-04-07 07:15:01', '编辑供应商和联系人信息', 'update', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"无"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(4, 'zhangsan', '2016-04-07 07:30:08', '编辑供应商和联系人信息', 'update', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"无"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(5, 'zhangsan', '2016-04-07 08:22:12', '编辑供应商(天翼)详细信息', 'update', '{"supplier":{"id":"4","name":"天翼","supplier_group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"beizhu"},"linkmanList":[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","tel":"1111111","email":"123","qq":"","note":"222"},{"id":"10","name":"zhangsan","supplier_id":"4","mobile":"18216430852","tel":"233","email":"123","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","supplier_id":"4","mobile":"12312312333","tel":"3334","email":"111","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(6, 'zhangsan', '2016-04-07 09:25:48', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"7","name":"broadin","supplier_group_id":"4","tel":"0739-123456","address":"广东省深圳人南山区软件产业基地4栋A座","note":"再一次测试"},"linkmanList":[{"id":"1","name":"jyx","supplier_id":"7","mobile":"01234567890","tel":"","email":"jiangyixin@broadin.cn","qq":"","note":""},{"id":"2","name":"王五","supplier_id":"7","mobile":"18216430852","tel":"012345","email":"test@broadin.cn","qq":"999","note":""},{"id":"7","name":"lisi","supplier_id":"7","mobile":"4626431","tel":"","email":"111@broadin.cn","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(7, 'zhangsan', '2016-04-07 09:38:51', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"无1"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(8, 'zhangsan', '2016-04-07 09:43:13', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"wuuuuuuuuuuu"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(9, 'zhangsan', '2016-04-07 09:45:28', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"11111"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(10, 'zhangsan', '2016-04-07 09:46:09', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"cccc"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(11, 'zhangsan', '2016-04-07 09:53:19', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"aaaa"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(12, 'zhangsan', '2016-04-07 10:02:13', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"rrrr"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(13, 'zhangsan', '2016-04-07 10:03:45', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"hahaha"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(14, 'zhangsan', '2016-04-08 01:51:47', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"7","name":"broadin","supplier_group_id":"4","tel":"0739-123456","address":"广东省深圳人南山区软件产业基地4栋A座","note":"…………"},"linkmanList":[{"id":"1","name":"jyx","supplier_id":"7","mobile":"01234567890","tel":"","email":"jiangyixin@broadin.cn","qq":"","note":""},{"id":"2","name":"王五","supplier_id":"7","mobile":"18216430852","tel":"012345","email":"test@broadin.cn","qq":"999","note":""},{"id":"7","name":"lisi","supplier_id":"7","mobile":"4626431","tel":"","email":"111@broadin.cn","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(15, 'zhangsan', '2016-04-08 01:53:19', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"7","name":"broadin","supplier_group_id":"4","tel":"0739-123456","address":"广东省深圳人南山区软件产业基地4栋A座","note":"hahaha"},"linkmanList":[{"id":"1","name":"jyx","supplier_id":"7","mobile":"01234567890","tel":"540264","email":"jiangyixin@broadin.cn","qq":"","note":""},{"id":"2","name":"王五","supplier_id":"7","mobile":"18216430852","tel":"012345","email":"test@broadin.cn","qq":"999","note":""},{"id":"7","name":"lisi","supplier_id":"7","mobile":"4626431","tel":"","email":"111@broadin.cn","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(16, 'zhangsan', '2016-04-08 01:54:20', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"7","name":"broadin","supplier_group_id":"4","tel":"0739-123456","address":"广东省深圳人南山区软件产业基地4栋A座","note":"………………"},"linkmanList":[{"id":"1","name":"jyx","supplier_id":"7","mobile":"01234567890","tel":"540264","email":"jiangyixin@broadin.cn","qq":"","note":""},{"id":"2","name":"王五","supplier_id":"7","mobile":"18216430852","tel":"012345","email":"test@broadin.cn","qq":"999","note":""},{"id":"7","name":"lisi","supplier_id":"7","mobile":"4626431","tel":"44444","email":"111@broadin.cn","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(17, 'zhangsan', '2016-04-08 01:59:38', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"hahaha"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(18, 'zhangsan', '2016-04-08 02:02:57', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"000000"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(19, 'zhangsan', '2016-04-08 02:17:36', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"qaz"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(20, 'zhangsan', '2016-04-08 03:47:37', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"哈哈哈哈"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(21, 'zhangsan', '2016-04-08 03:50:50', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"cccc"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(22, 'zhangsan', '2016-04-08 03:54:42', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"55555"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"6666","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(23, 'zhangsan', '2016-04-08 03:58:38', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"55555"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"4361261","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(24, 'zhangsan', '2016-04-08 04:31:52', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"55555"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"4361261","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(25, 'zhangsan', '2016-04-08 07:11:33', '编辑供应商和联系人信息', 'u', '{"supplier":{"id":"","name":"测试","supplier_group_id":"7","tel":"0379-6316532","address":"我是一个地址","note":""},"linkmanList":[{"name":"名字1","supplier_id":"","mobile":"1835615325","tel":"566651","email":"5454545@qq.com","qq":"","note":""},{"name":"名字2","supplier_id":"","mobile":"1856413512","tel":"","email":"","qq":"65461315","note":"141"}]}', 'Admin/Supplier/supplierEdit'),
(26, 'zhangsan', '2016-04-12 09:32:35', '编辑供应商(测试2)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试2","supplier_group_id":"3","tel":"132845254","address":"啊啊啊啊啊啊啊啊啊啊啊","note":"aaaaaaaaaaaaaa"},"linkmanList":[{"name":"李寻欢","supplier_id":"","mobile":"5555555555","tel":"","email":"","qq":"","note":""},{"name":"wwwwww","supplier_id":"","mobile":"54646488","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(27, 'zhangsan', '2016-04-12 09:33:23', '编辑供应商(测试3)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试3","supplier_group_id":"2","tel":"18216430852","address":"武荆街60号","note":""},"linkmanList":[{"name":"拳头","supplier_id":"","mobile":"18651565616","tel":"","email":"23424@qq.com","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(28, 'zhangsan', '2016-04-12 09:45:42', '编辑供应商(测试4)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试4","supplier_group_id":"4","tel":"369852147","address":"广东省","note":""},"linkmanList":[{"name":"qq","supplier_id":"","mobile":"22222222","tel":"33333333","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(29, 'zhangsan', '2016-04-12 10:40:09', '删除供应商(["\\u6d4b\\u8bd54"])以及当前供应商所有联系人', 'd', '{"ids":["12"]}', 'Admin/Supplier/supplierDel'),
(30, 'zhangsan', '2016-04-12 10:57:08', '新增供应商(ceshi1)和联系人信息', 'u', '{"supplier":{"id":"","name":"ceshi1","supplier_group_id":"2","tel":"18216430852","address":"武荆街60号","note":""},"linkmanList":[{"name":"lixunhuan","supplier_id":"","mobile":"18216430852","tel":"","email":"123412123@qq.com","qq":"","note":""},{"name":"chuliuxiang","supplier_id":"","mobile":"19832131312","tel":"1111231","email":"","qq":"9123091","note":""}]}', 'Admin/Supplier/supplierEdit'),
(31, 'zhangsan', '2016-04-12 11:00:18', '新增供应商(ceshi2)和联系人信息', 'u', '{"supplier":{"id":"","name":"ceshi2","supplier_group_id":"4","tel":"18216430852","address":"武荆街60号","note":""},"linkmanList":[{"name":"aaa","supplier_id":"","mobile":"123123123","tel":"12313","email":"","qq":"123","note":"123123"}]}', 'Admin/Supplier/supplierEdit'),
(32, 'zhangsan', '2016-04-12 11:01:58', '编辑供应商(ceshi2)和联系人信息', 'u', '{"supplier":{"id":"14","name":"ceshi2","supplier_group_id":"4","tel":"18216430852","address":"武荆街60号","note":"aaaaaa"},"linkmanList":[{"id":"24","name":"aaa","supplier_id":"14","mobile":"123123123","tel":"12313","email":"","qq":"123","note":"123123"},{"name":"caccc","supplier_id":"14","mobile":"212312313","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(33, 'zhangsan', '2016-04-12 11:03:32', '编辑供应商(ceshi2)和联系人信息', 'u', '{"supplier":{"id":"14","name":"ceshi2","supplier_group_id":"4","tel":"18216430852","address":"武荆街60号","note":"cccccc"},"linkmanList":[{"id":"24","name":"aaa","supplier_id":"14","mobile":"123123123","tel":"12313","email":"","qq":"123","note":"123123"},{"id":"25","name":"caccc","supplier_id":"14","mobile":"212312313","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(34, 'zhangsan', '2016-04-12 11:05:12', '编辑供应商(华美)和联系人信息', 'u', '{"supplier":{"id":"8","name":"华美","supplier_group_id":"3","tel":"0546-3165131","address":"深圳市福田区香梅北","note":"1111111"},"linkmanList":[{"id":"15","name":"AlphaGo","supplier_id":"8","mobile":"1835152312","tel":"4361261","email":"1234@qq.com","qq":"1234","note":""}]}', 'Admin/Supplier/supplierEdit'),
(35, 'zhangsan', '2016-04-12 11:07:36', '删除供应商(["ceshi1","ceshi2"])以及当前供应商所有联系人', 'd', '{"ids":["13","14"]}', 'Admin/Supplier/supplierDel'),
(36, 'zhangsan', '2016-04-12 11:09:30', '新增供应商(cs)和联系人信息', 'u', '{"supplier":{"id":"","name":"cs","supplier_group_id":"2","tel":"11","address":"11","note":""},"linkmanList":[{"name":"11","supplier_id":"","mobile":"212","tel":"","email":"","qq":"","note":""},{"name":"333","supplier_id":"","mobile":"1212","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(37, 'zhangsan', '2016-04-12 11:09:36', '删除供应商(["cs"])以及当前供应商所有联系人', 'd', '{"id":"15"}', 'Admin/Supplier/supplierDel'),
(38, 'zhangsan', '2016-04-13 06:21:39', '新增供应商(测试)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试","supplier_group_id":"2","tel":"2755124","address":"深圳市","note":""},"linkmanList":[{"name":"刘备","supplier_id":"","mobile":"18595452458","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(39, 'zhangsan', '2016-04-13 06:28:38', '删除供应商(["\\u6d4b\\u8bd5"])以及当前供应商所有联系人', 'd', '{"id":"9"}', 'Admin/Supplier/supplierDel'),
(40, 'zhangsan', '2016-04-13 06:41:57', '新增供应商(测试)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试","supplier_group_id":"2","tel":"4361262","address":"湖南省长沙市","note":""},"linkmanList":[{"name":"关羽","supplier_id":"","mobile":"158646513221","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(41, 'zhangsan', '2016-04-13 06:42:15', '删除供应商(["\\u6d4b\\u8bd5"])以及当前供应商所有联系人', 'd', '{"id":"10"}', 'Admin/Supplier/supplierDel'),
(42, 'zhangsan', '2016-04-13 06:45:47', '新增供应商(测试)和联系人信息', 'u', '{"supplier":{"id":"","name":"测试","supplier_group_id":"2","tel":"0739-465125","address":"湖南湘潭雨湖区","note":""},"linkmanList":[{"name":"张飞","supplier_id":"","mobile":"18565456554","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(43, 'zhangsan', '2016-04-13 06:45:57', '删除供应商(["\\u6d4b\\u8bd5"])以及当前供应商所有联系人', 'd', '{"id":"11"}', 'Admin/Supplier/supplierDel'),
(44, 'zhangsan', '2016-04-13 07:04:58', '新增供应商(ceshi)和联系人信息', 'u', '{"supplier":{"id":"","name":"ceshi","supplier_group_id":"2","tel":"12313","address":"123","note":""},"linkmanList":[{"name":"123","supplier_id":"","mobile":"1231","tel":"","email":"","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(45, 'zhangsan', '2016-04-13 07:05:10', '删除供应商(["ceshi"])以及当前供应商所有联系人', 'd', '{"id":"12"}', 'Admin/Supplier/supplierDel'),
(46, 'zhangsan', '2016-04-13 07:54:06', '编辑供应商(天翼)和联系人信息', 'u', '{"supplier":{"id":"4","name":"天翼","supplier_group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"beizhu\\n132\\n123"},"linkmanList":[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","tel":"1111111","email":"123","qq":"","note":"222"},{"id":"10","name":"zhangsan","supplier_id":"4","mobile":"18216430852","tel":"233","email":"123","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","supplier_id":"4","mobile":"12312312333","tel":"3334","email":"111","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(47, 'zhangsan', '2016-04-13 07:56:06', '编辑供应商(天翼)和联系人信息', 'u', '{"supplier":{"id":"4","name":"天翼","supplier_group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注"},"linkmanList":[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","tel":"1111111","email":"123","qq":"","note":"222"},{"id":"10","name":"zhangsan","supplier_id":"4","mobile":"18216430852","tel":"233","email":"123","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","supplier_id":"4","mobile":"12312312333","tel":"3334","email":"111","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(48, 'zhangsan', '2016-04-13 07:57:19', '编辑供应商(天翼)和联系人信息', 'u', '{"supplier":{"id":"4","name":"天翼","supplier_group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"我是长备注我是长备注我是长备注我是长备注我是长备注\\n我是长备注我是长备注我是长备注我是长备注我是长\\n\\n\\n备注我是长备注我是长备注"},"linkmanList":[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","tel":"1111111","email":"123","qq":"","note":"222"},{"id":"10","name":"zhangsan","supplier_id":"4","mobile":"18216430852","tel":"233","email":"123","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","supplier_id":"4","mobile":"12312312333","tel":"3334","email":"111","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(49, 'zhangsan', '2016-04-13 07:57:39', '编辑供应商(天翼)和联系人信息', 'u', '{"supplier":{"id":"4","name":"天翼","supplier_group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"我是长备注我是长备注我是长备注我是长备注我是长备注"},"linkmanList":[{"id":"9","name":"lisi","supplier_id":"4","mobile":"18216430852","tel":"1111111","email":"123","qq":"","note":"222"},{"id":"10","name":"zhangsan","supplier_id":"4","mobile":"18216430852","tel":"233","email":"123","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","supplier_id":"4","mobile":"12312312333","tel":"3334","email":"111","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(50, 'zhangsan', '2016-04-14 02:02:07', '删除联系人', 'd', '{"id":"9"}', 'Admin/Supplier/linkmanDel'),
(51, 'zhangsan', '2016-04-14 04:00:42', '编辑供应商(天翼)和联系人信息', 'u', '{"supplier":{"id":"4","name":"天翼","group_id":"3","tel":"0739-123456","address":"广东省深圳市福田区","note":"我是长备注我是长备注我是长备注我是长备注我是长备注"},"linkManList":[{"id":"10","name":"zhangsan","mobile":"18216430852","email":"123@qq.com","qq":"123","note":"123"},{"id":"14","name":"zhaoliu","mobile":"12312312333","email":"111@qq.com","qq":"","note":""},{"id":"","name":"王五","mobile":"15831553554","email":"540872052@qq.com","qq":"","note":""}]}', 'Admin/Supplier/supplierEdit'),
(52, 'zhangsan', '2016-04-14 08:12:41', '删除供应商(["zs"])以及当前供应商所有联系人', 'd', '{"id":"12"}', 'Admin/Supplier/supplierDel');

-- --------------------------------------------------------

--
-- 表的结构 `erp_partner`
--

CREATE TABLE `erp_partner` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL COMMENT '部门',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='员工表';

--
-- 转存表中的数据 `erp_partner`
--

INSERT INTO `erp_partner` (`id`, `name`, `tel`, `email`, `department`, `create_time`, `update_time`) VALUES
(1, '张三', '1234567890', '', '开发', '2016-03-09 02:34:23', '2016-03-09 02:34:23'),
(2, '李四', '135253225614', '', '商务', '2016-03-09 02:35:28', '2016-03-09 02:36:12');

-- --------------------------------------------------------

--
-- 表的结构 `erp_procurement`
--

CREATE TABLE `erp_procurement` (
  `id` int(11) NOT NULL,
  `no` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '编码',
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '主题',
  `supplier_id` int(11) NOT NULL COMMENT '供应商',
  `warehouse_id_in` int(11) NOT NULL COMMENT '采购仓库',
  `total_price` decimal(10,2) NOT NULL COMMENT '总价',
  `status` int(11) NOT NULL COMMENT '状态',
  `partner_id` int(11) NOT NULL COMMENT '负责人',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采购表';

--
-- 转存表中的数据 `erp_procurement`
--

INSERT INTO `erp_procurement` (`id`, `no`, `title`, `supplier_id`, `warehouse_id_in`, `total_price`, `status`, `partner_id`, `create_time`, `update_time`, `note`) VALUES
(6, '1460627699919552', ' 采购', 7, 1, '14600.00', 3, 1, '2016-04-14 09:54:59', '2016-04-15 08:42:08', '测试'),
(8, '1460627699956458', '采购', 4, 1, '4000.00', 3, 2, '2016-04-15 02:08:53', '2016-04-15 08:52:06', '优惠'),
(9, '1460710466653244', '采购', 8, 1, '2500.00', 3, 2, '2016-04-15 08:54:26', '2016-04-15 09:00:34', 'aa'),
(10, '1461316833970693', '11', 4, 1, '2176.00', 3, 1, '2016-04-22 09:20:33', '2016-04-22 09:21:18', '');

-- --------------------------------------------------------

--
-- 表的结构 `erp_procurement_detail`
--

CREATE TABLE `erp_procurement_detail` (
  `id` int(11) NOT NULL,
  `procurement_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL COMMENT '商品',
  `num` int(11) NOT NULL COMMENT '数目',
  `per_price` decimal(10,2) NOT NULL COMMENT '单价',
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采购详情';

--
-- 转存表中的数据 `erp_procurement_detail`
--

INSERT INTO `erp_procurement_detail` (`id`, `procurement_id`, `goods_id`, `num`, `per_price`, `note`, `create_time`, `update_time`) VALUES
(1, 6, 4, 10, '388.00', NULL, '2016-04-14 09:54:59', '2016-04-14 10:06:53'),
(2, 6, 5, 20, '288.00', NULL, '2016-04-14 09:54:59', '2016-04-14 10:06:49'),
(3, 6, 2, 100, '50.00', NULL, '2016-04-14 09:54:59', '2016-04-14 10:06:10'),
(5, 8, 1, 30, '50.00', NULL, '2016-04-15 02:08:53', '2016-04-15 02:08:53'),
(6, 8, 2, 20, '50.00', NULL, '2016-04-15 02:08:53', '2016-04-15 02:08:53'),
(7, 8, 4, 5, '388.00', NULL, '2016-04-15 02:08:53', '2016-04-15 02:08:53'),
(8, 9, 1, 50, '50.00', NULL, '2016-04-15 08:54:26', '2016-04-15 08:54:26'),
(9, 10, 1, 12, '50.00', NULL, '2016-04-22 09:20:33', '2016-04-22 09:21:02'),
(10, 10, 1, 11, '50.00', NULL, '2016-04-22 09:20:33', '2016-04-22 09:20:33'),
(11, 10, 2, 1, '50.00', NULL, '2016-04-22 09:20:33', '2016-04-22 09:20:33'),
(12, 10, 6, 1, '588.00', NULL, '2016-04-22 09:20:33', '2016-04-22 09:20:33'),
(13, 10, 7, 1, '388.00', NULL, '2016-04-22 09:20:33', '2016-04-22 09:20:33');

-- --------------------------------------------------------

--
-- 表的结构 `erp_sell`
--

CREATE TABLE `erp_sell` (
  `id` int(11) NOT NULL,
  `no` varchar(32) NOT NULL COMMENT '编号',
  `title` varchar(100) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `warehouse_id_out` int(11) NOT NULL COMMENT '销售仓库',
  `customer` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '客户',
  `status` int(11) NOT NULL DEFAULT '0',
  `partner_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='销售';

--
-- 转存表中的数据 `erp_sell`
--

INSERT INTO `erp_sell` (`id`, `no`, `title`, `total_price`, `warehouse_id_out`, `customer`, `status`, `partner_id`, `create_time`, `update_time`, `note`) VALUES
(1, '1460700899414895', '销售', '150.00', 2, '曹操', 1, 1, '2016-04-15 06:14:59', '2016-04-15 09:06:25', '测试'),
(2, '1460711292336151', '销售', '2440.00', 1, 'abc', 1, 1, '2016-04-15 09:08:12', '2016-04-15 09:39:18', '销售'),
(3, '1460713244553625', 'xxxx', '1114.00', 3, '', 1, 2, '2016-04-15 09:40:44', '2016-04-15 09:40:55', '');

-- --------------------------------------------------------

--
-- 表的结构 `erp_sell_detail`
--

CREATE TABLE `erp_sell_detail` (
  `id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `per_price` decimal(10,2) NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='销售详情';

--
-- 转存表中的数据 `erp_sell_detail`
--

INSERT INTO `erp_sell_detail` (`id`, `sell_id`, `goods_id`, `num`, `per_price`, `note`, `create_time`, `update_time`) VALUES
(1, 1, 1, 2, '50.00', NULL, '2016-04-15 06:14:59', '2016-04-15 06:14:59'),
(2, 1, 2, 1, '50.00', NULL, '2016-04-15 06:14:59', '2016-04-15 06:14:59'),
(3, 2, 1, 10, '50.00', NULL, '2016-04-15 09:08:12', '2016-04-15 09:08:12'),
(4, 2, 4, 5, '388.00', NULL, '2016-04-15 09:08:12', '2016-04-15 09:08:12'),
(5, 3, 5, 3, '288.00', NULL, '2016-04-15 09:40:44', '2016-04-15 09:40:44'),
(6, 3, 2, 2, '50.00', NULL, '2016-04-15 09:40:44', '2016-04-15 09:40:44'),
(7, 3, 1, 3, '50.00', NULL, '2016-04-15 09:40:44', '2016-04-15 09:40:44');

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock`
--

CREATE TABLE `erp_stock` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL COMMENT '商品信息',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库',
  `num` int(11) NOT NULL COMMENT '数目',
  `status` smallint(6) NOT NULL COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存';

--
-- 转存表中的数据 `erp_stock`
--

INSERT INTO `erp_stock` (`id`, `goods_id`, `warehouse_id`, `num`, `status`, `create_time`, `update_time`) VALUES
(1, 1, 1, 83, 0, '2016-04-13 08:33:11', '2016-04-13 08:33:11'),
(2, 2, 1, 81, 0, '2016-04-13 08:33:35', '2016-04-14 08:33:15'),
(3, 1, 2, 38, 0, '2016-04-14 07:30:49', '2016-04-14 07:30:49'),
(4, 2, 2, 29, 0, '2016-04-14 07:30:49', '2016-04-14 07:30:49'),
(5, 4, 1, 7, 0, '2016-04-15 08:42:08', '2016-04-15 08:42:08'),
(6, 5, 1, 10, 0, '2016-04-15 08:42:08', '2016-04-15 08:42:08'),
(7, 5, 2, 5, 0, '2016-04-15 09:01:42', '2016-04-15 09:01:42'),
(8, 1, 3, 27, 0, '2016-04-15 09:39:57', '2016-04-15 09:39:57'),
(9, 2, 3, 18, 0, '2016-04-15 09:39:57', '2016-04-15 09:39:57'),
(10, 4, 3, 3, 0, '2016-04-15 09:39:57', '2016-04-15 09:39:57'),
(11, 5, 3, 2, 0, '2016-04-15 09:39:57', '2016-04-15 09:39:57'),
(12, 6, 1, 1, 0, '2016-04-22 09:21:18', '2016-04-22 09:21:18'),
(13, 7, 1, 1, 0, '2016-04-22 09:21:18', '2016-04-22 09:21:18');

-- --------------------------------------------------------

--
-- 表的结构 `erp_stocktaking`
--

CREATE TABLE `erp_stocktaking` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存盘点';

-- --------------------------------------------------------

--
-- 表的结构 `erp_stocktaking_detail`
--

CREATE TABLE `erp_stocktaking_detail` (
  `id` int(11) NOT NULL,
  `stocktaking_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `per_num` int(11) NOT NULL COMMENT '盘点前库存数',
  `cur_num` int(11) NOT NULL COMMENT '盘点后库存数',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存盘点详情';

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock_log`
--

CREATE TABLE `erp_stock_log` (
  `id` int(11) NOT NULL,
  `no` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '订单编号',
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '主题',
  `warehouse_id_in` int(11) DEFAULT NULL COMMENT '进货仓库',
  `warehouse_id_out` int(11) DEFAULT NULL COMMENT '出货仓库',
  `partner_id` int(11) NOT NULL COMMENT '负责人',
  `status` smallint(6) NOT NULL COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存操作记录';

--
-- 转存表中的数据 `erp_stock_log`
--

INSERT INTO `erp_stock_log` (`id`, `no`, `title`, `warehouse_id_in`, `warehouse_id_out`, `partner_id`, `status`, `create_time`, `note`) VALUES
(3, '1460620757365979', 'ttt', 1, 2, 2, 0, '2016-04-14 07:58:34', ''),
(7, '1460622700511135', 'ceshi', 2, 1, 2, 0, '2016-04-14 08:30:37', ''),
(8, '1460710902767501', '', 2, 1, 2, 0, '2016-04-15 09:01:15', ''),
(9, '1460713197596334', '', 3, 1, 2, 0, '2016-04-15 09:39:35', '');

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock_log_detail`
--

CREATE TABLE `erp_stock_log_detail` (
  `id` int(11) NOT NULL,
  `stock_log_id` int(11) NOT NULL COMMENT '操作记录',
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存操作详细情况';

--
-- 转存表中的数据 `erp_stock_log_detail`
--

INSERT INTO `erp_stock_log_detail` (`id`, `stock_log_id`, `goods_id`, `num`, `note`, `create_time`) VALUES
(1, 3, 1, 5, NULL, '2016-04-14 07:59:17'),
(2, 3, 1, 3, NULL, '2016-04-14 07:59:17'),
(3, 6, 2, 5, NULL, '2016-04-14 08:08:47'),
(4, 7, 1, 5, NULL, '2016-04-14 08:31:41'),
(5, 8, 1, 33, NULL, '2016-04-15 09:01:42'),
(6, 8, 2, 25, NULL, '2016-04-15 09:01:42'),
(7, 8, 5, 5, NULL, '2016-04-15 09:01:42'),
(8, 9, 1, 30, NULL, '2016-04-15 09:39:57'),
(9, 9, 2, 20, NULL, '2016-04-15 09:39:57'),
(10, 9, 4, 3, NULL, '2016-04-15 09:39:57'),
(11, 9, 5, 5, NULL, '2016-04-15 09:39:57');

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock_purchase`
--

CREATE TABLE `erp_stock_purchase` (
  `id` int(11) NOT NULL,
  `stock_log_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='入库详情表';

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock_sales`
--

CREATE TABLE `erp_stock_sales` (
  `id` int(11) NOT NULL,
  `stock_log_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `customer` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '客户',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='出库详情表';

-- --------------------------------------------------------

--
-- 表的结构 `erp_stock_transfer`
--

CREATE TABLE `erp_stock_transfer` (
  `id` int(11) NOT NULL,
  `stock_log_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `warehouse_id_out` int(11) NOT NULL COMMENT '出库仓库',
  `warehouse_id_in` int(11) NOT NULL COMMENT '入库仓库',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='调拨详情表';

-- --------------------------------------------------------

--
-- 表的结构 `erp_supplier`
--

CREATE TABLE `erp_supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `supplier_group_id` int(11) NOT NULL COMMENT '供应商分组',
  `tel` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '供应商电话',
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `partner_id` int(11) DEFAULT NULL COMMENT '博广负责人',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商';

--
-- 转存表中的数据 `erp_supplier`
--

INSERT INTO `erp_supplier` (`id`, `name`, `supplier_group_id`, `tel`, `address`, `partner_id`, `create_time`, `update_time`, `note`) VALUES
(4, '天翼', 3, '0739-123456', '广东省深圳市福田区', NULL, '2016-03-03 07:18:03', '2016-04-13 07:57:39', '我是长备注我是长备注我是长备注我是长备注我是长备注'),
(7, 'broadin', 4, '0739-123456', '广东省深圳人南山区软件产业基地4栋A座', NULL, '2016-03-03 07:51:32', '2016-04-08 02:10:12', '………………'),
(8, '华美', 3, '0546-3165131', '深圳市福田区香梅北', NULL, '2016-03-15 01:18:33', '2016-04-12 11:05:12', '1111111'),
(13, 'sss', 4, '1812312323', '', NULL, '2016-04-14 08:17:25', '2016-04-14 08:21:05', '');

-- --------------------------------------------------------

--
-- 表的结构 `erp_supplier_group`
--

CREATE TABLE `erp_supplier_group` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商分组';

--
-- 转存表中的数据 `erp_supplier_group`
--

INSERT INTO `erp_supplier_group` (`id`, `name`, `note`) VALUES
(2, '湖南', 'ceshi112'),
(3, '深圳', 'note'),
(4, '广州', '1234'),
(7, '惠州', '无');

-- --------------------------------------------------------

--
-- 表的结构 `erp_supplier_linkman`
--

CREATE TABLE `erp_supplier_linkman` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属供应商',
  `mobile` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '手机',
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `qq` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商联系人';

--
-- 转存表中的数据 `erp_supplier_linkman`
--

INSERT INTO `erp_supplier_linkman` (`id`, `name`, `supplier_id`, `mobile`, `email`, `qq`, `create_time`, `update_time`, `note`) VALUES
(1, 'jyx', 7, '01234567890', 'jiangyixin@broadin.cn', '', '2016-03-03 07:15:13', '2016-04-08 01:53:19', ''),
(2, '王五', 7, '18216430852', 'test@broadin.cn', '999', '2016-03-03 07:18:03', '2016-03-14 01:39:18', ''),
(7, 'lisi', 7, '4626431', '111@broadin.cn', '', '2016-03-03 07:51:32', '2016-04-08 01:54:20', ''),
(10, 'zhangsan', 4, '18216430852', '123@qq.com', '123', '2016-03-10 10:19:28', '2016-04-14 04:00:41', '123'),
(14, 'zhaoliu', 4, '12312312333', '111@qq.com', '', '2016-03-14 02:37:14', '2016-04-14 04:00:41', ''),
(15, 'AlphaGo', 8, '1835152312', '1234@qq.com', '1234', '2016-03-15 01:18:33', '2016-04-08 03:58:38', ''),
(16, 'liubei', 4, '15831553554', '540872052@qq.com', '', '2016-04-14 04:00:41', '2016-04-14 06:04:47', ''),
(18, 'zsssss', 13, '1312123123123', '', '', '2016-04-14 08:17:25', '2016-04-14 08:17:25', '');

-- --------------------------------------------------------

--
-- 表的结构 `erp_supplier_partner`
--

CREATE TABLE `erp_supplier_partner` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL COMMENT '供应商',
  `partner_id` int(11) NOT NULL COMMENT '负责人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商与联系人关系表';

--
-- 转存表中的数据 `erp_supplier_partner`
--

INSERT INTO `erp_supplier_partner` (`id`, `supplier_id`, `partner_id`) VALUES
(1, 4, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `erp_warehouse`
--

CREATE TABLE `erp_warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `partner_id` int(11) NOT NULL COMMENT '负责人',
  `tel` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(1024) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='仓库';

--
-- 转存表中的数据 `erp_warehouse`
--

INSERT INTO `erp_warehouse` (`id`, `name`, `address`, `partner_id`, `tel`, `status`, `create_time`, `update_time`, `note`) VALUES
(1, '总仓', '深圳', 2, '0123456', 0, '2016-03-03 09:45:47', '2016-04-13 08:11:27', '我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注我是长备注'),
(2, '分仓1', '长沙', 2, '542310', 0, '2016-03-03 09:49:14', '2016-04-14 06:08:28', 'beizhu'),
(3, '分仓2', '广州', 1, '542310', 0, '2016-03-03 09:49:46', '2016-03-15 02:03:10', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `erp_goods`
--
ALTER TABLE `erp_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `erp_goods_group`
--
ALTER TABLE `erp_goods_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_log_db`
--
ALTER TABLE `erp_log_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_log_user`
--
ALTER TABLE `erp_log_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_partner`
--
ALTER TABLE `erp_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_procurement`
--
ALTER TABLE `erp_procurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coding` (`no`);

--
-- Indexes for table `erp_procurement_detail`
--
ALTER TABLE `erp_procurement_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_sell`
--
ALTER TABLE `erp_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_sell_detail`
--
ALTER TABLE `erp_sell_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_stock`
--
ALTER TABLE `erp_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_stocktaking`
--
ALTER TABLE `erp_stocktaking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_stock_log`
--
ALTER TABLE `erp_stock_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `No` (`no`),
  ADD KEY `partner` (`partner_id`);

--
-- Indexes for table `erp_stock_log_detail`
--
ALTER TABLE `erp_stock_log_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_log_id` (`stock_log_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `erp_stock_purchase`
--
ALTER TABLE `erp_stock_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_log_id` (`stock_log_id`);

--
-- Indexes for table `erp_stock_sales`
--
ALTER TABLE `erp_stock_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_stock_transfer`
--
ALTER TABLE `erp_stock_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_supplier`
--
ALTER TABLE `erp_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_supplier_group`
--
ALTER TABLE `erp_supplier_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_supplier_linkman`
--
ALTER TABLE `erp_supplier_linkman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_supplier_partner`
--
ALTER TABLE `erp_supplier_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_warehouse`
--
ALTER TABLE `erp_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `erp_goods`
--
ALTER TABLE `erp_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `erp_goods_group`
--
ALTER TABLE `erp_goods_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `erp_log_db`
--
ALTER TABLE `erp_log_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- 使用表AUTO_INCREMENT `erp_log_user`
--
ALTER TABLE `erp_log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用表AUTO_INCREMENT `erp_partner`
--
ALTER TABLE `erp_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `erp_procurement`
--
ALTER TABLE `erp_procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `erp_procurement_detail`
--
ALTER TABLE `erp_procurement_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `erp_sell`
--
ALTER TABLE `erp_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `erp_sell_detail`
--
ALTER TABLE `erp_sell_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `erp_stock`
--
ALTER TABLE `erp_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `erp_stocktaking`
--
ALTER TABLE `erp_stocktaking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `erp_stock_log`
--
ALTER TABLE `erp_stock_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `erp_stock_log_detail`
--
ALTER TABLE `erp_stock_log_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `erp_stock_purchase`
--
ALTER TABLE `erp_stock_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `erp_stock_sales`
--
ALTER TABLE `erp_stock_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `erp_stock_transfer`
--
ALTER TABLE `erp_stock_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `erp_supplier`
--
ALTER TABLE `erp_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `erp_supplier_group`
--
ALTER TABLE `erp_supplier_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `erp_supplier_linkman`
--
ALTER TABLE `erp_supplier_linkman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `erp_supplier_partner`
--
ALTER TABLE `erp_supplier_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `erp_warehouse`
--
ALTER TABLE `erp_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
