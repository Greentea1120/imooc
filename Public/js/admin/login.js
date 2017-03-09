/**
 * Created by Administrator on 2017/3/8 0008.
 */
/*
* 前端业务类
* @author greentea
*/

var login = {
    check : function () {
        //获取登录页面中的用户名 密码
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();

        if(!username){
            dialog.error('用户名不能为空!');
        }

        if(!password){
            dialog.error('密码不能为空!');
            // console.log(1);
        }

        var url = "/admin/login/check";
        var data = {'username':username,'password':password};
        //执行异步请求
        $.post(url,data,function(result){
            if(result.status == 0){
                dialog.error(result.message);
            }else if(result.status == 1){
                dialog.success(result.message,'/admin/index');
            }
        },'JSON');
    }
}