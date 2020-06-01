<?php
namespace app\admin\controller;

use think\View;
use think\Session;
use think\Db;

class Inputschool{
	public function index(){
		$view = new View();
		//查看库中是否记录国家
		$sql1 = 'select *from country';
		$res1 = Db::query($sql1);
		if($res1 == null){
			$view->countrys = 1;
			}else{
				$view->countrys = $res1;
				}
		
		return $view->fetch();
		}
	//添加国家地区
	public function addCountrys(){
		$country = input('post.country');
		$sql = 'insert into country (countryName,createTime) values(?,?)';
		$res2 = Db::execute($sql,[$country,date('yy-m-d')]);
		
		if($res2 == 1){
			return '添加成功';
			}else{
				return '网路异常！';
				}
		}
	//删除国家
	public function delCount(){
		$id = input('id');
		$res3 = Db::table('country')->where('id',$id)->delete();
		if($res3 > 0){
			return '<script>location.href="index";</script>';
			}
		}
	//添加院校
	public function addSchool(){
		$scName = input('post.scName');
		$scTime = input('post.scTime');
		$intro = input('post.intro');
		$sel = input('post.sel');
		//return $scName.$scTime;
		
		$sql = 'insert into school (schoollName,schoolTime,schoolDesc,schoolAddr,createTime)
		values(?,?,?,?,?)';
		$res = Db::execute($sql,[$scName,$scTime,$intro,$sel,date("yy-m-d")]);
		if($res > 0){
			return '添加成功';
			}else{
				return '添加失败';
				}
		}
	//显示已经添加的院校
	public function displaySchool(){
		
		}
	}
?>