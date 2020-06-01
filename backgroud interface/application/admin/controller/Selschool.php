<?php
namespace app\admin\controller;

use think\View;
use think\Session;
use think\Db;

class Selschool {
	public function index(){
		
		$view = new View();
		//分页
		$num = 4;
		$cp = input('cp');
		if($cp == null){
			$cp = 1;
			}
		$offset = ($cp - 1)*$num;
		$sql = 'select count(*) schoolCount from school';
		$res = Db::query($sql);
		$tp = ceil($res[0]['schoolCount']/$num);
		
		$sql2 = "select *from school limit $offset,$num";
		//return $offset;
		$res2 = Db::query($sql2);
		
		$view->cp = $cp;
		$view->tp = $tp;
		
		$view->sclist = $res2;
				
		
		return $view->fetch();
		}
	//删除院校
	public function delSchool(){
		$view = new View();
		$id = input('id');
		$res = Db::table('school')->where('id',$id)->delete();
		if($res > 0){
			return '<script>alert("删除成功");</script>';
			}
		}
	}
?>