//ajax请求封装
function Post(url, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url,
            data,
            type: 'post',
            success(res) {
                if (typeof res == 'string') {
                    res = JSON.parse(res);
                }
                if (res.code == 200) {
                    resolve(res);
                } else {
                    reject(res);
                }
            }
        })
    })
}

function Get(url, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url,
            data,
            type: 'get',
            success(res) {
                if (typeof res == 'string') {
                    res = JSON.parse(res)
                }
                if (res.code == 200) {
                    resolve(res);
                } else {
                    reject(res);
                }
            }
        })
    })
}
//表单验证
function formVerify() { //这个验证只有提示作用，不拦截请求
    $('input.verify').blur(ev => {
        let reg = new RegExp($(ev.target).attr('rule'))
        if (!$(ev.target).val() || !$(ev.target).val().match(reg)) {
            //提示持有class名form_notice
            if ($(ev.target).next('.form_notice').length == 0) {
                $(ev.target).after(`<span class='form_notice'>${$(ev.target).attr('notice')}</span>`)
            }
        } else {
            $(ev.target).next('.form_notice').remove();
        }
    })
}
//加载完成执行一次
$(formVerify)
//单个上传
function upload(obj) {
    /*  参数obj为json对象
        属性:
        type：  上传允许类型,字符串，多类型逗号隔开
        data:   上传附带参数，json对象
        uploadStart：上传开始回调
        uploadProgress：上传过程回调
        uploadSuccess：上传成功回调
        uploadError：上传完毕回调
        以上回调均有参数
        参数1：文件信息
        参数2：服务器回执
    */
    $('#picker').remove();
    $('header').append('<div id="picker" style="display: none;"></div>')
    var uploader = WebUploader.create({
        swf: '/app/public/Uploader.swf',
        server: '/member/index.php?c=uppic&act=ajaxfileupload',
        pick: {
            id: '#picker',
            multiple: false,
        },
        auto: true,
        resize: false,
        accept: {
            extensions: obj.type,
        },
        duplicate: true,
        'fileSingleSizeLimit': 1024 * 1024,
        formData: obj.data
        // fileNumLimit:1
    });
    uploader.on('uploadStart', obj.uploadStart)
    uploader.on('uploadProgress', obj.uploadProgress)
    uploader.on('uploadSuccess', obj.uploadSuccess)
    uploader.on('uploadError', obj.uploadStart)
    uploader.on('error', type => {
        if (type == 'Q_TYPE_DENIED') {
            // swal('上传类型错误', "", "warning");
        } else if (type == 'Q_EXCEED_SIZE_LIMIT') {
            // swal('文件过大', "", "warning");
        }
    });
    setTimeout(() => {
        $('#picker input').click()
    }, 200)
}
//提示信息弹窗
function alert_notice(obj = {
    title: '操作成功',
    content: '',
    type: 'success',
    btn: '确认',
    else: '',
    comfirm() {}
}) {
    /*  参数obj为json对象
        属性:
        title:  标题（默认：操作成功）
        content:  详细说明（选填）
        type:  warnin，success，error，除这三种，可以传入imgurl（默认success）
        btn:按钮内容（默认确认）
        else：附加信息（可在回调中操作）
        src: 点击按钮跳转链接（选填）
        callback：回调函数，弹窗出现时触发，会传入附加信息的jquery对象
        confirm：回调函数，点击按钮时触发,此时不触发默认事件（关闭弹窗和跳转）,会传入事件对象
        以上展示信息都可以传入富文本格式
    */

    let img = '';
    if (obj.type == 'warning') {
        img = '/app/public/imgs/7_03.png'
    } else if (obj.type == 'success' || !obj.type) {
        img = '/app/public/imgs/5_03.png'
    } else if (obj.type == 'error') {
        img = '/app/public/imgs/6_03.png'
    } else {
        img = obj.type;
    }
    $('body').append(`
    <div class="mask">
    <div class="dialog_box">
        <img src="/app/public/imgs/cl_03.png" alt="" class="close_dialog">
        <img src="${img}" alt="" class="dialog_img">
        <span class="dialog_title">${obj.title}</span>
        <span class="dialog_con">${obj.content?obj.content:''}</span>
        <button class="dialog_btn button_2 gradient_1">${obj.btn?obj.btn:'确认'}</button>
        <span class="dialog_else">${obj.else?obj.else:''}</span>
    </div>
</div>
    `)
    $('.dialog_box .close_dialog').off('click');
    if (obj.callback) {
        $('.dialog_box .close_dialog').one('click', ev => {
            obj.callback($(ev.target))
        })
        $('.dialog_box .close_dialog').click()
    }
    $('.dialog_box .dialog_btn').off('click');
    $('.dialog_box .close_dialog').click(ev => {
        $(ev.target).parent().parent('.mask').remove();
    })
    if (obj.confirm) {
        $('.dialog_box .dialog_btn').click(ev => {
            obj.confirm(ev)
        })
    } else {
        $('.dialog_box .dialog_btn').click(ev => {
            $(ev.target).parent().parent('.mask').remove()
            if (obj.src) {
                window.location.href = obj.src
            }
        })
    }
    $('.mask').off();
    $('.mask').on('mousewheel', ev => {
        return false
    })
    $('.mask').click(ev => {
        $(ev.target).remove();
    })
    $('.mask .dialog_box').off();
    $('.mask .dialog_box').click(ev => {
        return false
    });

}

function close_all_dialog() {
    //关闭所有弹窗
    $('.mask').remove()
}
//时间戳处理
function get_time(date, type = 1) {
    /*默认返回yyyy-MM-DD hh:mm:ss
    type=1:yyyy-MM-DD hh:mm:ss,
    type=2:yyyy-MM-DD hh:mm,
    type=3:yyyy-MM-DD,
    type=4:MM-DD hh:mm,
    type=5:MM-DD*/
    var time = new Date(date * 1000);
    var yy = time.getFullYear(); //年
    var MM = time.getMonth() + 1; //月
    var dd = time.getDate(); //日
    var hh = time.getHours(); //时
    var mm = time.getMinutes(); //分
    var ss = time.getSeconds(); //秒
    if (MM < 10) MM = "0" + MM;
    if (dd < 10) dd = "0" + dd;
    if (hh < 10) hh = "0" + hh;
    if (mm < 10) mm = '0' + mm;
    if (ss < 10) ss = '0' + ss;
    if (type == 1) return yy + '-' + MM + '-' + dd + ' ' + hh + ':' + mm + ':' + ss;
    if (type == 2) return yy + '-' + MM + '-' + dd + ' ' + hh + ':' + mm;
    if (type == 3) return yy + '-' + MM + '-' + dd;
    if (type == 4) return MM + '-' + dd + ' ' + hh + ':' + mm;
    if (type == 5) return MM + '-' + dd;
}
//获取query值
function getQueryVariable(variable = 'c') {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return (false);
}
//通知获取
function get_msg() {
    function getCookie(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        return (arr = document.cookie.match(reg)) ? unescape(arr[2]) : null;
    }
    if (!getCookie('uid'))return;
        Post('/member/index.php?c=sysnews&act=msg_list').then(res => {
            if (res.info.count == 0) {
                $('.noticenum').css('display', 'none')
                $('.noticeBox').html(`
            <span class="readAll">全部设置为已读</span>
            <span class="noMsg">没有新消息</span>
            `)
        //     <span class='showAll'>
        //     查看全部消息
        //   </span>

            } else {
                $('.noticenum').html(res.info.count);
                $('.noticeBox').html(`
            <span class="readAll">全部设置为已读</span>
            <span class='showAll'>
            查看全部消息
          </span>
            `)
                res.info.list.map(val => {
                    $('.showAll').before(`
                <div message_id='${val.id}' project_id='${val.job_id}' resume_id='${val.resume_id}'>
                <span>
                  ${val.content}
                </span><br>
                <span>${val.ctime}</span>
              </div>
                `)
                })
                $('.noticenum').css('display', 'inline-block');
                $('.noticeBox>div').one('click', ev => {
                    window.location.href = `/member/index.php?c=resume&act=detail&resume_id=${$(ev.target).attr('resume_id')}&project_id=${$(ev.target).attr('project_id_id')}`
                    Post('/member/index.php?c=sysnews&act=reed', {
                        message_id: $(ev.target).attr('message_id')
                    }).then(res => {
                        get_msg()
                    }).catch(res => {

                    })
                })
                $('.readAll').click(ev => {
                    Post('/member/index.php?c=sysnews&act=reed', {
                        is_all: 1
                    }).then(res => {
                        get_msg()
                    }).catch(res => {

                    })
                })
            }
        }).catch(res => {

        })
}
$(function () {
    get_msg();
    setInterval(get_msg, 10000)
})
//登出
function logout(url = 'index.php?act=logout', redirecturl) {
    $.get(url, function (msg) {
        if (msg == 1 || msg.indexOf('script')) {
            if (msg.indexOf('script')) {
                $('#uclogin').html(msg);
            }
            alert_notice({
                title: '您已成功退出！'
            });
            window.location.href = '/login'
        } else {
            layer.msg('退出失败！', 2, 8);
        }
    });
}