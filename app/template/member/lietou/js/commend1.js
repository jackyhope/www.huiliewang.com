$(function () {

    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    }

//推荐候选人
    $("body").on("click",".tuijan",function () {
        var _this = $(this);
        $(".tuijianbtn").attr("id","tj_"+$(this).attr("data-id"));
        $("#tuijianbox #resume_id").val(_this.attr("data-id"));
        $("#tuijianbox #eid").val(GetQueryString('eid'));
        $("#tuijianbox #job_id").val(_this.attr("data-jid"));
        $("#tuijianbox #tjcontent").val("");

        $.layer({
            type : 1,
            title :'推荐候选人',
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : ['500px','300px'],
            page : {dom :"#tuijianbox"}
        });
    })

    $(".tuijianbtn").on("click",function () {
        var resume_id=$("#tuijianbox #resume_id").val();
        var eid=$("#tuijianbox #eid").val();
        var job_id=$("#tuijianbox #job_id").val();
        var tjcontent=$("#tjcontent").val();
        var tj_id = parseInt($("#tuijianbox #job_id").val());
        $.ajax({
            type:"post",
            url:"/member/index.php?c=recommend&act=report",
            data:{
                resume_id:resume_id,
                eid:eid,
                job_id:job_id,
                remark:tjcontent
            },
            success:function (data) {
                var data =JSON.parse(data);
                if(data==1){
                    //推荐成功后的效果
                    layer.closeAll();
                    layer.msg('推荐成功！', 2, 9);
                    $("#t_tj_"+tj_id).removeClass("tuijan");
                    $("#t_tj_"+tj_id).addClass("yituijian");
                    $("#t_tj_"+tj_id).html("已推荐");
                }
            }
        })
    })

    $("#tjcontent").on("input propertychange",function () {
        var tjcontent=$("#tjcontent").val();
        var num=100-tjcontent.length;
        if(num<0){
            num=0;
        }
        $(".xznum").html(num);
    })

})