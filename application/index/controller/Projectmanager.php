<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\Project;
use app\index\model\User;

class Projectmanager
{
    public function index()
    {
        return 'project controller';
    }

    // 接受表单，在数据库中添加project项
    // return false:    title or content == null
    // return true:     save success
    public function createProject()
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

        $project = new Project();
        if ($request->param('project_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('project_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $project['info'] = $request->param('info');
        $project['pic_url'] = $request->param('pic_url');
        $project['url'] = $request->param('url');
        $project['language'] = 0;
        $project->save();
        #return json_encode($project);
        $message = ['type'=>True,'message'=>'新增项目成功', 'project'=>$project];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改project_id对应的project项
    // $project_id:    要修改的project项的id
    // return false:    title or content == null
    // return true:     update success and project
    public function updateProject($project_id)
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

        $project = Project::get($project_id);
        if ($project == null) {
            $message = ['type'=>False,'message'=>'project_id错误'];
            return json_encode($message);
        }
        if ($request->param('project_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('project_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $project['info'] = $request->param('info');
        $project['pic_url'] = $request->param('pic_url');
        $project['url'] = $request->param('url');
        $project['language'] = 0;
        $project->save();
        $message = ['type'=>True,'message'=>'更新项目成功'];
        return json_encode($message);
    }

    // 在数据库中删除project_id对应的project项
    // $project_id:    要删除的project项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteProject($project_id)
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

        $project = Project::get($project_id);
        if ($project == null) {
            $message = ['type'=>False,'message'=>'project_id不存在，删除失败'];
            return json_encode($message);
        }
        $project->delete();
        $message = ['type'=>True,'message'=>'删除项目成功'];
        return json_encode($message);
    }

    // 在数据库中查询project_id对应的project项
    // $project_id:    要查询的project项的id
    // return false:    invalid id
    // return true:     query success and project
    public function queryProject($project_id)
    {
        $project = Project::get($project_id);
        if ($project == null) {
            $message = ['type'=>False,'message'=>'project_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询项目成功','project'=>$project];
        return json_encode($message);
    }

    // 返回所有的项目
    public function queryAllProject()
    {
        $project = new Project();
        $list = $project->order('update_time desc')->select();
        $message = ['type'=>True, 'message'=>'返回所有projects', 'projects'=>$list];
        return json_encode($message);
    }

}
