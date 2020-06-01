<?php
namespace app\index\controller;
use think\View;
use think\Request;
use think\Db;
use think\Session;

class Userzx{
	public function index(){
		$view = new view();
		$user = Session::get('userName');
		//return $user;
		$res = null;
		if($user != null){
			$res = Db::table('user')->where('userName',$user)->find();
			}
		$view->userinfo = $res;
		
		//国家列表
		$sql = "select *from country";
		$res2 = Db::query($sql);
		$view->clist = $res2;
		return $view->fetch();
		}
	//添加申请
	public function addZx(){
		$name = input('post.name');
		$phone = input('post.phone');
		$country = input('post.country');
		$grade = input('post.grade');
		$area = input('post.area');
		
		//return $name.$phone.$country.$grade.$area;
		$sql = "insert into consultation (name,phone,country,grade,area,createTime) values(?,?,?,?,?,?)";
		$res = Db::execute($sql,[$name,$phone,$country,$grade,$area,date("yy-m-d")]);
		
		if($res > 0){
			return '申请成功';
			}
		}
	}
?>