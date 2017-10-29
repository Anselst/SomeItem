<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    private $post;
    private $user;
    private $nav;
    
    public function __construct()
    {
        parent::__construct();
        $this->post = D('Post');  //实例化PostModel
        $this->user = A('User');  //实例化UserController
        $this->nav = D('Nav');  //实例化NavModel
    }
    
    public function index(){
        $this->user->check_login();
        if (IS_POST) {
            $this->search(I('post.search'));
            exit;
        }
        $count = $this->post->count(); 
        $Page = new \Think\Page($count,8);
        $Page->setConfig('theme','<div class="right">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%</div> <div class="left">共%TOTAL_ROW%条记录 第%NOW_PAGE%/%TOTAL_PAGE%页</div>');
        $show = $Page->show();
        $res = $this->post->limit($Page->firstRow.",".$Page->listRows)->select();

        $this->assign('res',$res);
        $this->assign('page',$show);
        $this->display();
    }

    public function search($search){
        $map['title'] = array(array('like',"%$search%"),);
        $res = $this->post->where($map)->select();
        $this->assign('res',$res);
        $this->display();
        return;
    }
    
    public function Nav()
    {
        $this->user->check_login();
        $count = $this->nav->count();
        $Page = new \Think\Page($count,6);
        $Page->setConfig('theme','<div class="right">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%</div> <div class="left">共%TOTAL_ROW%条记录 第%NOW_PAGE%/%TOTAL_PAGE%页</div>');
        $show = $Page->show();
        $res = $this->nav->limit($Page->firstRow.",".$Page->listRows)->select();
        $this->assign('Nav', 'show');
        $this->assign('page', $show);
        $this->assign('num', 6);
        $this->assign('res', $res);
        $this->display('Nav');
    }
    
    public function addNav()
    {
        $this->user->check_login();
        if (IS_POST){
            $data = $this->nav->create();
            if ($data) {
                $this->nav->date = date('Y-m-d H:i:s');
                $this->nav->sort = $this->getNextId();
                if ($this->nav->add()) {
                    $this->success('栏目已添加',U('Index/Nav'));
                } else {
                    $this->error($this->nav->getError());
                }
            } else {
                $this->error($this->nav->getError());
            }
            return;
        }
        $this->assign('title', '添加新的栏目');
        $this->assign('Nav', 'add');
        $this->display('Nav');
    }
    
    public function updateNav() {
        if ($id = I('get.id')) {
            //修改栏目
            if (IS_POST) {
                if ($this->nav->create()) {
                    if ($this->nav->where("id=$id")->save()) {
                        $this->success('栏目已修改',U('Index/Nav'));
                    } else {
                        $this->error($this->nav->getError());
                    }
                } else {
                    $this->error($this->nav->getError());
                }
                exit;
            }
            //获取需要修改的文章
            $res = $this->nav->find($id);
            $this->assign('res',$res);
            $this->assign('Nav', 'update');
            $this->assign('title', '修改栏目');
            $this->display('Nav');
            exit;
        }
    }
    
    private function getNextId()
    {
        $_sql = "SHOW TABLE STATUS LIKE 'mb_nav'";
        return $this->nav->query($_sql)[0]['auto_increment'];
    }
    
    public function Cont()
    {
        $this->user->check_login();
        if (IS_POST) {
            $this->search(I('post.search'));
            exit;
        }
        $count = $this->post->count();
        $Page = new \Think\Page($count,8);
        $Page->setConfig('theme','<div class="right">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%</div> <div class="left">共%TOTAL_ROW%条记录 第%NOW_PAGE%/%TOTAL_PAGE%页</div>');
        $show = $Page->show();
        $res = $this->post->limit($Page->firstRow.",".$Page->listRows)->select();
        
        $this->assign('res',$res);
        $this->assign('page',$show);
        $this->assign('Cont', 'show');
        $this->display('Content');
    }

    public function addCont(){
        $this->user->check_login();
        //添加文章
        if (IS_POST) {
            if ($this->post->create()) {
                if ($this->post->add()) {
                    $this->success('文章已添加',U('Index/index'));
                } else {
                    $this->error($this->post->getError());
                }
            } else {
                $this->error($this->post->getError());
            }
            return;
        }
        $this->assign('title', '添加新的文章');
        $this->assign('Cont', 'add');
        $this->display('Content');
    }
    
    public function updateCont() {
        if ($id = I('get.id')) {
            //修改文章
            if (IS_POST) {
                if ($this->post->create()) {
                    if ($this->post->where("id=$id")->save()) {
                        $this->success('文章已修改',U('Index/index'));
                    } else {
                        $this->error($this->post->getError());
                    }
                } else {
                    $this->error($this->post->getError());
                }
                exit;
            }
            //获取需要修改的文章
            $res = $this->post->find($id);
            $this->assign('res',$res);
            $this->assign('title', '修改你的文章');
            $this->display('Content');
            exit;
        }
    }

    public function del(){
        if(I('get.label')=='nav') {
            if ($this->nav->delete(I('get.id'))) {
                $this->success('删除栏目成功');
            } else {
                $this->error('删除栏目失败');
            }            
        } elseif (I('get.label')=='cont') {
            if ($this->post->delete(I('get.id'))) {
                $this->success('删除文章成功');
            } else {
                $this->error('删除文章失败');
            }
        }
    }

}