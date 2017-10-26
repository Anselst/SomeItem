<?php 
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {
    public function index() {
        if (isset($_POST['send'])) {
            echo $_POST['id'];
            $user = D('User');
            if(!$user->create($_POST,2)) {
                echo $user->getError();
            } else {
                if($user->save()) {
                    $this->success('修改成功!',U('Index/index'));
                } else {
                    $this->error('用户修改出错!');
                }
            }
            exit;
        }
        //检测登录状态
        $login = new IndexController;
        $login->check_login();
        $this->display();
    }

    public function logout() {
        session('login',null);
        $this->success('你已退出登录',U('Index/index'));
    }

    /**
     * 评论检测与存入数据库
     *
     * @return void
     */
    public function comment(){

    }
}










?>