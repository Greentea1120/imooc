<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        echo C('URL_MODEL'),'<br/>';
//        echo U('Index/index','html');
        $this->display();

    }
    public function user(){
        echo C('URL_MODEL'),'<br/>';
        echo U('Index/index','html');
    }
}