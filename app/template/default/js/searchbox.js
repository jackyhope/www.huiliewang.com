$(function () {

    $('.cancel_btn').click(function(){
        layer.closeAll();
    });

    $(".btnr").click(function () {
        var i=$(this).index();
        $(".btnr").removeClass("curre");
        $(this).addClass("curre");
        $(".tiaojianitem").hide();
        $(".tiaojianitem").eq(i).show();
    })

    //�˲���������ѡ��
    $(".Search_jobs_more_chlose ul li a").click(function () {
        var htmlcon=$(this).html();
        var value = $(this).attr("data-id");
        $(this).closest(".Search_jobs_more_chlose").find(".Search_jobs_more_chlose_s").html(htmlcon);
        $(this).closest(".Search_jobs_more_chlose_hylist,.Search_jobs_more_chlose_list").hide();
        $(this).closest(".Search_jobs_more_chlose").find(".inputre").attr("data-name",htmlcon);
        $(this).closest(".Search_jobs_more_chlose").find(".inputre").val(value);
    })
    //������������
    $(".baocundao").click(function () {
        var keyword=$("#keyword").val();
        var jobname=$("#jobname").val();
        var comname=$("#comname").val();
        var qwhy=$("#qwhy").val();
        var qwznlb=$("#qwznlb").val();
        var qwaddress=$("#qwaddress").val();
        var qwcity=$("#qwcity").val();
        var salary_low=parseInt($("#salary_low").val());
        var salary_up=parseInt($("#salary_up").val());
        var edu=$("#edu").val();
        var exp_year=$("#exp_year").val();
        var age_low=parseInt($("#age_low").val());
        var age_up=parseInt($("#age_up").val());
        var sex=$("#sex").val();
        var qzzt=$("#qzzt").val();
        if(salary_low!=null && salary_up!=null && salary_low>salary_up){
            $("#salary_low").closest(".hangtt").find(".tips").html("��������ȷ����н��Χ");
            $("#salary_low").css("border","1px solid #ff7070");
            return false;
        }
        if(age_low!=null && age_up!=null && age_low>age_up){
            $("#age_low").closest(".hangtt").find(".tips").html("��������ȷ�����䷶Χ");
            $("#age_low").css("border","1px solid #ff7070");
            return false;
        }
        if(keyword==""&&jobname==""&&comname==""&&qwhy==""&&qwznlb==""&&qwaddress==""&&qwcity==""&&salary_low==""&&salary_up==""&&edu==""&&exp_year==""&&age_low==""&&age_up==""&&sex==""&&qzzt==""){
            layer.msg("��������Ϊ��",2,8);
            return;
        }
        $.layer({
            type : 1,
            title :'�½�������',
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : ['500px','215px'],
            page : {dom :"#infobox2"}
        });
        $("#mingming").val("");
    })

    $(".Search_jobs_more_chlose").focus(function () {
        $(".Search_jobs_more_chlose").css("border","1px solid #ddd");
        $(".tips").html("");
    })



    //����������ť
    $("#mmbtn").click(function () {
        var listsnum=$(".listtj li").length;
        var listsnum1=$(".tjitem").length;
        if((listsnum && listsnum>=5) || (listsnum1 && listsnum1>=4)){
            layer.msg("���ܴ�������4�������������",2,8);
            return false;
        }
        var i=0;
        var keyword=$("#keyword").val();
        var jobname=$("#jobname").val();
        var comname=$("#comname").val();
        var qwhy=$("#qwhy").val();
        var qwznlb=$("#qwznlb").val();
        var qwaddress=$("#qwaddress").val();
        var qwcity=$("#qwcity").val();
        var salary_low=$("#salary_low").val();
        var salary_up=$("#salary_up").val();
        var edu=$("#edu").val();
        var exp_year=$("#exp_year").val();
        var age_low=parseInt($("#age_low").val());
        var age_up=parseInt($("#age_up").val());
        var sex=$("#sex").val();
        var qzzt=$("#qzzt").val();
        var job_post=$("#job_post").val();


        var qwhy_n=$("#qwhy").attr("data-name");
        var qwznlb_n=$("#qwznlb").attr("data-name");
        var qwaddress_n=$("#qwaddress").attr("data-name");
        var qwcity_n=$("#qwcity").attr("data-name");
        var salary_low_n=$("#salary_low").attr("data-name");
        var salary_up_n=$("#salary_up").attr("data-name");
        var edu_n=$("#edu").attr("data-name");
        var exp_year_n=$("#exp_year").attr("data-name");
        var age_low_n=parseInt($("#age_low").attr("data-name"));
        var age_up_n=parseInt($("#age_up").attr("data-name"));
        var sex_n=$("#sex").attr("data-name");
        var qzzt_n=$("#qzzt").attr("data-name");
        var job_post_n=$("#job_post").attr("data-name");

        var mingming=$("#mingming").val();
        var html="";

        if(mingming==""){
            layer.msg("��Ϊ������������",2,8);
            return;
        }else if(keyword==""&&jobname==""&&comname==""&&qwhy==""&&qwznlb==""&&qwaddress==""&&qwcity==""&&salary_low==""&&salary_up==""&&edu==""&&exp_year==""&&age_low==""&&age_up==""&&sex==""&&qzzt==""){
            layer.msg("��������Ϊ��",2,8);
            return;
        }else{
            layer.closeAll();
            layer.msg("�������������ɹ�",2,9);
            if(keyword){
                html+=keyword+" | ";
            }
            if(jobname){
                html+=jobname+" | ";
            }
            if(comname){
                html+=comname+" | ";
            }
            if(qwhy){
                html+=qwhy_n+"��ҵ | ";
            }
            if(qwznlb){
                html+=qwznlb+" | ";
            }
            if(qwaddress){
                html+=qwaddress_n+" | ";
            }
            if(qwcity){
                html+=qwcity_n+" | ";
            }
            if(salary_low && salary_up){
                html+=salary_low+"-"+salary_up+"�� | ";
            }
            if(salary_low && salary_up==""){
                html+=salary_low+"������ | ";
            }
            if(salary_low=="" && salary_up){
                html+=salary_up+"������ | ";
            }
            if(edu){
                html+=edu_n+" | ";
            }
            if(edu==""){
                html+="ѧ������ | ";
            }
            if(exp_year){
                html+=exp_year_n+"�깤������ | ";
            }
            if(exp_year==""){
                html+="���鲻�� | ";
            }
            if(age_low && age_up){
                html+=age_low+"-"+age_up+"�� | ";
            }
            if(age_low && age_up==""){
                html+=age_low_n+"������ | ";
            }
            if(age_low=="" && age_up){
                html+=age_up+"������ | ";
            }
            if(age_low=="" && age_up==""){
                html+="���䲻�� | ";
            }
            if(sex){
                html+=sex+" | ";
            }
            if(sex=="" && qzzt){
                html+="�Ա��� | ";
            }
            if(qzzt){
                html+=qzzt_n;
            }
            if(sex=="" && qzzt==""){
                html+="�Ա���";
            }




            $.ajax({
                type:"post",
                url:"/member/index.php?c=resume&act=addsearch",
                data:{
                    keyword:keyword,
                    jobname:jobname,
                    comname:comname,
                    hy:qwhy,
                    jobs_id:job_post,
                    hope_city:qwaddress,
                    location:qwcity,
                    sex:sex,
                    minage:age_low,
                    maxage:age_up,
                    exp:exp_year,
                    maxsalary:salary_up,
                    minsalary:salary_low,
                    name:mingming,
                    status:qzzt

                },
                success:function (data) {
                    if(data==1){
                        $(".nomsg").remove();
                        $("#tjitemlist").append('<div class="tjitem">\n' +
                            '  <div class="closebtn">\n' +
                            '   <img src="{yun:}$style{/yun}/images/closeb.png" class="block">\n' +
                            '     <img src="{yun:}$style{/yun}/images/closeb1.png" class="none">\n' +
                            '    </div>\n' +
                            '    <div class="tjname">'+mingming+'</div>\n' +
                            '    <div class="item">' +html+
                            '    </div>\n' +
                            '   </div>');
                    }
                }
            });

        }
    })

    //ɾ��������
    $("body").on("click",".closebtn",function () {
        var _this = $(this);
        var id = $(this).attr("data-id");
        layer.confirm("ȷ��Ҫɾ������������",function(){
            $.ajax({
                type:"post",
                url:"/member/index.php?c=resume&act=delsearch",
                data:{
                    id:id
                },
                success:function (data) {
                    if(data==1){
                        _this.closest(".tjitem").remove();
                        layer.closeAll();
                    }
                }
            })


        });
    })



    $("#tjitemlist .tjname").click(function () {
        var data = [];
        data['searcher_id'] = $(this).attr("data-id");
        standardPost("/member/index.php?c=resume",data);
    })






    // $(".soubtn").click(function () {
    //     var type=$(this).data("type");
    //     if(type==="condition"){
    //         location="/member/index.php?c=resume&act=searchlist&type=1";
    //     }else{
    //         location="/member/index.php?c=resume&act=searchlist&type=2";
    //     }
    // })

})


$(function () {


    $(".browsebj").click(function(){
        var browse=$(this).attr('browse');
        var id=$(this).attr('name');
        $.post("index.php?c=hr&act=hrset",{id:id,browse:browse},function(data){
            location.reload();
        });
    });
    $("body").on("click",".scstyle",function () {
        var _this = $(this);
        $.ajax({
            type:"post",
            url:"/member/index.php?c=resume&act=collect",
            data:{
                resume_id:$(this).attr("data-id"),
                eid:$(this).attr("data-eid")
            },
            success:function (data) {
                var data = JSON.parse(data);
                if(data==1){
                    layer.msg('�ղسɹ���', 2, 9);
                    _this.removeClass("scstyle").unbind();
                    _this.addClass("yscstyle");
                    _this.html("ȡ���ղ�");
                }
            }
        })
    })

    $("body").on("click",".yscstyle",function () {
        var _this = $(this);
        var job_id = $(this).attr("data-id");
        layer.confirm("��ȷ��Ҫȡ���ղ���",function() {
            $.post("/member/index.php?c=resume&act=remove_collect",{id:job_id},function(data){
                if(data==1){
                    layer.msg('ȡ���ղسɹ���', 2, 9);
                    _this.html(' <img src="{yun:}$lt_style{/yun}/images/shoucang1.png" class="ico_dd"><label class="biaoqian">�ղ�</label>');
                    _this.removeClass("yscstyle").addClass("scstyle");
                }
            })
        });
    })
})


function standardPost (url,args)
{
    var form = $("<form method='post'></form>");
    form.attr({"action":url});
    for (arg in args)
    {
        var input = $("<input type='hidden'>");
        input.attr({"name":arg});
        input.val(args[arg]);
        form.append(input);
    }
    $("html").append(form);
    form.submit();
}

$(function () {
    $(".zkbtn").click(function () {
        $(".search_more").show(500);
        $(this).hide(100);
    });
    $(".shouqibtn").click(function () {
        $(".search_more").hide(500);
        $(".zkbtn").show(100);
    })

    $(".btnsss").click(function () {
        var jobname=$("#jobname").val();
        var comname=$("#comname").val();
        var salery_low=parseInt($("#salery_low").val());
        var salery_up=parseInt($("#salery_up").val());
        var age_low=parseInt($("#age_low").val());
        var age_up=parseInt($("#age_up").val());

        var type=$(this).data("type");
        if(type==1){
            if(jobname==""){
                $("#jobname").closest(".cccsss").find(".tipser").html("������ְλ���ƣ�");
                return;
            }else{
                // alert("��������")
            }
        }
        if(type==2){
            if(comname==""){
                $("#comname").closest(".cccsss").find(".tipser").html("�����빫˾���ƣ�");
                return;
            }else{
                // alert("��������")
            }
        }
        if(type==3){
            if(salery_low==null && salery_up==null){
                $("#salery_low").closest(".cccsss").find(".tipser").html("��������н��Χ��");
                return;
            }
            if(salery_low!=""&& salery_up!="" && salery_low>salery_up){
                $("#salery_low").closest(".cccsss").find(".tipser").html("��������ȷ����н��Χ��");
                return;
            } else{
                // alert("��������")
            }
        }
        if(type==4){
            if(age_low==null && age_up==null){
                $("#age_low").closest(".cccsss").find(".tipser").html("���������䷶Χ��");
                return;
            }
            if(age_low!=""&& age_up!="" && age_low>age_up){
                $("#age_low").closest(".cccsss").find(".tipser").html("��������ȷ�����䷶Χ��");
                return;
            } else {
                // alert("��������")
            }

        }

    })

    $(".Search_jobs_more_chlose").blur(function () {
        $(".tipser").html("");
    })
})