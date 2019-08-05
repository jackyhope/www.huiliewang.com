$(function () {
    Post('/member/index.php?c=resume_api&act=jobs').then(res => {
        $('#business_select').html(`<div class="select_box_list">
        <a href="javascript:void(0);" onclick="select_new('business','0','ȫ��ְλ')">ȫ��ְλ</a>
    </div>`)
        res.info.map(val => {
            $('#business_select').append(`
        <div class="select_box_list">
                        <a href="javascript:void(0);" onclick="select_new('business','${val.id}','${val.name}')">${val.name}</a>
                    </div>
        `)
        })
    })
    $('.container .ul .li').click(ev => {
        // $('.container .ul .li').removeClass('current');
        // $(this).addClass('current');
        // /**����ģ���л�����js-start **/
        // $('.c_table').hide().eq($(this).index()).show();
        // /**����ģ���л�����js-end **/
        window.location.href = $(ev.target).attr('link')
    })

    bindev()
    $('.c_module_2 .gmBTn').click(ev => {
        Post('/member/index.php?c=resume_api&act=pay', {
            resume_id: $(ev.target).attr('resume_id'),
            project_id: $(ev.target).attr('project_id'),
        }).then(res => {
            $('.pagersel').change();
            $('.c_module_2').addClass('c_hide');
            $('#c_shade').addClass('c_hide');
            alert_notice({
                title: res.info
            })
        }).catch(res => {
            alert_notice({
                title: res.info,
                type: 'error'
            })
        })
    })
    $('.c_module_4 .msBTn').click(ev => {
        Post('/member/index.php?c=resume_api&act=interview', {
            resume_id: $(ev.target).attr('resume_id'),
            project_id: $(ev.target).attr('project_id'),
            interview_address: $('#atAdd').val(),
            interviewer: $('#atName').val(),
            note: $('#atMsg').val(),
            interview_time: $('#atTime').val(),
        }).then(res => {
            $('.pagersel').change();
            $('.c_module_4').addClass('c_hide');
            $('#c_shade').addClass('c_hide');
            alert_notice({
                title: res.info
            })
        }).catch(res => {
            alert_notice({
                title: res.info,
                type: 'error'
            })
        })
    })
    $('.c_module_3 .dcBtn').click(ev => {
        if ($('input[name=is_arrive]:checked').length==0) {
            alert_notice({
                title: "��ѡ���ѡ���Ƿ񵽳���",
                type: 'warning'
            })
            return
        }
        Post('/member/index.php?c=resume_api&act=present', {
            resume_id: $(ev.target).attr('resume_id'),
            project_id: $(ev.target).attr('project_id'),
            is_present: $('input[name=is_arrive]:checked').val()
        }).then(res => {
            $('.pagersel').change();
            $('.c_module_3').addClass('c_hide');
            $('#c_shade').addClass('c_hide');
            alert_notice({
                title: res.info
            })
        }).catch(res => {
            alert_notice({
                title: res.info,
                type: 'error'
            })
        })
    })
})
/**ͨ�õ�ѡ������ start **/
function select_click(name) {
    $("#" + name + "_select").toggle(); //��������ʾ

}

function select_new(name, val, valname, ) {
    if (name == 'type') {
        if (val == 2) {
            $("#photo").show();
            $(".pic").show();
        }
        if (val == 1) {
            $("#photo").hide();
            $(".pic").hide();
        }
    }
    if (name == 'fz_type') {
        if (val == 1) {
            $("#fz_type_1").show();
            $("#fz_type_2").hide();
        } else {
            $("#fz_type_1").hide();
            $("#fz_type_2").show();
        }
    }
    if (name == 'datetype') {
        $("#xfilename").attr('value', val);
    }
    val == '0' ? $("#is_rec").show() : $("#is_rec").hide();
    $("#" + name + "_name").val(valname); //�滻������
    $("#" + name + "_val").val(val); //�滻��ֵ
    $("#" + name + "_select").hide(); //����������
    $('input[name=' + name + ']').trigger('myev', [$('input[name=' + name + ']').val(), val])
}
/**ͨ�õ�ѡ������ end **/


/**
 * module ��رյ�ǰ����
 */
function m_close(obj) {
    $('#c_shade').addClass('c_hide');
    $(obj).parent().addClass('c_hide');
}

/**
 * ����  _module = c_module_1
 * ����  _module = c_module_2
 * ����  _module = c_module_3
 * ����  _module = c_module_4
 *
 * */

function show_module(_module) {
    let module = _module.split(',')
    Post('/member/index.php?c=resume_api&act=buy_detail', {
        resume_id: module[1],
        project_id: module[2]
    }).then(res => {
        $('#c_shade').removeClass('c_hide');
        $('.c_module').addClass('c_hide');
        $('.' + module[0]).removeClass('c_hide');
        if (module[0] == 'c_module_2') {
            $('.c_module_2 .ul').html(`
            <div class="li">��ѡ��</div>
            <div class="li">��н</div>
            <div class="li">Ӧ�۵���</div>
            <div class="li">��ǰ���õ���</div>
            <div class="li color-3CC1D3">${res.info.name}</div>
            <div class="li color-3CC1D3">${res.info.salary}��</div>
            <div class="li color-3CC1D3">${res.info.money}</div>
            <div class="li color-3CC1D3">${res.info.surplus}</div>
            `)
            if (res.info.money - 0 > (res.info.surplus)) {
                $('.bgl').removeClass('c_hide')
                $('.c_module_2 .hgn').addClass('c_hide')
            } else {
                $('.bgl').addClass('c_hide')
                $('.c_module_2 .hgn').removeClass('c_hide')
            }
            $('.c_module_2 .gmBTn').attr('resume_id', module[1]);
            $('.c_module_2 .gmBTn').attr('project_id', module[2]);
        }
        if (module[0] == 'c_module_4') {
            $('.c_module_4 .msn').html(res.info.name);
            $('.c_module_4 .msp').html(res.info.job_name);
            $('.c_module_4 .ykc').html(res.info.money + '��');
            $('.c_module_4 .msBTn').attr('resume_id', module[1]);
            $('.c_module_4 .msBTn').attr('project_id', module[2]);
        }
        if (module[0] == 'c_module_3') {
            $('.c_module_3 .c_msg').html(`
            ��ȷ�Ϻ�ѡ���Ƿ񵽳����ԣ�ȷ�ϵ�����ϵͳ���۳�����������${res.info.money}�㣻 ��δ����ϵͳ�򷵻�Ԥ�۳��Ļ����Ե���
            `)
            $('.c_module_3 .ul').html(`
                    <div class="li">ְλ</div>
                    <div class="li">��ѡ��</div>
                    <div class="li">Ԥ�۵���</div>
                    <div class="li">ʵ�ʿ۳�</div>
            <div class="li color-3CC1D3">${res.info.job_name}</div>
            <div class="li color-3CC1D3">${res.info.name}</div>
            <div class="li color-3CC1D3">${res.info.money}</div>
            <div class="li color-3CC1D3">${res.info.money}</div>
            `)
            $('.c_module_3 .dcBtn').attr('resume_id', module[1]);
            $('.c_module_3 .dcBtn').attr('project_id', module[2]);
        }
    }).catch(res => {

    })
    $('.cancel').click(ev => {
        $('.c_module').addClass('c_hide');
        $('#c_shade').addClass('c_hide');
    })
}

function bhs(resume_id, project_id) {
    alert_notice({
        title: 'ȷ�ϲ���',
        content: '��ȷ��Ҫ���ü������Ϊ�����ʣ�',
        type: 'warning',
        confirm() {
            Post('/member/index.php?c=resume_api&act=reject', {
                resume_id,
                project_id
            }).then(res => {
                close_all_dialog();
                $('.pagersel').change();
                alert_notice({
                    title: res.info
                });
            }).catch(res => {
                alert_notice({
                    title: res.info,
                    type: 'error'
                })
            })
        }
    })
}

function bindev() {
    $('.new_tips').stop(true).click(function () {
        $('.c_jsshow').hide();
        var _tips = $(this).parent().find('.show_tips');
        _tips.stop(true).fadeToggle(600);
        $(this).parent('.c_th').hover(function () {}, function () {
            setTimeout(function () {
                _tips.fadeOut(300);
            }, 1000);
        })
    })

    $('.que_tips').stop(true).click(function () {
        $('.c_jsshow').hide();
        var _que = $(this).parent().find('.show_que');
        _que.stop(true).fadeToggle(600);
        Post('/member/index.php?c=resume_api&act=note', {
            resume_id: $(this).attr('resume_id'),
            project_id: $(this).attr('project_id')
        }).then(res => {
            if ($(this).attr('huilie_status') == 5 || $(this).attr('huilie_status') == 6) {
                _que.html(`<p class="que_title">${$(this).attr('huilie_status')==5?'�ȴ���������ȷ��������Ϣ':'�ȴ���ѡ��ǰ������'}</p>
            <p>�ҷ������������</p>
            <div class="dl clearall">
                <div class="dt">����ʱ�䣺</div>
                <div class="dd">${res.info.timestart}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">���Եص㣺</div>
                <div class="dd">${res.info.interview_place}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">�����ˣ�</div>
                <div class="dd">${res.info.status_type}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">��ע��</div>
                <div class="dd">${res.info.description}</div>
            </div>`)
            } else {
                _que.html(`<p class="que_title">��ѡ�˾ܾ�</p>
                <div class="dl clearall">
                    <div class="dt">�ܾ�ԭ��</div>
                    <div class="dd">${val.description}</div>
                </div>`)
            }
        })
        $(this).parent('.c_tr').hover(function () {}, function () {
            setTimeout(function () {
                _que.stop(true).fadeOut(300);
            }, 1000);
        })
    })

    $('.conAt').click(ev => {
        show_module(`c_module_3,${$(ev.target).attr('resume_id')},${$(ev.target).attr('project_id')}`)
    })
    $('.removeAt').click(ev => {
        alert_notice({
            title: '����ȷ��',
            content: 'ȷ���Ƴ��ú�ѡ�ˣ�',
            type: 'warning',
            confirm() {
                Post('/member/index.php?c=resume_api&act=reject', {
                    resume_id: $(ev.target).attr('resume_id'),
                    project_id: $(ev.target).attr('project_id')
                }).then(res => {
                    close_all_dialog();
                    $('.pagersel').change();
                    alert_notice({
                        title: res.info
                    });
                }).catch(res => {
                    alert_notice({
                        title: res.info,
                        type: 'error'
                    })
                })
            }
        })
    })
}

function createDom(val) {
    if (val.huilie_status == 5) {
        return `
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}'  alt="���Ҳ鿴����" title="���Ҳ鿴����" resume_id='${val.resume_id}' project_id='${val.project_id}'>��ȷ��<img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light" style='cursor:default;background:#c1c1c1;color:#fff;border:none;' href="void:0">�ȴ�����</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">�ȴ���������ȷ��������Ϣ</p>
                <p>�ҷ������������</p>
                <div class="dl clearall">
                    <div class="dt">����ʱ�䣺</div>
                    <div class="dd">456456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">���Եص㣺</div>
                    <div class="dd">123456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">�����ˣ�</div>
                    <div class="dd">BOSS�ϰ�</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">��ע��</div>
                    <div class="dd">�鷳����һ�ݸ�����ϸ�������ϣ��������֤</div>
                </div>
            </div>
        `
    } else if (val.huilie_status == 6) {
        return `
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}' resume_id='${val.resume_id}' project_id='${val.project_id}' alt="���Ҳ鿴����" title="���Ҳ鿴����">��ȷ��<img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light conAt" resume_id='${val.resume_id}' project_id='${val.project_id}' href="void:0">����ȷ��</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">�ȴ���ѡ��ǰ������</p>
                <p>�ҷ������������</p>
                <div class="dl clearall">
                    <div class="dt">����ʱ�䣺</div>
                    <div class="dd">456456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">���Եص㣺</div>
                    <div class="dd">123456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">�����ˣ�</div>
                    <div class="dd">BOSS�ϰ�</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">��ע��</div>
                    <div class="dd">�鷳����һ�ݸ�����ϸ�������ϣ��������֤</div>
                </div>
            </div>
        `
    } else if (val.huilie_status == 7) {
        return `
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}' resume_id='${val.resume_id}' project_id='${val.project_id}' alt="���Ҳ鿴����" title="���Ҳ鿴����">�Ѿܾ� <img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light removeAt" resume_id='${val.resume_id}' project_id='${val.project_id}' href="void:0">�Ƴ�</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">��ѡ�˾ܾ�</p>
                <div class="dl clearall">
                    <div class="dt">�ܾ�ԭ��</div>
                    <div class="dd">���̫Զ���ݲ�����</div>
                </div>
            </div>

        `
    }
}

function getStatus(status) {
    switch (status) {
        case '1':
            return 'δ�鿴'
        case '2':
            return '�Ѳ鿴'
        case '3':
            return '������'
        case '4':
            return '�ѹ���'
        case '5':
            return '��Լ����'
        case '6':
            return '����ȷ��'
        case '7':
            return '��ѡ�˾ܾ�'
        case '8':
            return '������'
        case '9':
            return 'δ����ȷ����'
        case '10':
            return 'δ����'
        case '11':
            return '�ѵ���'
        case '0':
            return '���Ƴ�'
    }
}