<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <title>｜后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="generator" content="CoreThink">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="apple-touch-icon" type="image/x-icon" href="/php/erp/test/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/php/erp/test/logo.png">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/cui/css/cui.min.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/broadin/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/broadin/css/theme/default.css"><!--<?php echo C('ADMIN_THEME');?>-->
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/jquery_smartmenu/css/smartMenu.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/bootstrap_datetimepicker/css/bootstrap-datetimepicker.min.css">
    
    <style type="text/css">

    </style>

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/php/erp/test/Public/libs/jquery/1.x/jquery.min.js"></script>
</head>
<body>
<div class="clearfix full-header">
    
    <!-- 顶部导航 -->
    <div class="navbar navbar-inverse navbar-fixed-top main-nav" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" target="_blank" href="/php/erp/test/">
                <span><b><span class="open" style="color: #a5aeb4;">乐me</span><span class="cmf" style="color: #3fa9f5;">商城</span></b></span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-top">
            <ul class="nav navbar-nav">
                <?php if(is_array($navList)): foreach($navList as $key=>$vo): ?><li class="<?php if((CONTROLLER_NAME) == $vo["name"]): ?>active<?php endif; ?>">
                        <a href="<?php echo U($vo['url']);?>">
                            <i class="<?php echo ($vo["icon"]); ?>"></i>
                            <span><?php echo ($vo["title"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; ?>
                <!-- 主导航 -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Admin/Index/removeRuntime');?>" class="ajax-get no-refresh"><i class="fa fa-trash"></i> 清空缓存</a></li>
                <li><a target="_blank" href="/php/erp/test"><i class="fa fa-external-link-square"></i> 打开前台</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>  <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo U('Admin/Public/logout');?>" class="ajax-get"><i class="fa fa-sign-out"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
</div>

<div class="clearfix full-container">
    
    <div class="container-fluid with-top-navbar">
        <div class="row">
            <!-- 后台左侧导航 -->
            <div id="sidebar" class="col-xs-12 col-sm-2 sidebar tab-content">
                <!-- 模块菜单 -->
                <nav class="navside navside-default" role="navigation">
                    <ul class="nav navside-nav navside-first">
                        <?php if(is_array($menuList)): foreach($menuList as $key=>$vo): ?><li>
                                <a data-toggle="collapse" href="#navside-collapse--1">
                                    <i class="<?php echo ($vo["icon"]); ?>"></i>
                                    <span class="nav-label"><?php echo ($vo["label"]["title"]); ?></span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav navside-nav navside-second collapse in" >
                                    <?php if(is_array($vo["list"])): foreach($vo["list"] as $key=>$v): ?><li class="<?php if((ACTION_NAME) == $v["name"]): ?>active<?php endif; ?>">
                                            <a href="<?php echo U($v['url']);?>">
                                                <i class="<?php echo ($v["icon"]); ?>"></i>
                                                <span><?php echo ($v["title"]); ?></span>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                </ul>
                            </li><?php endforeach; endif; ?>


                    </ul>
                </nav>
            </div>

            <!-- 右侧内容 -->
            <div id="main" class="col-xs-12 col-sm-10 main" style="overflow-y: scroll;">
                <!-- 面包屑导航 -->
                <ul class="breadcrumb">
                    <li><i class="fa fa-map-marker"></i></li>
                </ul>

                <!-- 主体内容区域 -->
                <div class="tab-content ct-tab-content">
                    
    <div id="main" class="col-xs-12 col-sm-10 main" style="overflow-y: scroll;">
        <!-- 面包屑导航 -->
        <ul class="breadcrumb">
            <li><i class="fa fa-map-marker"></i></li>
            <li class="text-muted">销售管理</li><li class="text-muted">新增销售单</li>
        </ul>

        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">

            <div id="sell" class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->

                <!-- 数据列表 -->
                <div class="builder-container">
                    <form action="" method="post" class="form-inline" >
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">主题：</label>
                                    <input type="text" class="form-control" name="sell.title" value="">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="label-left">时间：</label>
                                    <input type="text" class="form-control dateTimePicker" readonly name="sell.update_time" value="<?php echo ($curTime); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">出货仓库：</label>
                                    <select class="form-control" name="sell.warehouse_id_out">
                                        <option value="">请选择：</option>
                                        <?php if(is_array($warehouseList)): foreach($warehouseList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="label-left">负责人：</label>
                                    <select class="form-control" name="sell.partner_id">
                                        <option value="">请选择：</option>
                                        <?php if(is_array($partnerList)): foreach($partnerList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">客户：</label>
                                    <input type="text" class="form-control" name="sell.customer" value="">
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-xs-12 col-lg-12">
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table id="sellList" class="table table-bordered table-striped table-hover table-input">
                                        <caption>销售商品列表</caption>
                                        <thead>
                                        <tr>
                                            <th>商品</th>
                                            <th>数量</th>
                                            <th>单价</th>
                                            <th>小计</th>
                                            <th>库存</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <form action="" method="post" class="form-inline" >
                        <div class="row" >
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">实收金额：</label>
                                    <input type="number" class="form-control" name="sell.total_price" value="">
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-horizontal">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xs-12 clearfix">
                            <div class="form-group ">
                                <label class="col-sm-1 control-label">备注：</label>
                                <div class="col-sm-11 col-lg-9">
                                    <textarea class="form-control" name="sell.note"  rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 顶部工具栏按钮 -->
                <div class="builder-toolbar">
                    <div class="row">
                        <!-- 工具栏按钮 -->
                        <div class="col-xs-12 col-sm-9 button-list clearfix">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-lg-offset-1 col-sm-10">
                                    <button type="button" id="save" class="btn btn-primary">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 额外功能代码 -->
            </div>

        </div>

    </div>

                </div>

                <div class="clearfix footer">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" target="_blank" href="/php/erp/test">
                                    <span></span>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse navbar-collapse-bottom">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="" class="text-muted" target="_blank">
                                            <span>版权所有 © 2014-2016</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a class="text-muted pull-right">北京博广通联技术有限公司</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="clearfix full-footer">
    
</div>

<div class="clearfix full-script">
    <div class="container-fluid">
        <!--<input type="hidden" id="corethink_home_img" value="/php/erp/test/./Application/Home/View/Public/img">-->
        <script type="text/javascript" src="/php/erp/test/Public/libs/cui/js/cui.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/broadin/js/admin.js"></script>
        <script type="text/javascript">
            var menuList = <?php echo json_encode($menuList);?>;
            console.log(menuList);
        </script>
        
    <script type="text/javascript">
        $(window).ready(function (e) {
            var goodsList = <?php echo json_encode($goodsList);?>;
            console.log(goodsList);
            var myTable = $('#sellList');
            var trTemplate = '<tr>' +
                    '<td class="td-select">' +
                    '<select name="goods_id" class="form-control">' +
                    '<option value="">请选择：</option>';
            for (var i in goodsList) {
                trTemplate += '<option value="'+ goodsList[i].id +'">'+ goodsList[i].name + '·' + goodsList[i].norm +'</option>';
            }
            trTemplate += '</select></td>' +
                    '<td><input type="number" data-count="num" name="num"></td>' +
                    '<td><input type="number" data-count="per_price" name="per_price"></td>' +
                    '<td><input type="text" name="sub_total" readonly></td>' +
                    '<td><input type="text" name="total" readonly></td>' +
                    '<td class="operate">' +
                    '<a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a>' +
                    '<a title="删除一行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a>' +
                    '</td>' +
                    '</tr>';

            // 初始化表格
            function initTable() {
                var html = trTemplate + trTemplate + trTemplate + trTemplate + trTemplate;
                html += '<tr class="tr-default"><td>总计</td><td class="countNum"></td><td></td><td class="countTotal"></td><td></td><td></td></tr>';
                myTable.find('tbody').append(html);
            }

            //  添加一行
            myTable.on('click', '.add-row', function() {
                broadin.addTableRow(this, trTemplate, 1);
            });

            // 删除一行
            myTable.on('click', '.del-row', function() {
                broadin.delTableRow(this);
            });

            // 保存数据
            $('#save').on('click', function() {
                var sell = {title: '', warehouse_id_out: '', partner_id: '', customer: '', update_time: '', total_price: '', note: ''};
                var sellCheck = {warehouse_id_out: '请选择出货仓库', partner_id: '请选择负责人', total_price: '请输入付款金额'};
                sell = broadin.getFormData('#sell', sell, 'sell', sellCheck);
                console.log(sell);
                if (!sell) {
                    return;
                }
                var detail = {goods_id: '', num: '', per_price: ''};
                var detailCheck = {goods_id: '', num: '', per_price: ''};
                var detailList = broadin.getTableData('#sell', detail, null, detailCheck);
                console.log(detailList);
                if (!detailList) {
                    return;
                }
                broadin.ajaxPost("<?php echo U('Sell/sell');?>", {sell: sell, detailList: detailList});
            });

            // 统计商品价格
            myTable.on('blur', '[data-count]', function() {
                var tr = $(this).parents('tr');
                setSubTotal(tr);
            });
            myTable.on('change', 'select', function() {
                var tr = $(this).parents('tr');
                var goods_id = tr.find('[name="goods_id"]').val();
                var elementPrice = tr.find('[data-count="per_price"]');
                for (var i in goodsList) {
                    if (goods_id == goodsList[i].id) {
                        elementPrice.val(goodsList[i].price);
                        break;
                    }
                }
                setSubTotal(tr);
            });
            // 获取当前行小计
            function getSubTotal(tr) {
                var subTotal = tr.find('[data-count="num"]').val() * tr.find('[data-count="per_price"]').val();
                var goods_id = tr.find('[name="goods_id"]').val();
                if (goods_id && subTotal) {
                    return subTotal;
                }
            }
            // 设置当前行小计
            function setSubTotal(tr) {
                var subTotal = getSubTotal(tr);
                if (subTotal) {
                    tr.find('[name="sub_total"]').val(subTotal.toFixed(2));
                } else {
                    tr.find('[name="sub_total"]').val('');
                }
                setCountTotal();
            }

            // 获取商品价格合计与商品总数
            function getCountTotal() {
                var count = {
                    price: 0,
                    num: 0
                }
                myTable.find('tbody tr').each(function() {
                    var subTotal = $(this).find('[name="sub_total"]').val();
                    var subNum = $(this).find('[name="num"]').val();
                    if (!subTotal) return;
                    count.price += parseFloat(subTotal);
                    count.num += parseInt(subNum);
                });
                return count;
            }
            // 显示商品合计
            function setCountTotal() {
                var count = getCountTotal();
                if (count.price) {
                    $('.countTotal').html(count.price.toFixed(2));
                    $('.countNum').html(count.num);
                    $('[name="sell.total_price"]').val(count.price.toFixed(2));
                }
            }

            function setStockNum() {
                var warehouse_id_out = $('select[name="sell.warehouse_id_out"]').val();
                if (!warehouse_id_out) {
                    return;
                }
                myTable.find('tbody tr').each(function() {
                    var goods_id = $(this).find('select[name="goods_id"]').val();
                    if (goods_id) {
                        var total = 0;
                        for (var i in goodsList) {
                            if (goodsList[i].id == goods_id) {
                                for (var j in goodsList[i].stockList) {
                                    if (goodsList[i].stockList[j].warehouse_id == warehouse_id_out) {
                                        total = goodsList[i].stockList[j].num;
                                        break;
                                    }
                                }
                            }
                        }
                        $(this).find('[name="total"]').val(total);
                    }
                });
            }

            $('[name="sell.warehouse_id_out"]').on('change', function() {
                setStockNum();
            });

            // 显示商品库存
            myTable.on('change', 'select', function() {
                var goods_id = $(this).parents('tr').find('select[name="goods_id"]').val();
                var warehouse_id_out = $('select[name="sell.warehouse_id_out"]').val();
                if (goods_id && warehouse_id_out) {
                    var total = 0;
                    for (var i in goodsList) {
                        if (goodsList[i].id == goods_id) {
                            for (var j in goodsList[i].stockList) {
                                if (goodsList[i].stockList[j].warehouse_id == warehouse_id_out) {
                                    total = goodsList[i].stockList[j].num;
                                    break;
                                }
                            }
                        }
                    }
                    $(this).parents('tr').find('[name="total"]').val(total);
                }
            });

            // 初始化
            function init() {
                initTable();
            }
            init();
        });
    </script>

    </div>
</div>

</body></html>