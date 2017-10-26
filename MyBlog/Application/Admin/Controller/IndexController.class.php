<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $post = D('Post');
        if (IS_POST) {
            $this->search(I('post.search'));
            exit;
        }

        $count = $post->count(); 
        $Page = new \Think\Page($count,8);
        $Page->setConfig('theme','<div class="right">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%</div> <div class="left">共%TOTAL_ROW%条记录 第%NOW_PAGE%/%TOTAL_PAGE%页</div>');
        $show = $Page->show();
        $res = $post->limit($Page->firstRow.",".$Page->listRows)->select();

        $this->assign('res',$res);
        $this->assign('page',$show);
        $this->display();
    }

    public function search($search){
        $post = D('Post');
        $map['title'] = array(array('like',"%$search%"),);
        $res = $post->where($map)->select();
        $this->assign('res',$res);
        $this->display();
        return;
    }

    public function add(){
        $post = D('Post');
        if ($id = I('get.id')) {
            $this->_save($post,$id);
        }
        //添加文章
        if (IS_POST) {
            if ($post->create()) {
                if ($post->add()) {
                    $this->success('文章已添加',U('Index/index'));
                } else {
                    $this->error($post->getError());
                }
            } else {
                $this->error($post->getError());
            }
            return;
        }
        $this->display();
    }
    /**
     * 修改文章函数
     *
     * @param [resources] $post
     * @param [int] $id
     * @return void
     */
    public function _save($post,$id) {
        //修改文章
        if (IS_POST) {
            if ($post->create()) {
                if ($post->where("id=$id")->save()) {
                    $this->success('文章已修改',U('Index/index'));
                } else {
                    $this->error($post->getError());
                }
            } else {
                $this->error($post->getError());
            }
            exit;
        }
        //获取需要修改的文章
        $res = $post->find($id);
        $this->assign('res',$res);
        $this->display();
        exit;
    }

    public function del(){
        $post = D('Post');
        if ($post->delete(I('get.id'))) {
            $this->success('删除文章成功');
        } else {
            $this->error('删除文章失败');
        }
    }

}