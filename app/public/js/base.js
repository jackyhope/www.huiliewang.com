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
function alert_notice(obj) {
    /*  参数obj为json对象
        属性:
        title:  标题
        content:  详细说明（选填）
        type:  warnin，success，error，除这三种，可以传入imgurl（默认success）
        btn:按钮内容（默认确认）
        else：附加信息（可在回调中操作）
        src: 点击按钮跳转链接（选填）
        callback：回调函数，弹窗出现时触发，会传入附加信息的jquery对象
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
        <span class="dialog_con">${obj.content}</span>
        <button class="dialog_btn button_2 gradient_1">${obj.btn?obj.btn:'确认'}</button>
        <span class="dialog_else">${obj.else}</span>
    </div>
</div>
    `)
    $('.dialog_box .close_dialog').off('click');
    if (obj.callback) {
        $('.dialog_box .close_dialog').one('click',ev => {
            obj.callback($(ev.target))
        })
        $('.dialog_box .close_dialog').click()
    }
    $('.dialog_box .dialog_btn').off('click');
    $('.dialog_box .close_dialog').click(ev => {
        $(ev.target).parent().parent('.mask').remove()
    })
    $('.dialog_box .dialog_btn').click(ev => {
        $(ev.target).parent().parent('.mask').remove()
        if (obj.src) {
            window.location.href = obj.sec
        }
    })
    $('.mask').off();
    $('.mask').on('mousewheel',ev=>{
        return false
    })
    $('.mask').click(ev=>{
        $(ev.target).remove();
    })
    $('.mask .dialog_box').off();
    $('.mask .dialog_box').click(ev=>{
        return false
    });

}
function close_all_dialog(){
    //关闭所有弹窗
    $('.mask').remove()
}