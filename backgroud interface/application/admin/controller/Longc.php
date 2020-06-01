<?php
namespace app\admin\controller;
use think\View;
use think\Request;
use think\Db;
class Longc {
	
	public function index(){
		return view();
		}
	public function getUploadImage(){
		$file = request()->file('img');
		foreach($file as $info){
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			$fileName = $info->getFilename();
			$uploadNmae = 'uploads'.DS.date('yymd').DS.$fileName;
			$date = date('yy-m-d');
			$res = Db::execute('insert into longImage (longImageName,longImagePath,createTime) values (?,?,?)',[$fileName,$uploadNmae,$date]);
			if($res == 1){
				return '发布成功';
				}else{
					return '发布失败';
					}
			
			}
		
		}
	}
?>