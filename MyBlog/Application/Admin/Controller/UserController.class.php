<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    
    public function index() {
        $this->check_login();
    }
    /**
     * 检测用户登录状态的函数
     *
     * @return void 查询到用户则传递用户信息,否则报错
     */
    public function check_login(){
        if(session('?login')){
            $user = M('User');
            $map['login_id'] = session('login');
            if($re=$user->where($map)->find()){
                $this->assign('login',$re);
            } else {
                $this->redirect('User/login', null, 2, '登录信息有误！请重新登录');
            }
        } else {
            echo 1;
//             $this->login();
//             exit;
            $this->redirect('User/login', null, 0);
        }
    }
    
    /**
     * 显示注册页面
     *
     * @return void
     */
    public function reg(){
        $this->display();
    }
    
    public function face() {
        $this->display();
    }
    public function ajax_vali_reg(){
        $user = D('User');
        $username = I('post.un');
        $map['username'] = $username;
        $res = $user->where($map)->find();
//         if(!empty($res)){
//             $d = '<font color="red">该用户名已存在</font>';
//             $this->ajaxReturn($d);
//         } else {
            $d = '<font color="green">该用户名可用</font>';
            $this->ajaxReturn($d);
//         }
    }
    
    /**
     * 注册表单验证
     *
     * @return void
     */
    public function reg_vali() {
        $user = D('User');
    
        //验证码验证
        if($this->check_yzm(I('post.yzm'),1)){
            // 创建数据
            if($data = $user->create()){
                $data['login_id'] = $user->_sha1($data['username']);
                //插入头像地址
                if(empty($_FILES['up_face']['error'])){  //如果用户没有选择头像
                    $data['face'] = $this->uploadImage($_FILES['up_face']);
                } else {
                    //插入默认头像地址
                    $data['face'] = I('post.face');
                    $data['face'] = str_replace('http://127.0.0.1/MyBlog/Application/Home/Public/','',$data['face']);
                }
                // 写入数据库
                if($user->add($data)){
                    $this->success('注册成功!',U('login'));
                    exit;
                } else {
                    $this->error('注册失败!');
                }
            }
            else {
                $this->error('注册失败!'.$user->getError());
            }
        } else {
            $this->error('验证码错误!');
        }
    }
    
    /**
     * 图片的上传与处理
     *
     * @param [type] $_file
     * @return void
     */
    private function uploadImage($_file)
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 204800 ;// 设置附件上传大小 2M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Application/Home/Public/'; // 设置附件上传根目录
        $upload->savePath = 'Uploads'; // 设置附件上传子目录
        // 上传单个文件
        $info = $upload->uploadOne($_file);
        $thumbpath = preg_replace('/Uploads/','Thumbs',$info['savepath']);
        if(!file_exists($upload->rootPath.$thumbpath)) mkdir($upload->rootPath.$thumbpath);
        $imgpath = __PUBLIC__.$info['savepath'].$info['savename'];
        $image = new \Think\Image();
        $image->open($upload->rootPath.$info['savepath'].$info['savename']);
        $image->thumb(50,50,6)->save($upload->rootPath.$thumbpath.$info['savename']);
        //添加水印
        // $image->thumb(150, 150, 3)->text('WGDZR',TEST.'font/Diegolo.TTF',20,'#000000',9)->save($upload->rootPath.$info['savepath'].$info['savename']);
        if($info) {
            return $info['savepath'].$info['savename'];
        }else{
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }
    }
    
    /**
     * 显示登录页面
     *
     * @return void
     */
    public function login(){
    
        $this->display();
    }
    
    /**
     * 登录表单验证
     *
     * @return void
     */
    public function login_vali() {
        $user = D('User');
        //验证用户名
        if($this->check_yzm(I('post.yzm'))){
            $map['username'] = I('post.username');
            if($user->where($map)->find()) {
                //验证密码
                $map['psw'] = sha1(I('post.psw'));
                if($login=$user->where($map)->find()) {
                    session('login',$login['login_id']);
                    $this->success('登陆成功!',U("Index/index"));
                } else {
                    $this->error('密码错误');
                }
            } else {
                $this->error('用户名错误');
            }
        } else {
            $this->error('验证码错误');
        }
    }
    
    /**
     * 创建验证码
     *
     * @return void
     */
    public function yzm(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length = 4;
        // $Verify->seKey = 'ThinkphpCode';
        $Verify->useCurve = false;
        $Verify->useNoise = false;
        $Verify->useImgBg = true;
        $Verify->fontttf = '4.ttf';
        $Verify->imageH = 48;
        $Verify->imageW = 170;
        $Verify->entry();
    }
    
    public function logout() {
        session('login',null);
        $this->success('你已退出登录',U('Index/index'));
    }
    
    /**
     * 检测验证码
     *
     * @param [type] $code
     * @return void
     */
    public function check_yzm($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }
}