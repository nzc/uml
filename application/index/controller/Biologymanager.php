<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\Biology;
use app\index\model\User;

class Biologymanager
{
    public function index()
    {
        return 'biology controller';
    }

    // 接受表单，在数据库中添加biology项
    // return false:    title or content == null
    // return true:     save success
    public function createBiology()
    {

        $request = Request::instance();

        if (!Session::get($request->param('user_id'))) {
            $message = ['type'=>False,'message'=>'非法用户'];
            return json_encode($message);
        }
        $session_user_class = Session::get($request->param('user_id'));
        if ($session_user_class != 2) {
            $message = ['type'=>False,'message'=>'非管理员用户'];
            return json_encode($message);
        }

        $biology = new Biology();
        if ($request->param('biology_name') == null) {
            $message = ['type'=>False,'message'=>'生物名字为空'];
            return json_encode($message);
        }
        $biology['biology_name'] = $request->param('biology_name');
        $biology['info'] = $request->param('info');
        $biology['language'] = 0;
        $biology->save();
        #return json_encode($biology);
        $message = ['type'=>True,'message'=>'新增生物成功', 'biology'=>$biology];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改biology_id对应的biology项
    // $biology_id:    要修改的biology项的id
    // return false:    title or content == null
    // return true:     update success and biology
    public function updateBiology($biology_id)
    {
        $request = Request::instance();
        
        if (!Session::get($request->param('user_id'))) {
            $message = ['type'=>False,'message'=>'非法用户'];
            return json_encode($message);
        }
        $session_user_class = Session::get($request->param('user_id'));
        if ($session_user_class != 2) {
            $message = ['type'=>False,'message'=>'非管理员用户'];
            return json_encode($message);
        }

        $biology = Biology::get($biology_id);
        if ($biology == null) {
            $message = ['type'=>False,'message'=>'biology_id错误'];
            return json_encode($message);
        }
        if ($request->param('biology_name') == null) {
            $message = ['type'=>False,'message'=>'生物名字为空'];
            return json_encode($message);
        }
        $biology['biology_name'] = $request->param('biology_name');
        $biology['info'] = $request->param('info');
        $biology['language'] = 0;
        $message = ['type'=>True,'message'=>'更新生物成功'];
        return json_encode($message);
    }

    // 在数据库中删除biology_id对应的biology项
    // $biology_id:    要删除的biology项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteBiology($biology_id)
    {
        $request = Request::instance();
        
        if (!Session::get($request->param('user_id'))) {
            $message = ['type'=>False,'message'=>'非法用户'];
            return json_encode($message);
        }
        $session_user_class = Session::get($request->param('user_id'));
        if ($session_user_class != 2) {
            $message = ['type'=>False,'message'=>'非管理员用户'];
            return json_encode($message);
        }

        $biology = Biology::get($biology_id);
        if ($biology == null) {
            $message = ['type'=>False,'message'=>'biology_id不存在，删除失败'];
            return json_encode($message);
        }
        $biology->delete();
        $message = ['type'=>True,'message'=>'删除生物成功'];
        return json_encode($message);
    }

    // 在数据库中查询biology_id对应的biology项
    // $biology_id:    要查询的biology项的id
    // return false:    invalid id
    // return true:     query success and biology
    public function queryBiology($biology_id)
    {
        $biology = Biology::get($biology_id);
        if ($biology == null) {
            $message = ['type'=>False,'message'=>'biology_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询生物成功','biology'=>$biology];
        return json_encode($message);
    }

    // 返回所有的生物
    public function queryAllBiologies($language)
    {
        $biology = new Biology();
        $list = $biology->where('language', $language)->select(); 
        $message = ['type'=>True, 'message'=>'返回所有biologies', 'biologies'=>$list];
        return json_encode($message);
    }

}
