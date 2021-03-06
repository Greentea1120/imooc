/*
* 添加按钮操作
* */
$("#button-add").click(function () {
    var url = SCOPE.add_url;
    window.location.href=url;
})

$("#singcms-button-submit").click(function () {
    var data = $("#singcms-form").serializeArray();
    // console.log(data);
    var postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });
    // console.log(postData);
    //将获取到的数据post给服务器
    url = SCOPE.save_url;
    $.post(url,postData,function(result){
        if(result.status == 1){
            //success
            dialog.success(result.message,SCOPE.jump_url);
        }else if(result.status == 0){
            //error
            dialog.error(result.message);

        }
    },"JSON");
});

/*修改*/
$('.singcms-table #singcms-edit').on('click',function () {
   var id = $(this).attr('attr-id');
   var url = SCOPE.edit_url + '/id/' + id;
   window.location.href = url;
});

/*删除*/
$('.singcms-table #singcms-delete').on('click',function () {
    var id =$(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.set_status_url;

    var data = {};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type:0,
        title:'是否提交?',
        btn:['yes','no'],
        icon:3,
        closeBtn:2,
        content:"是否确定"+message,
        scrollbar:true,
        yes:function(){
          //执行相关跳转
            todelete(url,data);
        },
    });
});
function todelete(url,data){
    $.post(
        url,
        data,
        function (s) {
            if(s.status ==1){
                return dialog.success(s.message,'');
                //跳转到相关页面
            }else{
                return dialog.error(s.message);
            }
        }
    ,"JSON");
}

/*
* 排序
*/
$('#button-listorder').click(function () {
    //获取listorder内容
    var data = $("#singcms-listorder").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    // console.log(postData);
    var url = SCOPE.listorder_url;
    $.post(url,postData,function (result) {
        if(result.status ==1){
            //成功
            return dialog.success(result.message,result['data']['jump_url']);
        }else if(result.status == 0){
            //失败
            return dialog.error(result.message,result['data']['jump_url']);
        }
    },"JSON");
});
