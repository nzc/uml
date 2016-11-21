<?php
namespace app\index\controller;

use app\index\model\News;

class ShowNews
{
    public function index()
    {
        return 'show news controller';
    }

    public function hello()
    {
    	return 'hello world';
    }

    // 返回数据库中update_time最晚的三个新闻
    public function getTop3()
    {
    	$news = new News();
    	$list = $news->order('update_time desc')->limit(3)->select();
    	//$top3List = array_slice($list, 0, 3);
        $message = ['type'=>True, 'message'=>'返回最新的3个news', 'news'=>$list];
        return json_encode($message);
    }

    // 返回数据库中的所有新闻，按时间排序
    public function getList()
    {
        $news = new News();
        $list = $news->order('update_time desc')->select();
        $message = ['type'=>True, 'message'=>'返回所有news', 'news'=>$list];
        return json_encode($message);
    }

}
