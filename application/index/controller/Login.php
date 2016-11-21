<?php
namespace app\index\controller;
use app\index\model\User;
use \think\Request;
use think\Session;
class Login
{
  public function signUp() {
    $request = Request::instance();
    $account = $request->param('user_account');
    $name = $request->param('user_name');
    $pwd = $request->param('password');
    $class = $request->param('class');
    $user = new User;
    if ($account == '' or $name == '' or $pwd == '' or $class == '') {
      $message = ['type'=>False,'message'=>'你的账号，或用户名，或密码，或类型为空'];
      return json_encode($message);
    } else {
      $same_name = $user->where('user_name',$name)->select();
      $same_account = $user->where('user_account',$account)->select();
      if (count($same_name) or count($same_account)) {
        $message = ['type'=>False,'message'=>'账号或用户名已存在'];
        return json_encode($message);
      } else {
        $user->data(['user_name' => $name,'user_account' => $account, 'user_pwd' => $pwd, 'user_class'
        => $class,'flag' => 0]);
        $user->save();
        $message = ['type'=>True,'message'=>'账号创建成功，请等待管理员审核'];
        return json_encode($message);
      }
    }
  }

  public function login() {
    $request = Request::instance();
    $where['user_account'] = $request->param('user_name');
    $where['user_pwd'] = $request->param('password');
    $user = new User;
    $is_user = $user->where($where)->find();
    if ($is_user and $is_user['flag'] != 1) {
      $message = ['type'=>False,'message'=>'登录失败，账号未审核完成'];
      return json_encode($message);
    }
    if ($is_user) {
       unset($is_user['user_pwd']);
       Session::set($is_user['user_id'], $is_user['user_class']);
       $message = ['type'=>True,'message'=>'登录成功','userinfo'=>$is_user];
       return json_encode($message);
    } else {
      $message = ['type'=>False,'message'=>'账号密码错误'];
      return json_encode($message);
    }
  }
  public function logout($userid) {
    if (Session::get($userid)) {
      Session::delete($userid);
      $message = ['type'=>True,'message'=>'退出成功'];
      return json_encode('Logout Successfully!');
    } else {
      $message = ['type'=>False,'message'=>'退出错误，尚未登录'];
      return json_encode('You have been logged out!');
    }
  }
  public function updatePassword($userid,$oldpassword,$newpassword) {
    if (!Session::get($userid)) {
      $message = ['type'=>False,'message'=>'修改错误，尚未登录'];
      return json_encode($message);
    } else {
      $where['user_id'] = $userid;
      $where['user_pwd'] = $oldpassword;
      $user = new User;
      $is_user = $user->where($where)->find();
      if ($is_user) {
        $is_user['user_pwd'] = $newpassword;
        $is_user->save();
        $message = ['type'=>True,'message'=>'修改成功'];
        return json_encode($message);
      } else {
        $message = ['type'=>False,'message'=>'旧密码错误'];
        return json_encode($message);
      }
    }
  }
}
