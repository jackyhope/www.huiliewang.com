//ajax�����װ
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
//����֤
function formVerify() { //�����ֻ֤����ʾ���ã�����������
    $('input.verify').blur(ev => {
        let reg = new RegExp($(ev.target).attr('rule'))
        if (!$(ev.target).val() || !$(ev.target).val().match(reg)) {
            //��ʾ����class��form_notice
            if ($(ev.target).next('.form_notice').length == 0) {
                $(ev.target).after(`<span class='form_notice'>${$(ev.target).attr('notice')}</span>`)
            }
        } else {
            $(ev.target).next('.form_notice').remove();
        }
    })
}
//�������ִ��һ��
$(formVerify)
//�����ϴ�
function upload(obj) {
    /*  ����objΪjson����
        ����:
        type��  �ϴ���������,�ַ����������Ͷ��Ÿ���
        data:   �ϴ�����������json����
        uploadStart���ϴ���ʼ�ص�
        uploadProgress���ϴ����̻ص�
        uploadSuccess���ϴ��ɹ��ص�
        uploadError���ϴ���ϻص�
        ���ϻص����в���
        ����1���ļ���Ϣ
        ����2����������ִ
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
            // swal('�ϴ����ʹ���', "", "warning");
        } else if (type == 'Q_EXCEED_SIZE_LIMIT') {
            // swal('�ļ�����', "", "warning");
        }
    });
    setTimeout(() => {
        $('#picker input').click()
    }, 200)
}
//��ʾ��Ϣ����
function alert_notice(obj={title:'�����ɹ�',content:'',type:'success',btn:'ȷ��',else:''}) {
    /*  ����objΪjson����
        ����:
        title:  ���⣨Ĭ�ϣ������ɹ���
        content:  ��ϸ˵����ѡ�
        type:  warnin��success��error���������֣����Դ���imgurl��Ĭ��success��
        btn:��ť���ݣ�Ĭ��ȷ�ϣ�
        else��������Ϣ�����ڻص��в�����
        src: �����ť��ת���ӣ�ѡ�
        callback���ص���������������ʱ�������ᴫ�븽����Ϣ��jquery����
        ����չʾ��Ϣ�����Դ��븻�ı���ʽ
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
        <button class="dialog_btn button_2 gradient_1">${obj.btn?obj.btn:'ȷ��'}</button>
        <span class="dialog_else">${obj.else?obj.else:''}</span>
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
    //�ر����е���
    $('.mask').remove()
}