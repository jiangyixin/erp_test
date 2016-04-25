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


$(function(){
    // 一次性初始化所有弹出框
    $('[data-toggle="popover"]').popover();

    // 图片lazyload
    $('img.lazy').lazyload({
        effect         : 'fadeIn',
        data_attribute : 'lazy',
        placeholder    : $('#corethink_home_img').val()+'/default/default.gif'
    });

    //全选/反选/单选的实现
    $(".check-all").click(function() {
        $(".ids").prop("checked", this.checked);
    });

    $(".ids").click(function() {
        var option = $(".ids");
        option.each(function() {
            if (!this.checked) {
                $(".check-all").prop("checked", false);
                return false;
            } else {
                $(".check-all").prop("checked", true);
            }
        });
    });

    //搜索功能
    $('body').on('click', '.search-btn', function() {
        var url = $(this).closest('form').attr('action');
        var query = $(this).closest('form').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/(^&)|(\+)/g, '');
        if (url.indexOf('?') > 0) {
            url += '&' + query;
        } else {
            url += '?' + query;
        }
        window.location.href = url;
        return false;
    });

     //回车搜索
    $(".search-input").keyup(function(e) {
        if (e.keyCode === 13) {
            $(".search-btn").click();
            return false;
        }
    });


    // 设置ct-tab的宽度
    $('.ct-tab').width($(window).width()-373);

    // 打开新Tab
    $('body').delegate('#sidebar .open-tab', 'click', function() {
        var tab_url   = $(this).attr('href');
        var tab_name  = $(this).attr('tab-name');
        var is_open   = $('.ct-tab-content #' + tab_name).length;
        if(is_open !== 0){
            $('.ct-tab a[href=#' + tab_name + ']').tab('show');
        } else {
            var tab  = '<li class="new-add" style="position: relative;float:left;display: inline-block;"><a href="#'
                     + tab_name
                     + '" role="tab" data-toggle="tab">'
                     + $(this).html()
                     + '<button type="button" class="close" aria-label="Close">'
                     + '<span aria-hidden="true">&times;</span></button></a></li>';
            var tab_content = '<div role="tabpanel" class="new-add tab-pane fade" id="'
                            + tab_name
                            + '"><iframe name="#'
                            + tab_name
                            + '" class="iframe" src="'
                            + tab_url
                            +'"></iframe></div>';
            $('.ct-tab').width($('.ct-tab').width() + 60);
            $('.ct-tab').append(tab);
            $('.ct-tab-content').append(tab_content);
            $('.ct-tab a:last').tab('show');
        }
        return false;
    });

    // 关闭标签时自动取消左侧导航的active状态
    $('body').delegate('.nav-close .close', 'click', function() {
        var id  = $(this).closest('a[data-toggle="tab"]').attr('href');
        var tab = id.split('#');
        $('a[tab-name=' + tab[1] + ']').closest('li').removeClass('active');
    });

    // 关闭所有标签
    $('body').delegate('.close-all', 'click', function() {
        $('.new-add').remove();
        $('.ct-tab a:first').tab('show');
    });

    // 双击刷新标签
    $('body').delegate('.ct-tab a', 'dblclick', function() {
        var id = $(this).attr('href');
        $(id+' .iframe').attr('src', $(id+' .iframe').attr('src'));
    });

    // TAB向左滚动
    $('body').delegate('#tab-left', 'click', function() {
        var left = $('.ct-tab').position().left;
        if (left < 0) {
            $('.ct-tab').animate({left:(left+480+'px')});
        }
    });

    // TAB向右滚动
    $('body').delegate('#tab-right', 'click', function() {
        var left = $('.ct-tab').position().left;
        if(($(window).width()-373)-(left+$('.ct-tab').width()) < 0){
            $('.ct-tab').animate({left:(left-480+'px')});
        }
    });

    // 检测更新
    if ($('.ct-update').length != 0) {
        // 检测更新
        $.ajax({
            url: $('input[name="check_version_url"]').val(),
            type: 'GET',
        }).done(function(data) {console.log();
            if (data.status == 1) {
                $('.version').html(data.info);
                if (data.sn_info) {
                    $('.sn_info').html(data.sn_info);
                }
            } else {
                $.alertMessager(data.info, 'danger');
            }
        });
    }
});
