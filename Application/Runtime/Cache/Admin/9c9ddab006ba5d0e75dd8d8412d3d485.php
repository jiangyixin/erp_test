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
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/theme/default.css"><!--<?php echo C('ADMIN_THEME');?>-->
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/jquery_smartmenu/css/smartMenu.css">
    
    <style type="text/css">
        .form-control[disabled], fieldset[disabled] .form-control {
            cursor: auto;
        }
        td.operate {
            text-align: center;
        }
        td .add-row {
            color: #333;
            margin-right: 10px;
        }
        td .del-row {
            text-align: right;
            color: #333;
        }
        .table td.td-select {
            padding: 0;
        }
        td.td-select select {
            border: none;
            border-radius: 0;
        }
        .form-inline .form-group>label.label-left {
            width: 6em;
        }
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

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
                        <li>
                            <a data-toggle="collapse" href="#navside-collapse--1">
                                <i class="fa fa-folder-open-o"></i>
                                <span class="nav-label"><?php echo ($menuList["label"]["title"]); ?>管理</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav navside-nav navside-second collapse in" >
                                <?php if(is_array($menuList["list"])): foreach($menuList["list"] as $key=>$vo): ?><li class="<?php if((ACTION_NAME) == $vo["name"]): ?>active<?php endif; ?>">
                                        <a href="<?php echo U($vo['url']);?>">
                                            <i class="<?php echo ($vo["icon"]); ?>"></i>
                                            <span><?php echo ($vo["title"]); ?></span>
                                        </a>
                                    </li><?php endforeach; endif; ?>
                            </ul>
                        </li>
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

            <div class="builder listbuilder-box panel-body">
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
                                    <input type="datetime-local" class="form-control" name="sell.create_time" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">客户：</label>
                                    <input type="text" class="form-control" name="sell.customer" value="">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="label-left">负责人：</label>
                                    <select class="form-control" name="sell.partner_id">
                                        <option value="0">请选择：</option>
                                        <?php if(is_array($partnerList)): foreach($partnerList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <h4>商品列表：</h4>
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table id="sellList" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>商品</th><th>出货仓库</th>
                                            <th>余量</th>
                                            <th>数量</th><th>单价</th>
                                            <th>小计</th>
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
                                    <label class="label-left">实际金额：</label>
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
                                    <input type="text" class="form-control" name="sell.note" value="">
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
                                    <button type="button" class="btn btn-danger" onclick="history.back();">返回</button>
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
        <script type="text/javascript" src="/php/erp/test/./Application/Admin/View/Public/js/admin.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/jquery_smartmenu/js/jquery-smartMenu-min.js"></script>
        <script type="text/javascript">

        </script>
        
    <script type="text/javascript">

        var warehouseList = <?php echo json_encode($warehouseList);?>;
        var goodsList = <?php echo json_encode($goodsList);?>;
        // var partnerList = <?php echo json_encode($partnerList);?>;
        console.log(goodsList);
        $(window).ready(function (e) {
            // 添加*行
            function addRow(row) {
                var html = '';
                for (var j= 0; j<row; j++) {
                    html += '<tr>' +
                            '<td class="td-select">' +
                            '<select name="goods_id" class="form-control">' +
                            '<option value="">请选择：</option>';
                    for (var i in goodsList) {
                        html += '<option value="'+ goodsList[i].id +'">'+ goodsList[i].name + '·' + goodsList[i].norm +'</option>';
                    }
                    html += '</select></td>' +
                            '<td class="td-select">' +
                            '<select name="warehouse_id" class="form-control">' +
                            '<option value="">请选择：</option>';
                    for (var i in warehouseList) {
                        html += '<option value="'+ warehouseList[i].id +'">'+ warehouseList[i].name + '</option>';
                    }
                    html += '</select></td>' +
                            '<td name="total"></td>' +
                            '<td contenteditable="true" data-count="num" name="num"></td>' +
                            '<td contenteditable="true" data-count="per_price" name="per_price"></td>' +
                            '<td name="sub_total"></td>' +
                            '<td class="operate">' +
                            '<a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a>' +
                            '<a title="删除一行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a>' +
                            '</td>' +
                            '</tr>';
                }
                return html;
            }
            // 初始化表格
            function initTable() {
                var html = addRow(5);
                html += '<tr><td>总计</td><td class="countNum"></td><td></td><td class="countTotal"></td><td></td></tr>';
                $('#sellList').find('tbody').html(html);
            }

            //  添加一行
            $('#sellList').on('click', '.add-row', function() {
                var html = addRow(1);
                $(this).parents('tr').after(html);
            })

            // 删除一行
            $('#sellList').on('click', '.del-row', function() {
                var num = $(this).parents('#sellList').find('tr').length;
                if (num === 2) {
                    alert('必须保留一行');
                    return;
                }
                var tr = $(this).parents('tr');
                var result = confirm('确定删除当前行？');
                if (result) {
                    tr.remove();
                }
            })

            function checkForm() {
                var checkStr = '';
                $('body').find('[name*="sell."]').each(function () {
                    var key = $(this).attr('name');
                    var value = $(this).val();
                    if (key == 'sell.title' && !value) {
                        checkStr = '主题不能为空！';
                        return false;
                    }
                    if (key == 'sell.partner_id' && (!value || value == 0)) {
                        checkStr = '请选择负责人！';
                        return false;
                    }
                    if (key == 'sell.total_price' && !value) {
                        checkStr = '请输入实收金额！';
                        return false;
                    }
                });
                return checkStr;
            }

            function getTableData() {
                var detailList = new Array();
                var detail = null;
                $('#sellList').find('tbody tr').each(function() {
                    detail = new Object();
                    detail.goods_id = $(this).find('[name="goods_id"]').val();
                    detail.warehouse_id = $(this).find('[name="warehouse_id"]').val();
                    detail.num = $(this).find('[name="num"]').html();
                    detail.per_price = $(this).find('[name="per_price"]').html();
                    detail.sub_price = $(this).find('[name="sub_total"]').html();
                    if (!detail.sub_price) {
                        return;
                    }
                    /*if (!detail.goods_id || !detail.num || !detail.per_price || !detail.supplier_id) {
                        $.alertMessager('商品、供应商、数量为必填参数', 'danger');
                        return false;
                    }*/
                    detailList.push(detail);
                });
                if (detailList.length == 0) {
                    $.alertMessager('请添加采购的商品', 'danger');
                }
                return detailList;
            }

            function getFormData() {
                var sell = new Object();
                sell.title = $('[name="sell.title"]').val();
                sell.create_time = $('[name="sell.create_time"]').val();
                sell.customer = $('[name="sell.customer"]').val();
                sell.partner_id = $('[name="sell.partner_id"]').val();
                sell.note = $('[name="sell.note"]').val();
                sell.total_price = $('[name="sell.total_price"]').val();
                if (!sell.create_time) {
                    delete sell.create_time;
                }
                return sell;
            }

            // 保存数据
            $('#save').on('click', function() {
                var checkStr = checkForm();
                if (checkStr) {
                    $.alertMessager(checkStr, 'danger');
                    return;
                }
                var sell  = getFormData();
                var detailList = getTableData();
                console.log(sell);
                console.log(detailList);
                if (detailList.length == 0) {
                    return;
                }
                $.post("<?php echo U('Sell/sell');?>", {sell: sell, detailList: detailList}, function(data) {
                    console.log(data);
                    if (!data.status) {
                        $.alertMessager('保存失败', 'danger');
                    } else {
                        $.alertMessager('保存成功', 'success');
                        window.setTimeout(function() {
                            window.location = "<?php echo U('Sell/sellList');?>";
                        }, 2000);
                    }
                });
            })

            // 统计商品价格
            $('#sellList').on('blur', '[data-count]', function() {
                var tr = $(this).parents('tr');
                setSubTotal(tr);
            });
            $('#sellList').on('change', 'select', function() {
                var tr = $(this).parents('tr');
                setSubTotal(tr);
            });
            // 获取当前行小计
            function getSubTotal(tr) {
                var subTotal = tr.find('[data-count="num"]').html() * tr.find('[data-count="per_price"]').html();
                var goods_id = tr.find('[name="goods_id"]').val();
                if (goods_id && subTotal) {
                    return subTotal;
                }
            }
            // 设置当前行小计
            function setSubTotal(tr) {
                var subTotal = getSubTotal(tr);
                if (subTotal) {
                    tr.find('[name="sub_total"]').html(subTotal.toFixed(2));
                } else {
                    tr.find('[name="sub_total"]').html('');
                }
                setCountTotal();
            }

            // 获取商品价格合计与商品总数
            function getCountTotal() {
                var countTotal = 0;
                var countNum = 0;
                var count = {
                    price: 0,
                    num: 0
                }
                $('#sellList').find('tbody tr').each(function() {
                    var subTotal = $(this).find('[name="sub_total"]').html();
                    var subNum = $(this).find('[name="num"]').html();
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
                } else {
                    $('.countTotal').html('');
                    $('.countNum').html('');
                }
            }

            // 显示商品余量
            $('#sellList tbody').on('change', 'select', function() {
                var goods_id = $(this).parents('tr').find('select[name="goods_id"]').val();
                var warehouse_id = $(this).parents('tr').find('select[name="warehouse_id"]').val();
                if (goods_id && warehouse_id) {
                    var total = 0;
                    for (var i in goodsList) {
                        if (goodsList[i].id == goods_id) {
                            for (var j in goodsList[i].stockList) {
                                if (goodsList[i].stockList[j].warehouse_id == warehouse_id) {
                                    total = goodsList[i].stockList[j].num;
                                    break;
                                }
                            }
                        }
                    }
                    $(this).parents('tr').find('[name="total"]').html(total);
                }
            });

            // 初始化
            function init() {
                initTable();
                // $('[type="date"]').get(0).valueAsDate = new Date();
                console.log(new Date());
                $('[type="datetime-local"]').val(new Date('YYYY-MM-DDThh:mm:ss.ms'));
            }

            init();
        });
    </script>

    </div>
</div>

</body></html>