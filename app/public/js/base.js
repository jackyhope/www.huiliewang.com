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
    setTimeout(()=>{$('#picker input').click()},200)
}