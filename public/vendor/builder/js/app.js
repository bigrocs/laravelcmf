var App = function() {
    /**
     * [handleHeight 处理AJAX-POST请求]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-12T09:17:18+0800
     * @return   {[type]}                 [description]
     */
    var bodyAjaxPost = function() {
            'use strict';
            //ajax post submit请求
            $(document).on('click', '.ajax-post', function() {
                var target, query, form;
                var target_form = $(this).attr('target-form');
                var that = this;
                var nead_confirm = false;

                if (($(this).attr('type') == 'submit') || (target = $(this).attr('href')) || (target = $(this).attr('url'))) {
                    form = $('.' + target_form);
                    if ($(this).attr('hide-data') === 'true') { //无数据时也可以使用的功能
                        form = $('.hide-data');
                        query = form.serialize();
                    } else if (form.get(0) == undefined) {
                        return false;
                    } else if (form.get(0).nodeName == 'FORM') {
                        if ($(this).hasClass('confirm')) {
                            if (!confirm('确认要执行该操作吗?')) {
                                return false;
                            }
                        }
                        if ($(this).attr('url') !== undefined) {
                            target = $(this).attr('url');
                        } else {
                            target = form.get(0).action;
                        }
                        query = form.serialize();
                    } else if (form.get(0).nodeName == 'INPUT' || form.get(0).nodeName == 'SELECT' || form.get(0).nodeName == 'TEXTAREA') {
                        form.each(function(k, v) {
                            if (v.type == 'checkbox' && v.checked == true) {
                                nead_confirm = true;
                            }
                        });
                        if (nead_confirm && $(this).hasClass('confirm')) {
                            if (!confirm('确认要执行该操作吗?')) {
                                return false;
                            }
                        }
                        query = form.serialize();
                    } else {
                        if ($(this).hasClass('confirm')) {
                            if (!confirm('确认要执行该操作吗?')) {
                                return false;
                            }
                        }
                        query = form.find('input,select,textarea').serialize();
                    }
                    $(this).addClass('disabled').attr('autocomplete', 'off').prop('disabled', true);
                    $.ajax({
                        dataType: "json",
                        url: target,
                        data: query,
                        type: "post",
                        success: function(data) {
                            PNotifyMessager(data.title, data.message, data.status, data.time);
                            setTimeout(function() {
                                $(that).removeClass('disabled').prop('disabled', false);
                            }, 1000);
                        },
                        error: function(e) {
                            if (e.responseText) {
                                alert(e.responseText);
                            }
                            $(that).removeClass('disabled').prop('disabled', false);
                        }
                    });
                }
                return false;
            });
        }
        /**
         * [bodyAjaxGet 处理AJAX-GET请求]
         * @Author   BigRocs                  BigRocs@qq.com
         * @DateTime 2016-07-15T15:48:46+0800
         * @return   {[type]}                 [description]
         */
    var bodyAjaxGet = function() {
        'use strict';
        //ajax get请求
        $(document).on('click', '.ajax-get', function() {
            var target;
            var that = this;
            if ($(this).hasClass('confirm')) {
                if (!confirm('确认要执行该操作吗?')) {
                    return false;
                }
            }
            if ((target = $(this).attr('href')) || (target = $(this).attr('url'))) {
                $(this).addClass('disabled').attr('autocomplete', 'off').prop('disabled', true);
                $.ajax({
                    dataType: "json",
                    url: target,
                    type: "get",
                    success: function(data) {
                        PNotifyMessager(data.title, data.message, data.status, data.time);
                        setTimeout(function() {
                            $(that).removeClass('disabled').prop('disabled', false);
                        }, 1000);
                    },
                    error: function(e) {
                        if (e.responseText) {
                            alert(e.responseText);
                        }
                        $(that).removeClass('disabled').prop('disabled', false);
                    }
                });
            }
            return false;
        });
    }
    var PNotifyMessager = function(title, message, status, time) {
        var mydate = new Date();
        status = status ? status : 'error';
        if (status == 'success') {
            message = message ? message : "操作成功!";
            title = title ? title : "操作成功!";
            icon = 'fa fa-check';
        }
        if (status == 'error' || status == 'danger') {
            status = 'error';
            message = message ? message : "未知错误!";
            title = title ? title : "未知错误!";
            icon = 'fa fa-remove';
        }
        if (status == 'notice' || status == 'warning') {
            status = 'notice';
            message = message ? message : "请注意!";
            title = title ? title : "请注意!";
            icon = 'fa fa-warning';
        }
        if (status == 'info') {
            message = message ? message : "提示信息!";
            title = title ? title : "提示信息!";
            icon = 'fa fa-info';
        }
        time = time ? time : mydate.getHours() + "时" + mydate.getMinutes() + "分" + mydate.getSeconds() + "秒";
        new PNotify({
            title: title,
            text: time + ' ' + message,
            type: status,
            delay: 5000,
            styling: 'bootstrap3',
            icon: icon,
            animate: {
                animate: true,
                in_class: 'zoomInUp',
                out_class: 'zoomOutUp'
            }
        });
    }
    return {
        init: function() {
            bodyAjaxPost() //处理AJAX-POST请求
            bodyAjaxGet() //处理AJAX-GET请求
        },
    };
}();
jQuery(document).ready(function() {
    App.init(); // init metronic core componets
});
