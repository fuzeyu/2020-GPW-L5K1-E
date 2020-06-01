<?php
namespace app\index\controller;

use think\Request;
use think\Db;
use think\Session;

class Userlog{
	public function index(){
		return view();
		}
	//忘记密码,判断用户是否存在
	
	public function getUser(){
		$phone = input('post.phone');
		//从数据库中读取
		$res = Db::table('user')->where('phone',$phone)->find();
		
		//return $res;
		if($res != null){
			return 1;
			}
		}
	//修改密码
	public function modifyPwd(){
		$pwd = input('post.pwd');
		$phone1 = input('post.phone');
		//return $phone;
		$res2 = Db::table('user')->where('phone',$phone1)->setField('pwd', $pwd);

		//return $pwd.$phone1;
		return $res2;

		}
	//登录用户
	public function loginUser(){
		$userName = input('post.userName');
		$pwd = input('post.pwd');
		//return $userName.$pwd;
		
		$res3 = Db::table('user')->where('userName',$userName)->find();
		//dump( $res3);
		if($res3['pwd'] == $pwd){
			Session::set('userName',$userName);
			return '登录成功';
			}else{
				return '登录失败';
				}
		}
	}
	
?>