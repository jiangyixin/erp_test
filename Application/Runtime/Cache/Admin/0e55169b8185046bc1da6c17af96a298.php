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
            <li class="text-muted">仓储管理</li><li class="text-muted">调拨</li>
        </ul>

        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">

            <div id="stockLog" class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->

                <!-- 数据列表 -->
                <div class="builder-container">
                    <form action="" method="post" class="form-inline" >
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">主题：</label>
                                    <input type="text" class="form-control" name="stockLog.title" value="">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="label-left">时间：</label>
                                    <input type="text" class="form-control" id="dateTimePicker" readonly name="stockLog.create_time" value="<?php echo ($curTime); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">调出仓库：</label>
                                    <select name="stockLog.warehouse_id_out" class="form-control">
                                        <option value="">请选择：</option>
                                        <?php if(is_array($warehouseList)): foreach($warehouseList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="label-left">调入仓库：</label>
                                    <select name="stockLog.warehouse_id_in" class="form-control">
                                        <option value="">请选择：</option>
                                        <?php if(is_array($warehouseList)): foreach($warehouseList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-6">
                                    <label class="label-left">负责人：</label>
                                    <select name="stockLog.partner_id" class="form-control">
                                        <option value="">请选择：</option>
                                        <?php if(is_array($partnerList)): foreach($partnerList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-xs-12 col-lg-12">
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table id="transferList" class="table table-bordered table-striped table-hover table-input">
                                        <caption>调拨商品表</caption>
                                        <thead>
                                        <tr>
                                            <th>商品</th>
                                            <th>数量</th>
                                            <th>当前库存</th>
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
                </div>
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12 clearfix">
                            <div class="form-group ">
                                <label class="col-sm-1 control-label">备注：</label>
                                <div class="col-sm-11 col-lg-9">
                                    <textarea class="form-control" name="stockLog.note" rows="3"></textarea>
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
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
        <script type="text/javascript">
            var broadin = (function(broadin) {
                function initEvent() {
                    $('table').on('click', '.btn-del', function() {
                        event.preventDefault();
                        var result = confirm('确定要执行该操作？');
                        if (!result) return;
                        var id = $(this).parents('tr').attr('data-id');
                        var url = $(this).attr('href');
                        broadin.ajaxPost(url, {id: id});
                    });
                    $('.dateTimePicker').datetimepicker({
                        language: 'zh-CN',
                        format: 'yyyy-mm-dd hh:ii:ss',
                        autoclose: true,
                        todayBtn: true
                    });
                }
                initEvent();
                broadin.ajaxPost = function(url, data) {
                    $.post(url, data, function(data) {
                        if (data.status) {
                            $.alertMessager(data.info, 'success');
                            window.setTimeout(function() {
                                window.location = data.url;
                            }, 2000);
                        } else {
                            $.alertMessager(data.info, 'danger');
                        }
                    });
                }
                /**
                 * 获取表单数据并校验进行不为空校验
                 * @param selected 表单选择器
                 * @param dataObj 需要获取的数据对象
                 * @param prefix 前缀
                 * @param dataCheck 校验字段
                 * @returns {*}
                 */
                broadin.getFormData = function(selected, dataObj, prefix, dataCheck) {
                    prefix = prefix ? (prefix + '.') : '';
                    for (var key in dataObj) {
                        dataObj[key] = $(selected).find('[name="' + prefix + key + '"]').val() || '';
                        if (dataCheck[key] && !dataObj[key]) {
                            console.log(key + '---' +dataObj[key]);
                            $.alertMessager(dataCheck[key]);
                            return false;
                        }
                    }
                    dataObj['id'] = dataObj['id'] ? dataObj['id'] : $(selected).attr('data-id');
                    return dataObj;
                };
                /**
                 * 获取表格数据并校验是否为空
                 * @param selected 表格选择器
                 * @param dataObj 每列数据对象
                 * @param prefix 前缀
                 * @param dataCheck 不能为空的字段
                 * @returns {*}
                 */
                broadin.getTableData = function(selected, dataObj, prefix, dataCheck) {
                    var objList = new Array();
                    prefix = prefix ? (prefix + '.') : '';
                    $(selected).find('tbody tr').each(function() {
                        var newObj = new Object();
                        for (var key in dataObj) {
                            newObj[key] = $(this).find('[name="' + prefix + key + '"]').val() || $(this).find('[name="' + prefix + key + '"]').html();
                            if (dataCheck.hasOwnProperty(key) && !newObj[key]) {
                                newObj = null;
                                break;
                            }
                        }
                        if (newObj) {
                            newObj['id'] = $(this).attr('data-id') || '';
                            objList.push(newObj);
                        }
                    });
                    if (objList.length == 0) {
                        $.alertMessager('表格数据不能为空', 'danger');
                        return false;
                    }
                    return objList;
                }
                broadin.addTableRow = function(selected, template, rows) {
                    for (var i=1; i<rows; i++) {
                        template += template;
                    }
                    $(selected).parents('tr').after(template);
                }
                broadin.delTableRow = function(selected, url) {
                    var rows = $(selected).parents('tbody').find('tr').length;
                    if (rows === 1) {
                        $.alertMessager('必须保留一行', 'danger');
                        return;
                    }
                    var tr = $(selected).parents('tr');
                    var id = tr.attr('data-id');
                    if (!id || !url) {
                        tr.remove();
                    } else {
                        var result = confirm('确定要删除当前联系人？');
                        if (result) {
                            $.post(url, { id: id }, function(data) {
                                if (data.status) {
                                    tr.remove();
                                } else {
                                    $.alertMessager('删除失败', 'danger');
                                }
                            });
                        }
                    }
                }
                return broadin;
            }(broadin || {}))
        </script>
        
    <script type="text/javascript">
        $(window).ready(function (e) {
            var goodsList = <?php echo json_encode($goodsList);?>;
            console.log(goodsList);

            var myTable = $('table');
            var trTemplate = '<tr>' +
                    '<td class="td-select">' +
                    '<select name="goods_id" class="form-control">' +
                    '<option value="">请选择：</option>';
            for (var i in goodsList) {
                trTemplate += '<option value="'+ goodsList[i].id +'">'+ goodsList[i].name + '·' + goodsList[i].norm +'</option>';
            }
            trTemplate += '</select></td>' +
                    '<td><input type="number" name="num" min="1" max=""></td>' +
                    '<td><input type="number" name="total" readonly></td>' +
                    '<td class="operate">' +
                        '<a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a>' +
                        '<a title="删除一行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a>' +
                    '</td>' +
                    '</tr>';

            // 初始化表格
            function initTable() {
                var html = trTemplate + trTemplate + trTemplate + trTemplate + trTemplate;
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

            $('#save').on('click', function() {
                var stockLog = {title: '', warehouse_id_out: '', warehouse_id_in: '', partner_id: '', create_time: '', note: ''};
                var stockLogCheck = { partner_id: '请选择负责人', warehouse_id_out: '请选择调出仓库', warehouse_id_in: '请选择调入仓库'};
                var logDetail = {goods_id: '', num: ''};
                var logDetailCheck = {goods_id: '', num: ''};
                stockLog = broadin.getFormData('#stockLog', stockLog, 'stockLog', stockLogCheck);
                console.log(stockLog);
                if (!stockLog) {
                    return;
                }
                var detailList = broadin.getTableData('#transferList', logDetail, null, logDetailCheck);
                console.log(detailList);
                if (!detailList) {
                    return;
                }
                broadin.ajaxPost("<?php echo U('Stock/transfer');?>", {stockLog: stockLog, detailList: detailList});
            });
            /**
             * 显示库存余量
             */
            function showStock() {
                console.log('showStock');
                var warehouse_id_out = $('select[name="stockLog.warehouse_id_out"]').val();
                if (!warehouse_id_out) {
                    return;
                }
                $('#transferList').find('tbody tr').each(function() {
                    var goods_id = $(this).find('select[name="goods_id"]').val();
                    var total = 0;
                    if (goods_id) {
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
                        $(this).find('[name="num"]').attr('max', total);
                    }
                });
            }

            $('select[name="stockLog.warehouse_id_out"]').on('change', function() {
                showStock();
            });

            $('#transferList tbody').on('change', 'select[name="goods_id"]', function() {
                showStock();
            });

            // 初始化
            initTable();

            $('#dateTimePicker').datetimepicker({
                language: 'zh-CN',
                format: 'yyyy-mm-dd hh:ii:ss',
                autoclose: true,
                todayBtn: true
            });

        });
    </script>

    </div>
</div>

</body></html>