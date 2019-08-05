$(function () {
    Post('/member/index.php?c=resume_api&act=jobs').then(res => {
        $('#business_select').html(`<div class="select_box_list">
        <a href="javascript:void(0);" onclick="select_new('business','0','全部职位')">全部职位</a>
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
        // /**批量模版切换测试js-start **/
        // $('.c_table').hide().eq($(this).index()).show();
        // /**批量模版切换测试js-end **/
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
                title: "请选择候选人是否到场！",
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
/**通用单选下拉框 start **/
function select_click(name) {
    $("#" + name + "_select").toggle(); //弹出框显示

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
    $("#" + name + "_name").val(valname); //替换新名称
    $("#" + name + "_val").val(val); //替换新值
    $("#" + name + "_select").hide(); //弹出框隐藏
    $('input[name=' + name + ']').trigger('myev', [$('input[name=' + name + ']').val(), val])
}
/**通用单选下拉框 end **/


/**
 * module 叉关闭当前弹框
 */
function m_close(obj) {
    $('#c_shade').addClass('c_hide');
    $(obj).parent().addClass('c_hide');
}

/**
 * 余额不足  _module = c_module_1
 * 余额不足  _module = c_module_2
 * 余额不足  _module = c_module_3
 * 余额不足  _module = c_module_4
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
            <div class="li">候选人</div>
            <div class="li">年薪</div>
            <div class="li">应扣点数</div>
            <div class="li">当前可用点数</div>
            <div class="li color-3CC1D3">${res.info.name}</div>
            <div class="li color-3CC1D3">${res.info.salary}万</div>
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
            $('.c_module_4 .ykc').html(res.info.money + '点');
            $('.c_module_4 .msBTn').attr('resume_id', module[1]);
            $('.c_module_4 .msBTn').attr('project_id', module[2]);
        }
        if (module[0] == 'c_module_3') {
            $('.c_module_3 .c_msg').html(`
            请确认候选人是否到场面试，确认到场后系统将扣除慧面试余量${res.info.money}点； 如未到场系统则返还预扣除的慧面试点数
            `)
            $('.c_module_3 .ul').html(`
                    <div class="li">职位</div>
                    <div class="li">候选人</div>
                    <div class="li">预扣点数</div>
                    <div class="li">实际扣除</div>
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
        title: '确认操作',
        content: '您确定要将该简历标记为不合适？',
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
                _que.html(`<p class="que_title">${$(this).attr('huilie_status')==5?'等待顾问最终确认面试信息':'等待候选人前来面试'}</p>
            <p>我发起的面试邀请</p>
            <div class="dl clearall">
                <div class="dt">面试时间：</div>
                <div class="dd">${res.info.timestart}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">面试地点：</div>
                <div class="dd">${res.info.interview_place}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">面试人：</div>
                <div class="dd">${res.info.status_type}</div>
            </div>
            <div class="dl clearall">
                <div class="dt">备注：</div>
                <div class="dd">${res.info.description}</div>
            </div>`)
            } else {
                _que.html(`<p class="que_title">候选人拒绝</p>
                <div class="dl clearall">
                    <div class="dt">拒绝原因：</div>
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
            title: '操作确认',
            content: '确认移除该候选人？',
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
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}'  alt="点我查看详情" title="点我查看详情" resume_id='${val.resume_id}' project_id='${val.project_id}'>待确认<img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light" style='cursor:default;background:#c1c1c1;color:#fff;border:none;' href="void:0">等待面试</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">等待顾问最终确认面试信息</p>
                <p>我发起的面试邀请</p>
                <div class="dl clearall">
                    <div class="dt">面试时间：</div>
                    <div class="dd">456456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">面试地点：</div>
                    <div class="dd">123456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">面试人：</div>
                    <div class="dd">BOSS老板</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">备注：</div>
                    <div class="dd">麻烦带上一份个人详细简历资料，带上身份证</div>
                </div>
            </div>
        `
    } else if (val.huilie_status == 6) {
        return `
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}' resume_id='${val.resume_id}' project_id='${val.project_id}' alt="点我查看详情" title="点我查看详情">已确认<img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light conAt" resume_id='${val.resume_id}' project_id='${val.project_id}' href="void:0">到场确认</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">等待候选人前来面试</p>
                <p>我发起的面试邀请</p>
                <div class="dl clearall">
                    <div class="dt">面试时间：</div>
                    <div class="dd">456456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">面试地点：</div>
                    <div class="dd">123456</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">面试人：</div>
                    <div class="dd">BOSS老板</div>
                </div>
                <div class="dl clearall">
                    <div class="dt">备注：</div>
                    <div class="dd">麻烦带上一份个人详细简历资料，带上身份证</div>
                </div>
            </div>
        `
    } else if (val.huilie_status == 7) {
        return `
        <div class="c_td show_hands que_tips" huilie_status='${val.huilie_status}' resume_id='${val.resume_id}' project_id='${val.project_id}' alt="点我查看详情" title="点我查看详情">已拒绝 <img src="/app/public/imgs/c_holding.png" alt=""></div>
            <div class="c_td"><a class="c_btn c_btn_light removeAt" resume_id='${val.resume_id}' project_id='${val.project_id}' href="void:0">移除</a></div>
            <div class="c_jsshow show_que">
                <p class="que_title">候选人拒绝</p>
                <div class="dl clearall">
                    <div class="dt">拒绝原因：</div>
                    <div class="dd">离家太远，暂不考虑</div>
                </div>
            </div>

        `
    }
}

function getStatus(status) {
    switch (status) {
        case '1':
            return '未查看'
        case '2':
            return '已查看'
        case '3':
            return '不合适'
        case '4':
            return '已购买'
        case '5':
            return '邀约面试'
        case '6':
            return '顾问确认'
        case '7':
            return '候选人拒绝'
        case '8':
            return '待面试'
        case '9':
            return '未到场确认中'
        case '10':
            return '未到场'
        case '11':
            return '已到场'
        case '0':
            return '已移除'
    }
}