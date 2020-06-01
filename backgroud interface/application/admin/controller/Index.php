<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use think\Session;
class Index{
	public function index(){
		return view();
		}
		
	public function checkLogin(){
		$request = Request::instance();
		if ($request->isAjax()){
			
			 $admin = input('post.admin');
			 $pwd = input('post.pwd');
			 
			 $data = Db::table('admin')->where('adminName',$admin)->find();
			 if($data['adminName'] == $admin && $data['adminPwd'] == $pwd){
				 Session::set('admin',$admin);
				 return '登录成功';
				 }else{
					 return '登录失败';
					 }
			
			}
			
		}
	}
?>