<?php
namespace app\index\controller;

use think\Session;
use think\Request;
use app\index\model\Article;
use app\index\model\User;

class Articlemanager
{
    public function index()
    {
        return 'article controller';
    }

    // 接受表单，在数据库中添加article项
    // return false:    title or content == null
    // return true:     save success
    public function createArticle()
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

        $article = new Article();
        if ($request->param('article_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('article_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $article['article_num'] = $request->param('article_num');
        $article['article_title'] = $request->param('article_title');
        $article['article_editor'] = $request->param('article_editor');
        $article['url'] = $request->param('url');
        $article['language'] = 0;
        $article['create_time'] = date('y-m-d h:i:s',time());
        $article['update_time'] = date('y-m-d h:i:s',time());
        $article['zan_num'] = 0;
        $article['grade'] = 0;
        $article->save();
        #return json_encode($article);
        $message = ['type'=>True,'message'=>'新增文章成功', 'article'=>$article];
        return json_encode($message);
    }

    // 接受表单，在数据库中修改article_id对应的article项
    // $article_id:    要修改的article项的id
    // return false:    title or content == null
    // return true:     update success and article
    public function updateArticle($article_id)
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

        $article = Article::get($article_id);
        if ($article == null) {
            $message = ['type'=>False,'message'=>'article_id错误'];
            return json_encode($message);
        }
        if ($request->param('article_title') == null) {
            $message = ['type'=>False,'message'=>'标题为空'];
            return json_encode($message);
        }
        if ($request->param('article_content') == null) {
            $message = ['type'=>False,'message'=>'内容为空'];
            return json_encode($message);
        }
        $article['article_num'] = $request->param('article_num');
        $article['article_title'] = $request->param('article_title');
        $article['article_editor'] = $request->param('article_editor');
        $article['url'] = $request->param('url');
        $article['language'] = 0;
        $article['update_time'] = date('y-m-d h:i:s',time());
        $article['zan_num'] = 0;
        $article['grade'] = 0;
        $article->save();
        $message = ['type'=>True,'message'=>'更新文章成功'];
        return json_encode($message);
    }

    // 在数据库中删除article_id对应的article项
    // $article_id:    要删除的article项的id
    // return false:    invalid id
    // return true:     delete success
    public function deleteArticle($article_id)
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

        $article = Article::get($article_id);
        if ($article == null) {
            $message = ['type'=>False,'message'=>'article_id不存在，删除失败'];
            return json_encode($message);
        }
        $article->delete();
        $message = ['type'=>True,'message'=>'删除文章成功'];
        return json_encode($message);
    }

    // 在数据库中查询article_id对应的article项
    // $article_id:    要查询的article项的id
    // return false:    invalid id
    // return true:     query success and article
    public function queryArticle($article_id)
    {
        $article = Article::get($article_id);
        if ($article == null) {
            $message = ['type'=>False,'message'=>'article_id不存在，查询失败'];
            return json_encode($message);
        }
        $message = ['type'=>True,'message'=>'查询文章成功','article'=>$article];
        return json_encode($message);
    }

    // 返回所有的文章
    public function queryAllArticle()
    {
        $article = new Article();
        $list = $article->order('update_time desc')->select();
        $message = ['type'=>True, 'message'=>'返回所有articles', 'articles'=>$list];
        return json_encode($message);
    }

    // 返回时间排序前n个文章
    public function queryNArticle($n)
    {
        $article = new Article();
        $list = $article->order('update_time desc')->limit($n)->select();
        $message = ['type'=>True, 'message'=>'返回所有articles', 'articles'=>$list];
        return json_encode($message);
    }

    // 点赞
    public function addArticleZan($article_id)
    {
        $article = Article::get($article_id);
        if ($article == null) {
            $message = ['type'=>False,'message'=>'article_id错误'];
            return json_encode($message);
        }
        $article['zan_num'] = $article['zan_num'] + 1;
        $article->save();
        $message = ['type'=>True,'message'=>'点赞成功'];
        return json_encode($message);
    }

    public function getArticleZan($article_id)
    {
        $article = Article::get($article_id);
        if ($article == null) {
            $message = ['type'=>False,'message'=>'article_id错误'];
            return json_encode($message);
        }
        $zan_num = $article['zan_num'];
        $message = ['type'=>True,'message'=>'点赞成功', 'zan_num'=>$zan_num];
        return json_encode($message);
    }

}
