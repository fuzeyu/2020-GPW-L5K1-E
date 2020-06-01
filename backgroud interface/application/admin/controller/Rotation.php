<?php
namespace app\admin\controller;
use think\View;
use think\Db;
class Rotation {
	
	public function index(){
		$view = new View();
		$view->name = input('admin');
		return $view->fetch();		
		}
	public function getUploadImage(){
		$count = 0;
		$total = input('post.count');
		$files = request()->file();
		foreach($files as $file){
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            //echo $info->getExtension(); 
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            //echo $info->getFilename();
			$imgName = $info->getFilename();
			$date = date('yymd');
			$uploadPath = 'uploads/'.$date.'/'.$imgName;
			$date2 = date('yy-m-d');
			$res = Db::execute('insert into uploadrotation (imageName,imagePath,createTime) values (?,?,?)',[$imgName,$uploadPath,$date2]);
			$count = $count + $res;
			
			if($count >= $total){
				return '添加成功';
				}
			
			
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }    
    }

		}
	public function watchRotation(){
		$sql = 'select *from uploadrotation';
		$res = Db::query($sql);
		$view = new View();
		$view->list = $res;
		$view->name = input('admin');
		return $view->fetch();
		
		}
	public function deleteSingleRotation(){
		$view = new View();
		$id = input('id');
		if($id != "" || $id != null){
			$sql = 'select imagePath from uploadrotation where id=?';
			$res = Db::query($sql,[$id]);
			//return $res[0]['imagePath'];
			$filePath = $res[0]['imagePath'];
			$completeFilePath = ROOT_PATH.'public'.DS.$filePath;
			//echo $completeFilePath;
			//拿到文件完整的文件路径后判断文件是否存在
			if(file_exists($completeFilePath)){
				unlink($completeFilePath);
				$res2 = Db::table('uploadRotation')->where('id',$id)->delete();
				if($res > 0){
					return '删除成功';
					}else{
						return '网络异常,删除失败';
						}
				}
			}
		}
	}
?>