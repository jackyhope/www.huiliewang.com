(function($, h, c) {
    var a = $([]), e = $.resize = $.extend($.resize, {}), i, k = "setTimeout", j = "resize", d = j
        + "-special-event", b = "delay", f = "throttleWindow";
    e[b] = 350;
    e[f] = true;
    $.event.special[j] = {
        setup : function() {
            if (!e[f] && this[k]) {
                return false
            }
            var l = $(this);
            a = a.add(l);
            $.data(this, d, {
                w : l.width(),
                h : l.height()
            });
            if (a.length === 1) {
                g()
            }
        },
        teardown : function() {
            if (!e[f] && this[k]) {
                return false
            }
            var l = $(this);
            a = a.not(l);
            l.removeData(d);
            if (!a.length) {
                clearTimeout(i)
            }
        },
        add : function(l) {
            if (!e[f] && this[k]) {
                return false
            }
            var n;
            function m(s, o, p) {
                var q = $(this), r = $.data(this, d);
                r.w = o !== c ? o : q.width();
                r.h = p !== c ? p : q.height();
                n.apply(this, arguments)
            }
            if ($.isFunction(l)) {
                n = l;
                return m
            } else {
                n = l.handler;
                l.handler = m
            }
        }
    };
    function g() {
        i = h[k](function() {
            a.each(function() {
                var n = $(this), m = n.width(), l = n.height(), o = $
                    .data(this, d);
                if (m !== o.w || l !== o.h) {
                    n.trigger(j, [ o.w = m, o.h = l ])
                }
            });
            g()
        }, e[b])
    }
})(jQuery, this);

$(function(){
    $('.container .ul .li').click(function(){
        $('.container .ul .li').removeClass('current');
        $(this).addClass('current');
        /**批量模版切换测试js-start **/
        $('.c_table').hide().eq($(this).index()).show();
        /**批量模版切换测试js-end **/
    })
    $('.new_tips').stop(true).click(function () {
        $('.c_jsshow').hide();
        var _tips = $(this).parent().find('.show_tips');
        _tips.stop(true).fadeToggle(600);
        $(this).parent('.c_th').hover(function () {
        },function () {
            setTimeout(function () {
                _tips.fadeOut(300);
            },1000);
        })
    })

    $('.que_tips').stop(true).click(function(){
        $('.c_jsshow').hide();
        var _que = $(this).parent().find('.show_que');
        _que.stop(true).fadeToggle(600);
        $(this).parent('.c_tr').hover(function () {
        },function () {
            setTimeout(function () {
                _que.stop(true).fadeOut(300);
            },1000);
        })
    })

    /****************/
    // $('#c_shade').click(function(){
    //     $(this).fadeOut(300);
    //     $(this).find('.c_module').removeClass('c_show').addClass('c_hide');
    // })
    /****************/
})
/**通用单选下拉框 start **/
function select_click(name){
    $("#"+name+"_select").toggle();//弹出框显示

}
function select_new(name,val,valname){
    if(name=='type'){
        if(val==2){
            $("#photo").show();
            $(".pic").show();
        }
        if(val==1){
            $("#photo").hide();
            $(".pic").hide();
        }
    }
    if(name=='fz_type'){
        if(val==1){
            $("#fz_type_1").show();
            $("#fz_type_2").hide();
        }else{
            $("#fz_type_1").hide();
            $("#fz_type_2").show();
        }
    }
    if(name=='datetype'){
        $("#xfilename").attr('value',val);
    }
    val=='0'?$("#is_rec").show():$("#is_rec").hide();
    $("#"+name+"_name").val(valname);//替换新名称
    $("#"+name+"_val").val(val);//替换新值
    $("#"+name+"_select").hide();//弹出框隐藏
}
/**通用单选下拉框 end **/

function m_close(obj){
    $('#c_shade').hide();
    $(obj).parent().hide();
}


