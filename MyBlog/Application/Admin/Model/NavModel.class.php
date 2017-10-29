<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
    protected $_validate = array(
        array('nav_name','2,40','栏目名称长度需2-40位汉字或字符!',0,'length'),
        array('nav_name','','栏目名称已存在',0,'unique',1),
        array('nav_info','200','栏目描述不能超过200个字符！',0,'length'),
        // array('face','')
    );
    
    public function _sha1($username) {
        return sha1(md5($username));
    }

}



?>