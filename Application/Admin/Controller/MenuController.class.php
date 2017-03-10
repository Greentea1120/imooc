<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class MenuController extends Controller {
    public function index(){
        /*
         * 分页操作逻辑
         * */


        $this->display();
    }
    public function add(){
        if($_POST){
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0,'菜单名不能为空');
            }
            if(!isset($_POST['m'] ) || !$_POST['m']){
                return show(0,'模块名不能为空');
            }
            if(!isset($_POST['c'] ) || !$_POST['c']){
                return show(0,'控制器不能为空');
            }
            if(!isset($_POST['f'] ) || !$_POST['f']){
                return show(0,'方法名不能为空');
            }
            $menuId = D("Menu")->insert($_POST);
            if ($menuId){
                return show(1,"新增成功",$menuId);
            }
            return show(0,"新增失败",$menuId);
        }else{
            $this->display();
        }
    }
}