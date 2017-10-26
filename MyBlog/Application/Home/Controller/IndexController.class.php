<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * 博客首页,展示文章标题作者和缩略内容
     *
     * @return void
     */
    public function index(){
        $post = D('Post');
        //如果用户登录了,用session传递
        $this->check_login();
        //分页
        $count = $post->count();
        $Page = new \Think\Page($count,8);
        $show = $Page->show();
        $res = $post->order('date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //处理文章内容
        $res = $this->cont_rep($res);
        //实例化日历类
        $calendar = new \Org\Util\Calendar();
        $curMonth = $calendar->get_month();
        $calen = $calendar->get_calen();
        $days = $calendar->get_days();
        //传入日历数据
        $this->assign('curMonth',$curMonth);
        $this->assign('calen',$calen);
        $this->assign('days',$days);
        //传入博客内容
        $this->assign('res',$res);
        $this->assign('page',$show);
        $this->display();
    }

    /**
     * 日历ajax
     *
     * @return void
     */
    public function ajax_calen(){
        if(@$_POST['month']||@$_POST['month'] === '0'){
            $calendar = new \Org\Util\Calendar($_POST['month']);
            $calen = $calendar->get_calen();
            $curMonth = $calendar->get_month();
            $days = $calendar->get_days();
            $count = 42;
            $str = '<tr><th colspan="7"><span style="margin:0 50px;">'.$curMonth.'</span></th></tr>';
            $str = $str.'<tr class="weak"><td>周日</td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td><td>周六</td></tr>';
            for ($i=0;$i<6;$i++){
                $str = $str.'<tr>';
                for ($j=0;$j<7;$j++){
                    if ($i==0&&$days['prevD']>0){
                        $str = $str.'<td class="prev">';
                        $str = $str.$calen[$i][$j];
                        $str = $str.'</td>';
                        $days['prevD']--;
                        $count--;
                        continue;
                    } elseif ($count == $days['nextD']){
                        $str = $str.'<td class="next">';
                        $str = $str.$calen[$i][$j];
                        $str = $str.'</td>';
                        // $days['nextD']--;
                        // $count--;
                        continue;
                    }
                    $str = $str.'<td class="current">';
                    $str = $str.$calen[$i][$j];
                    $str = $str.'</td>';
                    $count--;
                }
            $str = $str.'</tr>';
            }
            $this->ajaxReturn($str);
        }
    }

    /**
     * 处理从数据库中取出的文章内容
     *
     * @param [type] $res 数据库的结果集
     * @return string 返回处理后的内容
     */
    public function cont_rep(&$res){
        if(is_array($res[0])){
            for ($i=0;$i<count($res);$i++) {
                $res[$i]['content'] = nl2br($res[$i]['content']);
                $res[$i]['content'] = str_replace('&lt;p&gt;','',$res[$i]['content']);
                $res[$i]['content'] = htmlspecialchars_decode($res[$i]['content']);
                $res[$i]['content'] = str_replace(' ','',$res[$i]['content']);
                $res[$i]['content'] = str_replace('&nbsp;','',$res[$i]['content']);                
                $res[$i]['content'] = str_replace('　','',$res[$i]['content']);
            }
            return $res;
        } elseif (is_string($res['content'])) {
            $res['content'] = nl2br($res['content']);
            $res['content'] = str_replace('&lt;p&gt;','',$res['content']);            
            $res['content'] = htmlspecialchars_decode($res['content']);
            $res['content'] = str_replace(' ','',$res['content']);
            $res['content'] = str_replace('&nbsp;','',$res['content']);
            $res['content'] = str_replace('　','',$res['content']);
            return $res;
        } else {
            $this->error('cont_rep()函数只能处理结果集');
        }
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
                $this->error('身份验证出错,请重新登录!');
            }
        } else {
            $this->redirect('login',null,0);
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

    public function test() {
        $year = date('Y');
        $month = date('m');
        echo cal_days_in_month(CAL_GREGORIAN,$month,$year);        
        echo $num;

    }

    public function test_ajax(){
        $user = D('User');
        $un = I('post.un');
        echo $un;
        // $this->ajaxReturn($un);
    }

    public function ajax_vali_reg(){
        $user = D('User');
        $username = I('post.un');
        $map['username'] = $username;
        $res = $user->where($map)->find();
        if(!empty($res)){
            $d = '<font color="red">该用户名已存在</font>';
            $this->ajaxReturn($d);
        } else {
            $d = '<font color="green">该用户名可用</font>';
            $this->ajaxReturn($d);
        }
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
                if(empty($_FILES['up_face']['error'])){
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
                    $this->success('登陆成功!',U("index"));
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

    /**
     * 博客展示页,点击标题自动跳转
     *
     * @return void
     */
    public function single(){
        $post = D('Post');
        $this->check_login();
        if (IS_GET) {
            $id = I('get.title');
        }
        //从数据库取出文章内容
        $res = $post->find($id);
        $map['id'] = $id;
        $post->where($map)->setInc('hot_num',1);
        // $res['test'] = array('1','2','3');
        //对内容进行修饰
        $res = $this->cont_rep($res);
        $res['content']=explode('<br/>',$res['content']);
        //实例化日历类
        $calendar = new \Org\Util\Calendar();
        $curMonth = $calendar->get_month();
        $calen = $calendar->get_calen();
        $days = $calendar->get_days();
        //传入日历数据
        $this->assign('curMonth',$curMonth);
        $this->assign('calen',$calen);
        $this->assign('days',$days);
        $this->assign('res',$res);

        //上一篇,下一篇
        $this->other($post,$id);

        $this->display();
    }

    /**
     * 实现博客展示页的上下篇功能
     *
     * @param [string] $id 
     * @return void
     */
    public function other($post,$id) {
        $_prev = $post->where("id<$id")->order('id desc')->find();
        $_next = $post->where("id>$id")->order('id asc')->find();
        $this->assign('prev',$_prev);
        $this->assign('next',$_next);
    }
    

    public function about(){
        $this->check_login();
        $this->display();
    }

}