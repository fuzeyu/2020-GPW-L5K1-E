<?php
namespace app\admin\controller;

use think\View;
use think\Session;
use think\Db;
class Admin {
    public function index()
    {	
		$adminName = Session::get('admin');
 		$view = new View();
		$view->name = $adminName;
		
		//管理员总数
		$sql = 'select count(*) as adminCount from admin';
		$res1 = Db::query($sql);
		$view->adminCount = $res1[0]['adminCount'];
		
		//轮播图总数
		$sql2 = 'select count(*) as rotationCount from uploadrotation';
		$res2 = Db::query($sql2);
		$view->rotationCount = $res2[0]['rotationCount'];
		
		//长图总数
		$sql3 = 'select count(*) as longCount from longimage';
		$res3 = Db::query($sql3);
		$view->longCount = $res3[0]['longCount'];
		
		//动态总数
		$sql4 = 'select count(*) as dynamicCount from dynamic';
		$res4 = Db::query($sql4);
		$view->dynamicCount = $res4[0]['dynamicCount'];
		
		//用户总数
		$sql5 = 'select count(*) as userCount from user';
		$res5 = Db::query($sql5);
		$view->userCount = $res5[0]['userCount'];
		
		//院校数
		$sql6 = 'select count(*) as scCount from school';
		$res6 = Db::query($sql6);
		$view->scCount = $res6[0]['scCount'];
		
		//申请
		$sql7 = 'select count(*) as sqCount from consultation';
		$res7 = Db::query($sql7);
		$view->sqCount = $res7[0]['sqCount'];
		
		//获取管理员列表
		$num = 2;
		$cp = input('cp');
		if($cp == null){
			$cp =1;
			}
		$offset = ($cp - 1)*$num;
		$sql5 = "select *from admin limit $offset,$num";
		$res5 = Db::query($sql5);
		$view->list = $res5;
		$view->cp = $cp;
		$view->tl = ceil($res1[0]['adminCount']/$num);
		
		return $view->fetch();
    }
	//添加管理员
	public function addAdmin(){
		$adminName = input('post.adminName');
		$phone = input('post.phone');
		$pwd = input('post.pwd');
		$date = date('yy-m-d');
		//return $adminName.$phone.$pwd;
		
		$sql = 'insert into admin (adminName,adminPwd,phone,createTime) values(?,?,?,?)';
		$res = Db::execute($sql,[$adminName,$pwd,$phone,$date]);
		
		if($res == 1){
			return '添加成功';
			}else{
				return '添加失败';
				}
		}
}
