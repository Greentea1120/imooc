<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9 0009
 * Time: 11:49
 */
namespace Common\Model;
use Think\Model;

class AdminModel extends Model{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('admin');
    }

    public function getAdminByUsername($username){
        $ret = $this->_db->where('username="'.$username.'"')->find();
        return $ret;
    }
}