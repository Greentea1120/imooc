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