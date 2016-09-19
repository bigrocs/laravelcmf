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
                $.ajax({
                    dataType: "json",
                    url: target,
                    data: query,
                    type: "post",
                    success: function(data) {
                        alertMessager(data.title,data.message, data.status,data.time);
                        // if (data.status == undefined) {
                        //     alert(data);
                        //     $(that).removeClass('disabled').prop('disabled', false);
                        // } else {
                        //     if (data.status == 1) {
                        //         if (data.url && !$(that).hasClass('no-refresh')) {
                        //             var message = data.message + ' 页面即将自动跳转~';
                        //         } else {
                        //             var message = data.message;
                        //         }
                        //         alertMessager(message, 'success');
                        //         setTimeout(function() {
                        //             if ($(that).hasClass('no-refresh')) {
                        //                 return false;
                        //             }
                        //             if (data.url && !$(that).hasClass('no-forward')) {
                        //                 location.href = data.url;
                        //             } else {
                        //                 location.reload();
                        //             }
                        //         }, 50000);
                        //     } else {
                        //         alertMessager(data.message, 'notice');
                        //         setTimeout(function() {
                        //             $(that).removeClass('disabled').prop('disabled', false);
                        //         }, 50000);
                        //         if ($('.reload-verify').length > 0) {
                        //             $('.reload-verify').click();
                        //         }
                        //     }
                        // }
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
                        if (data.status == undefined) {
                            $(that).removeClass('disabled').prop('disabled', false);
                        } else {
                            if (data.status == 1) {
                                if (data.url && !$(that).hasClass('no-refresh')) {
                                    var message = data.message + ' 页面即将自动跳转~';
                                } else {
                                    var message = data.message;
                                }
                                alertMessager(message, 'success');
                                setTimeout(function() {
                                    $(that).removeClass('disabled').prop('disabled', false);
                                    if ($(that).hasClass('no-refresh')) {
                                        return false;
                                    }
                                    if (data.url && !$(that).hasClass('no-forward')) {
                                        location.href = data.url;
                                    } else {
                                        location.reload();
                                    }
                                }, 50000);
                            } else {
                                if (data.login == 1) {
                                    $('#login-modal').modal(); //弹出登陆框
                                } else {
                                    alertMessager(data.message, 'notice');
                                }
                                setTimeout(function() {
                                    $(that).removeClass('disabled').prop('disabled', false);
                                }, 50000);
                            }
                        }
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
    var alertMessager = function(title,message, status, time) {
        new PNotify({
            title: title,
            text: time+' '+message,
            type: status,
            delay: 5000,
            styling: 'bootstrap3',
            icon: 'fa fa-check',
            animate: {
                animate: true,
                in_class: 'zoomInUp',
                out_class: 'zoomOutUp'
            }
        });
    }
    return {
        init: function() {
            bodyAjaxPost()//处理AJAX-POST请求
            bodyAjaxGet()//处理AJAX-GET请求
        },
    };
}();
jQuery(document).ready(function() {
   App.init(); // init metronic core componets
});
