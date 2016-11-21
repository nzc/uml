<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\Species;
use app\index\model\User;

class Speciesmanager
{
    public function index()
    {
        return 'species controller';
    }

    // 接受表单，在数据库中添加species项
    // return false:    title or content == null
    // return true:     save success
    public function createSpecies()
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

        $species = new Species();
        if ($request->param('species_name') == null) {
            $message = ['type'=>False,'message'=>'物种名字为空'];
            return json_encode($message);
        }
        if ($request->param('biology_id') == null) {
            $message = ['type'=>False,'message'=>'生物id为空'];
            return json_encode($message);
        }
        $species['species_name'] = $request->param('species_name');
        $species['biology_id'] = $request->param('biology_id');
        $species['info'] = $request->param('info');
        $species['pic_url'] = $request->param('pic_url');
        $species['language'] = 0;
        $species->save();
        #return json_encode($species);
        $message = ['type'=>True,'message'=>'新增物种成功', 'species'=>$species];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改species_id对应的species项
    // $species_id:    要修改的species项的id
    // return false:    title or content == null
    // return true:     update success and species
    public function updateSpecies($species_id)
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

        $species = Species::get($species_id);
        if ($species == null) {
            $message = ['type'=>False,'message'=>'species_id错误'];
            return json_encode($message);
        }
        if ($request->param('species_name') == null) {
            $message = ['type'=>False,'message'=>'物种名字为空'];
            return json_encode($message);
        }
        if ($request->param('biology_id') == null) {
            $message = ['type'=>False,'message'=>'生物id为空'];
            return json_encode($message);
        }
        $species['species_name'] = $request->param('species_name');
        $species['biology_id'] = $request->param('biology_id');
        $species['info'] = $request->param('info');
        $species['pic_url'] = $request->param('pic_url');
        $species['language'] = 0;
        $message = ['type'=>True,'message'=>'更新物种成功'];
        return json_encode($message);
    }

    // 在数据库中删除species_id对应的species项
    // $species_id:    要删除的species项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteSpecies($species_id)
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

        $species = Species::get($species_id);
        if ($species == null) {
            $message = ['type'=>False,'message'=>'species_id不存在，删除失败'];
            return json_encode($message);
        }
        $species->delete();
        $message = ['type'=>True,'message'=>'删除物种成功'];
        return json_encode($message);
    }

    // 在数据库中查询species_id对应的species项
    // $species_id:    要查询的species项的id
    // return false:    invalid id
    // return true:     query success and species
    public function querySpecies($species_id)
    {
        $species = Species::get($species_id);
        if ($species == null) {
            $message = ['type'=>False,'message'=>'species_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询物种成功','species'=>$species];
        return json_encode($message);
    }

    // 在数据库中查询biology_id对应的所有species项
    // $biology_id:     要查询的项的biology_id
    // return:          all relative species
    public function queryBiologySpecies($biology_id)
    {
        $species = new Species();
        $list = $species->where('biology_id', $biology_id)->select();
        $message = ['type'=>True, 'message'=>'返回所有对应的species', 'species'=>$list];
        return json_encode($message);
    }

    // 返回所有的物种
    public function queryAllSpecies()
    {
        $species = new Species();
        $list = $species->select();
        $message = ['type'=>True, 'message'=>'返回所有species', 'species'=>$list];
        return json_encode($message);
    }

}
