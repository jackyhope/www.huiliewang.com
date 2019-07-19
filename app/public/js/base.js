//ajax请求封装
function Post(url,data){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url,
            data,
            type:'post',
            success(res){
                if(typeof res == 'string'){
                    res = JSON.parse(res);
                }
                if(res.code==200){
                    resolve(res);
                }else{
                    reject(res);
                }
            }
        })
    })
}
function Get(url,data){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url,
            data,
            type:'get',
            success(res){
                if(typeof res == 'string'){
                    res = JSON.parse(res)
                }
                if(res.code==200){
                    resolve(res);
                }else{
                    reject(res);
                }
            }
        })
    })
}
//表单验证
function formVerify(){//这个验证只有提示作用，不拦截请求
    $('input.verify').blur(ev=>{
        let reg = new RegExp($(ev.target).attr('rule'))
        if(!$(ev.target).val()||!$(ev.target).val().match(reg)){
            //提示持有class名form_notice
            if($(ev.target).next('.form_notice').length==0){
                $(ev.target).after(`<span class='form_notice'>${$(ev.target).attr('notice')}</span>`)
            }
        }else{
            $(ev.target).next('.form_notice').remove();
        }
    })
}
//加载完成执行一次
$(formVerify)