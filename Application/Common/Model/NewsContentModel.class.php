<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16 0016
 * Time: 11:55
 */
namespace Common\Model;
use Think\Model;
class NewsContentModel extends Model{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('news_content');
    }

    public function insert($data = array()){
        if (!is_array($data) || !$data){
            return 0;
        }
        $data['create_time'] = time();
        if (isset($data['content']) && $data['content']){
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }

    public function find($id){
        return $this->_db->where('news_id='.$id)->find();
    }
}