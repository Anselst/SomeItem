<?php 
namespace Admin\Model;
use Think\Model;

class PostModel extends Model{
    //自动验证字段
    protected $_validate = array(
        //验证标题字段,必须填写,范围长度
        array('title','require','请填写标题'),
        array('title','2,25','标题长度为2-25个汉字或字符',0,'length'),
        // array('author','require','请填写作者'),
        array('author','2,10','作者长度为2-10个汉字或字符',2,'length'), 
        array('con_from','1,10','来源长度为1-10个汉字或字符',2,'length'),       
        array('content','require','请填写内容'),
        array('search','require','请填写标题'),
        array('search','2,25','标题长度为2-25个汉字或字符',0,'length'),
        
    );

    //自动添加时间
    protected $_auto = array(
        array('date',date,3,'function',array('Y-m-d H:i:s')),        
    );
}