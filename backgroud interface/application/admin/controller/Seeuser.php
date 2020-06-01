<?php
namespace app\admin\controller;

use think\View;
use think\Session;
use think\Db;

class Seeuser{
	
	//查看用户信息
	public function index(){
		
		$view = new View();
		
		//分页查询用户
		$num = 10;
		$cp = input('post.cp');
		//return $cp;
		if($cp == null){
			$cp = 1;
			}
		
		$sql2 = 'select count(*) userCount from user';
		$res2 = Db::query($sql2);
		$totalCount = $res2[0]['userCount'];
		//return $totalCount;
		$tp = ceil($totalCount/$num);
		$set = ($cp-1)*$num;
		$sql3 = "select *from user limit $set,$num";
		$res3 = Db::query($sql3);
		//return $res3;
		$view->userList = $res3;
		$view->cp = $cp;
		$view->tp = $tp;
		return $view->fetch();
		}
	//注销用户
	public function delUser(){
		$view = new View();
		$id = input('id');
		$res4 = Db::table('user')->where('id',$id)->delete();
		if($res4 > 0){
			return "<script>alert('注销成功');location.href='index';</script>";
			}else{
				return  "<script>alert('网络异常，请联系管理员解决');</script>";}
		}
	}
?>