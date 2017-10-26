<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
    protected $_validate = array(
        array('username','2,10','用户名长度需2-10位汉字或字符!',0,'length'),
        array('username','','用户名已存在',0,'unique',1),
        array('psw','6,18','密码需6-18位字符!',0,'length'),
        array('psw','/^[\w-\.+\/]+$/','密码不能包含特殊字符!',0,'regex'),
        array('notpsw','psw','密码与确认密码不一致!',0,'confirm',1),
        array('email','email','邮箱格式错误!',2),
        array('phone','/^\d{11}/','手机号码格式错误!',2,'regex'),
        // array('face','')
    );
    protected $_auto = array(
        array('psw','sha1',3,'function'),
        // array('login_id','_sha1',1,'callback'),
    );

    public function _sha1($username) {
        return sha1(md5($username));
    }

}



?>