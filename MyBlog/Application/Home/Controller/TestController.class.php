<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {

    public function index()
    {
        $test = D('Nav');
        $res = $test->select();
        $this->assign('res', $res);
        $this->display();
    }
    
    public function test()
    {
        if (isset($_POST['send'])) {
            $upload = new \Think\Upload();// 实例化上传类 
            $upload->maxSize = 204800 ;// 设置附件上传大小 2M
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->mimes = array('php');
            $upload->rootPath = './Application/Home/Public/'; // 设置附件上传根目录 
            $upload->savePath = 'Uploads'; // 设置附件上传子目录
            // 上传单个文件
            $info = $upload->uploadOne($_FILES['test']);
            $thumbpath = preg_replace('/Uploads/','Thumb',$info['savepath']);
            if(!file_exists($upload->rootPath.$thumbpath)) mkdir($upload->rootPath.$thumbpath);
            $imgpath = __PUBLIC__.$info['savepath'].$info['savename'];
            $image = new \Think\Image();
            $image->open($upload->rootPath.$info['savepath'].$info['savename']);
            $image->thumb(50,50,6)->save($upload->rootPath.$thumbpath.$info['savename']);
            // echo $thumbpath;
            $this->assign('imgurl', $imgpath);
            $this->display('index');
        }
    }


}