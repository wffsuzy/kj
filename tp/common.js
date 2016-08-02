/**
 * Created by Curry30 on 2016/8/2.
 */
$(function () {
    function show_result(msg,icon,url) {
        layer.msg(msg,{icon:icon},function () {
                if(url){
                    location.href=url;
                }
        })
    }


    //td删除,禁用

    function tdAction($ele,$url) {
        $($ele).click(function () {
            var id = $(this).attr('data');
            $.post(url,{id:id},function (data) {
                dataAction(data);
            })
        })
    }
    
    
    function dataAction(data) {
        if(data.status){
            show_result(data.msg,1,data.info);
        }else{
            show_result(data.msg);
            return false;
        }
    }
})