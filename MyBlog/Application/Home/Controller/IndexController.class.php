<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    private $post;
    private $nav;
    
    public function __construct()
    {
        parent::__construct();
        $this->post = D('Post');
        $this->nav = D('Nav');
    }
    
    //博客首页,展示文章标题作者和缩略内容
    public function index(){
        $this->show_nav();
        //分页
        $count = $this->post->count();
        $Page = new \Think\Page($count,8);
        $show = $Page->show();
        $res = $this->post->order('date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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

    // 日历ajax
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

    //处理从数据库中取出的文章内容
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

    

    public function test() {

    }

    public function test_ajax(){
        $user = D('User');
        $un = I('post.un');
        echo $un;
        // $this->ajaxReturn($un);
    }

    // 博客展示页,点击标题自动跳转
    public function single(){
        if (IS_GET) {
            $id = I('get.title');
        }
        //从数据库取出文章内容
        $res = $this->post->find($id);
        $map['id'] = $id;
        $this->post->where($map)->setInc('hot_num',1);
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
        $this->other($this->post,$id);

        $this->display();
    }

    // 实现博客展示页的上下篇功能
    public function other($post,$id) {
        $_prev = $post->where("id<$id")->order('id desc')->find();
        $_next = $post->where("id>$id")->order('id asc')->find();
        $this->assign('prev',$_prev);
        $this->assign('next',$_next);
    }
    

    public function about(){
        $this->display();
    }

}