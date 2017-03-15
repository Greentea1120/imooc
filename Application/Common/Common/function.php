<?php

/*
 * 公用的方法
 * */

function show($status,$message,$data=array()){
    $result = array(
        'status' => $status,
        'message'=> $message,
        'data' => $data,
    );

    exit(json_encode($result));
}

function getMd5Password($password){
    return md5($password.C('MD5_PRE'));
}
function getMenuType($type){

    if($type == 1){
        $str = "后台菜单";
    }elseif($type == 0){
        $str = "前端导航";
    }
    return $str;
}
function status($status){
    if($status == 0){
        $str = '关闭';
    }elseif($status == 1){
        $str = '正常';
    }elseif($status == -1){
        $str = '删除';
    }
    return $str;
}
function getAdminMenuUrl($nav){
    $url = '/admin/'.$nav['c'].'/'.$nav['a'];
    return $url;
}
function getActive($navc){
    $c = strtolower(CONTROLLER_NAME);
    if (strtolower($navc == $c)){
        return 'class="active"';
    }
    return '';
}
function showKind($status,$data){
    header('Content-type:application/json;charset=UTF-8');
    if ($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }else{
        exit(json_encode(array('error'=>1,'url'=>$data)));
    }
}