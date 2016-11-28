<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\News;
use app\index\model\User;

class Newsmanager
{
    public function index()
    {
        return 'news controller';
    }

    public function hello()
    {
    	return 'hello world';
    }

    // 接受表单，在数据库中添加news项
    // return false:    title or content == null
    // return true:     save success
    public function createNews()
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

        $news = new News();
        if ($request->param('news_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('news_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $news['news_title'] = $request->param('news_title');
        $news['news_content'] = $request->param('news_content');
        $news['language'] = 0;
        $news['zan_num'] = 0;
        $news['grade'] = 0;
        $news['create_time'] = date('y-m-d h:i:s',time());
        $news['update_time'] = date('y-m-d h:i:s',time());
        $news->save();
        #return json_encode($news);
        $message = ['type'=>True,'message'=>'新增新闻成功', 'news'=>$news];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改news_id对应的news项
    // $news_id:    要修改的news项的id
    // return false:    title or content == null
    // return true:     update success and news
    public function updateNews($news_id)
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

        $news = News::get($news_id);
        if ($news == null) {
            $message = ['type'=>False,'message'=>'news_id错误'];
            return json_encode($message);
        }
        if ($request->param('news_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('news_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $news['news_title'] = $request->param('news_title');
        $news['news_content'] = $request->param('news_content');
        $news['update_time'] = date('y-m-d h:i:s',time());
        $news->save();
        $message = ['type'=>True,'message'=>'更新新闻成功'];
        return json_encode($message);
    }

    // 在数据库中删除news_id对应的news项
    // $news_id:    要删除的news项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteNews($news_id)
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

        $news = News::get($news_id);
        if ($news == null) {
            $message = ['type'=>False,'message'=>'news_id不存在，删除失败'];
            return json_encode($message);
        }
        $news->delete();
        $message = ['type'=>True,'message'=>'删除新闻成功'];
        return json_encode($message);
    }

    // 在数据库中查询news_id对应的news项
    // $news_id:    要查询的news项的id
    // return false:    invalid id
    // return true:     query success and news
    public function queryNews($news_id)
    {
        $news = News::get($news_id);
        if ($news == null) {
            $message = ['type'=>False,'message'=>'news_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询新闻成功','news'=>$news];
        return json_encode($message);
    }

    // 返回时间排序前n个文章
    public function queryNNews($n)
    {
        $news = new News();
        $list = $news->order('update_time desc')->limit($n)->select();
        $message = ['type'=>True, 'message'=>'返回所有news', 'news'=>$list];
        return json_encode($message);
    }

    public function addZanNum($news_id)
    {
        $news = News::get($news_id);
        if ($news == null) {
            $message = ['type'=>False,'message'=>'news_id不存在，查询失败'];
            return json_encode($message);
        }
        $news['zan_num'] = $news['zan_num'] + 1;
        $zan_num = $news['zan_num'];
        $news->save();
        $message = ['type'=>True,'message'=>'查询新闻成功','zan_num'=>$zan_num];
        return json_encode($message);
    }

    public function getZanNum($news_id)
    {
        $news = News::get($news_id);
        if ($news == null) {
            $message = ['type'=>False,'message'=>'news_id不存在，查询失败'];
            return json_encode($message);
        }
        $zan_num = $news['zan_num'];
        $message = ['type'=>True,'message'=>'查询新闻成功','zan_num'=>$zan_num];
        return json_encode($message);
    }
}
