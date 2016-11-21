<?php
namespace app\index\controller;
use think\Db;
class Helloworld
{
    public function index()
    {
        $user =  Db::query('select * from user');
        return $user[0]['user_name'];
    }
    public function testLe()
    {
        $user =  Db::query('select * from user');
        return 'aaaaaa'.$user[0]['user_name'];
    }
}
