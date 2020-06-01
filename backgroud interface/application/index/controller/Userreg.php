<?php
namespace app\index\controller;

use think\Request;
use think\Db;

class Userreg{
	public function index(){
		return view();
		}
	//添加用户
	public function addUser(){
		$userName = input('post.userName');
		$truthName = input('post.truthName');
		$gender = input('post.gender');
		$age = input('post.age');
		$idcard = input('post.idcard');
		$pwd = input('post.pwd');
		$phone = input('post.phone');
		
		//return $userName.$truthName.$gender.$age.$idcard.$pwd.$phone;
		//向数据库插入
		$sql = 'insert into user (userName,truthName,gender,age,idcard,phone,pwd,createTime) values(?,?,?,?,?,?,?,?)';
		$res = Db::execute($sql,[$userName,$truthName,$gender,$age,$idcard,$phone,$pwd,date('yy-m-d')]);
		
		if($res == 1){
			return '注册成功';
			}else{
				return '注册失败';
				}
		
		}	
	}
	
?>