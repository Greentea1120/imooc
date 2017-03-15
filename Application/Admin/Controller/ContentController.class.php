<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15 0015
 * Time: 10:32
 */
namespace Admin\Controller;
use Think\Controller;
/*
 * 文章管理
 * */
class ContentController extends CommonController  {
    public function index(){
        $this->display();
    }
}