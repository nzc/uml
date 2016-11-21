<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\Inform;
use app\index\model\User;

class Informmanager
{
    public function index()
    {
        return 'inform controller';
    }

    // 接受表单，在数据库中添加inform项
    // return false:    title or content == null
    // return true:     save success
    public function createInform()
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

        $inform = new Inform();
        if ($request->param('inform_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('inform_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $inform['inform_title'] = $request->param('inform_title');
        $inform['inform_content'] = $request->param('inform_content');
        $inform['language'] = 0;
        $inform['create_time'] = date('y-m-d h:i:s',time());
        $inform['update_time'] = date('y-m-d h:i:s',time());
        $inform->save();
        #return json_encode($inform);
        $message = ['type'=>True,'message'=>'新增通知成功', 'inform'=>$inform];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改inform_id对应的inform项
    // $inform_id:    要修改的inform项的id
    // return false:    title or content == null
    // return true:     update success and inform
    public function updateInform($inform_id)
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

        $inform = Inform::get($inform_id);
        if ($inform == null) {
            $message = ['type'=>False,'message'=>'inform_id错误'];
            return json_encode($message);
        }
        if ($request->param('inform_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('inform_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $inform['inform_title'] = $request->param('inform_title');
        $inform['inform_content'] = $request->param('inform_content');
        $inform['update_time'] = date('y-m-d h:i:s',time());
        $inform->save();
        $message = ['type'=>True,'message'=>'更新通知成功'];
        return json_encode($message);
    }

    // 在数据库中删除inform_id对应的inform项
    // $inform_id:    要删除的inform项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteInform($inform_id)
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

        $inform = Inform::get($inform_id);
        if ($inform == null) {
            $message = ['type'=>False,'message'=>'inform_id不存在，删除失败'];
            return json_encode($message);
        }
        $inform->delete();
        $message = ['type'=>True,'message'=>'删除通知成功'];
        return json_encode($message);
    }

    // 在数据库中查询inform_id对应的inform项
    // $inform_id:    要查询的inform项的id
    // return false:    invalid id
    // return true:     query success and inform
    public function queryInform($inform_id)
    {
        $inform = Inform::get($inform_id);
        if ($inform == null) {
            $message = ['type'=>False,'message'=>'inform_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询通知成功','inform'=>$inform];
        return json_encode($message);
    }

    // 返回所有的通知
    public function queryAllInform()
    {
        $inform = new Inform();
        $list = $inform->order('update_time desc')->select();
        $message = ['type'=>True, 'message'=>'返回所有informs', 'informs'=>$list];
        return json_encode($message);
    }

}
