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
function alert_notice(obj = {
    title: '�����ɹ�',
    content: '',
    type: 'success',
    btn: 'ȷ��',
    else: '',
    comfirm() {}
}) {
    /*  ����objΪjson����
        ����:
        title:  ���⣨Ĭ�ϣ������ɹ���
        content:  ��ϸ˵����ѡ�
        type:  warnin��success��error���������֣����Դ���imgurl��Ĭ��success��
        btn:��ť���ݣ�Ĭ��ȷ�ϣ�
        else��������Ϣ�����ڻص��в�����
        src: �����ť��ת���ӣ�ѡ�
        callback���ص���������������ʱ�������ᴫ�븽����Ϣ��jquery����
        confirm���ص������������ťʱ����,��ʱ������Ĭ���¼����رյ�������ת��,�ᴫ���¼�����
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
    //�ر����е���
    $('.mask').remove()
}
//ʱ�������
function get_time(date, type = 1) {
    /*Ĭ�Ϸ���yyyy-MM-DD hh:mm:ss
    type=1:yyyy-MM-DD hh:mm:ss,
    type=2:yyyy-MM-DD hh:mm,
    type=3:yyyy-MM-DD,
    type=4:MM-DD hh:mm,
    type=5:MM-DD*/
    var time = new Date(date * 1000);
    var yy = time.getFullYear(); //��
    var MM = time.getMonth() + 1; //��
    var dd = time.getDate(); //��
    var hh = time.getHours(); //ʱ
    var mm = time.getMinutes(); //��
    var ss = time.getSeconds(); //��
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
//��ȡqueryֵ
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
//֪ͨ��ȡ
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
            <span class="readAll">ȫ������Ϊ�Ѷ�</span>
            <span class="noMsg">û������Ϣ</span>
            `)
        //     <span class='showAll'>
        //     �鿴ȫ����Ϣ
        //   </span>

            } else {
                $('.noticenum').html(res.info.count);
                $('.noticeBox').html(`
            <span class="readAll">ȫ������Ϊ�Ѷ�</span>
            <span class='showAll'>
            �鿴ȫ����Ϣ
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
//�ǳ�
function logout(url = 'index.php?act=logout', redirecturl) {
    $.get(url, function (msg) {
        if (msg == 1 || msg.indexOf('script')) {
            if (msg.indexOf('script')) {
                $('#uclogin').html(msg);
            }
            alert_notice({
                title: '���ѳɹ��˳���'
            });
            window.location.href = '/login'
        } else {
            layer.msg('�˳�ʧ�ܣ�', 2, 8);
        }
    });
}