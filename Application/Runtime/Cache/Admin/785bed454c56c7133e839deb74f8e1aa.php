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
    
    <style>

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
                <li class="text-muted">销售管理</li><li class="text-muted">销售统计</li>
        </ul>
        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">
            <div class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->
                <!-- 顶部工具栏按钮 -->
                <div class="builder-toolbar">
                    <div class="row form-inline" style="margin-bottom: 20px;">
                        <div class="form-group col-xs-12">
                            <label class="label-left"  style="margin-left: 15px;">开始时间：</label>
                            <input type="text" class="form-control" readonly="" name="startTime" value="" id="startTimePicker">
                            <label class="label-left" style="margin-left: 15px;">结束时间：</label>
                            <input type="text" class="form-control" readonly="" name="endTime" value="" id="endTimePicker">
                            <button type="button" id="query" class="btn btn-primary"  style="margin-left: 15px;">查询</button>
                        </div>
                    </div>
                </div>
                <!-- 数据列表 -->
                <div class="builder-container">
                    <div id="chart" style="width: 1200px; height:780px; display: inline-block;"></div>
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
        
<script src="/php/erp/test/Public/libs/echarts/js/echarts.js"></script>
<script type="text/javascript">
    var statisticalList = <?php echo json_encode($statisticalList);?>;
    var warehouseList = <?php echo json_encode($warehouseList);?>;
    var goodsList = <?php echo json_encode($goodsList);?>;
    console.log(statisticalList);
    $(window).ready(function(e) {
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('chart'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '所有商品销售统计'
            },
            tooltip: {
                trigger: 'axis'
            },
            toolbox: {
                feature: {
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            legend: {
                data:['销售额']
            },
            xAxis: {
                type: 'category',
                data: []
            },
            yAxis: [{
                name: '数目',
                axisLabel: {
                    formatter: '{value} 个'
                }
            },{
                name: '金额',
                axisLabel: {
                    formatter: '{value} 元'
                }
            }],
            series: []
        }

        function setOpt(statisticalList) {
            option.xAxis.data = [];
            option.series = [];
            for (var i in goodsList) {
                option.legend.data.push(goodsList[i].name + '·' + goodsList[i].norm);
            }

            for (var i in warehouseList) {
                option.xAxis.data.push(warehouseList[i].name);
            }

            for (var i in goodsList) {
                var goods = {
                    name: goodsList[i].name + '·' + goodsList[i].norm,
                    type: 'bar',
                    data: new Array(warehouseList.length)
                };
                for (var j in warehouseList) {
                    goods.data[j] = 0;
                    for (var x in statisticalList) {
                        if (goodsList[i].id == statisticalList[x].goods_id && warehouseList[j].id == statisticalList[x].warehouse_id_out) {
                            goods.data[j] = statisticalList[x].num;
                        }
                    }
                }
                console.log(goods);
                option.series.push(goods);
            }

            // 销售额
            var arr = {
                name: '销售额',
                type: 'line',
                yAxisIndex: 1,
                data: []
            };
            for (var i in warehouseList) {
                var count = 0;
                for (var j in statisticalList) {
                    if (warehouseList[i].id == statisticalList[j].warehouse_id_out) {
                        count += parseFloat(statisticalList[j].count_price);
                    }
                }
                arr.data[i] = count;
            }
            option.series.push(arr);
        }

        // 查询
        $('#query').on('click', function() {
            var time = {
                start: $('#startTimePicker').val(),
                end: $('#endTimePicker').val()
            }

            $.post("<?php echo U('Sell/sellStatistical');?>", {time: time}, function(data) {
                console.log(data);
                if (!data.status) {
                    $.alertMessager('查询失败', 'danger');
                } else {
                    setOpt(data.list);
                    myChart.setOption(option);
                }
            });

        });

        function init() {
            setOpt(statisticalList);
            console.log(option);
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);

            $('#startTimePicker').datetimepicker({
                language: 'zh-CN',
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayBtn: true,
                minView: 'month'
            });

            $('#endTimePicker').datetimepicker({
                language: 'zh-CN',
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayBtn: true,
                minView: 'month'
            });
        }

        init();

    });
</script>

    </div>
</div>

</body></html>