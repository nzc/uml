<?php
namespace app\index\controller;
use think\Db;
use \think\Request;
use think\Session;
use app\index\model\User;
class Usermanage
{
    public function createManager($userid,$newusername,$newuseraccount,$newpassword,$newclass) {
      if (!Session::get($userid)) {
        $message = ['type'=>False,'message'=>'修改错误，尚未登录'];
        return json_encode($message);
      } else if (Session::get($userid) != 1){
        $message = ['type'=>False,'message'=>'你非超级管理员，权限不够'];
        return json_encode($message);
      } else {
        if($newusername == '' or $newuseraccount == '' or $newpassword == '' or $newclass == '') {
          $message = ['type'=>False,'message'=>'你的账号，或用户名，或密码，或类型为空'];
          return json_encode($message);
        } else {
          $user = new User;
          $same_name = $user->where('user_name',$newusername)->select();
          $same_account = $user->where('user_account',$newuseraccount)->select();
          if (count($same_name) or count($same_account)) {
            $message = ['type'=>False,'message'=>'账号或用户名已存在'];
            return json_encode($message);
          } else {
            $user->data(['user_name' => $newusername,'user_account' => $newuseraccount, 'user_pwd' => $newpassword, 'user_class'
            => $newclass,'flag' => 1]);
            $user->save();
            $message = ['type'=>True,'message'=>'账号创建成功'];
            return json_encode($message);
          }
        }
      }
    }
    public function queryManager($userid){
      if (!Session::get($userid)) {
        $message = ['type'=>False,'message'=>'尚未登录'];
        return json_encode($message);
      } else if (Session::get($userid) != 1){
        $message = ['type'=>False,'message'=>'你非超级管理员，权限不够'];
        return json_encode($message);
      } else {
        $user = new User;
        $users = $user->where('user_class',2)->where('flag',1)->select();
        $message = ['type'=>True,'message'=>'查询成功','users' => $users];
        return json_encode($message);
      }
    }
    public function deleteManager($userid,$deluserid) {
      if (!Session::get($userid)) {
        $message = ['type'=>False,'message'=>'尚未登录'];
        return json_encode($message);
      } else if (Session::get($userid) != 1){
        $message = ['type'=>False,'message'=>'你非超级管理员，权限不够'];
        return json_encode($message);
      } else {
        $user = new User;
        $deluser = $user->where('user_id',$deluserid)->find();
        $deluser['flag'] = -1;
        $deluser->save();
        $message = ['type'=>True,'message'=>'删除成功'];
        return json_encode($message);
      }
    }
    public function showApplicatedUsers($userid) {
      if (!Session::get($userid)) {
        $message = ['type'=>False,'message'=>'尚未登录'];
        return json_encode($message);
      } else if (Session::get($userid) != 1){
        $message = ['type'=>False,'message'=>'你非超级管理员，权限不够'];
        return json_encode($message);
      } else {
        $user = new User;
        $users = $user->where('flag',0)->select();
        $message = ['type'=>True,'message'=>'查询成功','users' => $users];
        return json_encode($message);
      }
    }
    public function setUserFlag($userid,$applicationid,$setflag) {
      if (!Session::get($userid)) {
        $message = ['type'=>False,'message'=>'尚未登录'];
        return json_encode($message);
      } else if (Session::get($userid) != 1){
        $message = ['type'=>False,'message'=>'你非超级管理员，权限不够'];
        return json_encode($message);
      } else {
        $user = new User;
        $appuser = $user->where('user_id',$applicationid)->find();
        $appuser['flag'] = $setflag;
        $appuser->save();
        $message = ['type'=>True,'message'=>'设置成功'];
        return json_encode($message);
      }
    }
}
