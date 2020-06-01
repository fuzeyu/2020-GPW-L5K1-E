<?php
namespace app\index\controller;
use think\View;
use think\Request;
use think\Db;
use think\Session;
class Index
{
    public function index()
    {
		$view = new View();
		//获取轮播图
		$sql1 = 'select *from uploadrotation ORDER BY id ';
		$res1 = Db::query($sql1);
		$view->rolist = $res1;
		$view->size = count($res1);
		
		//获取院校列表
		$sql2 = 'select *from school limit 0,5';
		$res2 = Db::query($sql2);
		$view->sclist = $res2;
		$view->scsize = count($res2);
		
		//获取长图
		$sql3 = 'select *from longimage limit 0,5';
		$res3 = Db::query($sql3);
		$view->lclist = $res3;
		
		//获取用户状态
		$user = Session::get('userName');
		if($user == ''){
			$view->userName = "1";
			}else{
				$view->userName = $user;
				}
		
        return $view->fetch();
    }
	//获取搜索信息
	public function getSearch(){
		
		$content = input('post.content');
		//return $content;
		$res = Db::table('school')->where('schoolAddr',$content)->find();
		
		$schoolName = $res['schoolName'];
		$schoolAddr = $res['schoolAddr'];
		
		return $schoolName.','.$schoolAddr;
		}
}
