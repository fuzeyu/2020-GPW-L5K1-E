<?PHP
namespace app\admin\controller;
use think\View;
use think\Request;
use think\Db;

 class Dynamic {
	 public function index(){
		 return view();
		 }
	 
	 public function saveDynamic(){
		 $title = input('post.title');
		 $author = input('post.author');
		 $content = input('post.content');
		 $introduce = input('post.introduce');
		 $fileName = "";
		 $savePath = "";
		 $date = date('yy-m-d');
		 $status = 1;
		 
		 $file = request()->file('img');
		 foreach($file as $info){
			 $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			 $fileName = $info->getFilename();
			 $savePath = 'uploads'.DS.$info->getSaveName();
			 //return $fileName;
			  $sql = 'insert into dynamic (title,author,content,introduce,imgName,imgPath,createTime,status) values(?,?,?,?,?,?,?,?)';
				 $res = Db::execute($sql,[$title,$author,$content,$introduce,$fileName,$savePath,$date,$status]);
				 
				 if($res == 1){
					 return '发布成功';
					 }else{
						 return '发布失败';
						 }
			 }
		 //return $title.$author.$content.$introduce.$fileName.$savePath.$date;
		 //return $title.$author.$content.$introduce.$date;
		 
		
		 
		 }
		 
	  public function watch(){
		  //定义每页显示的数量
		  $num = 5;
		  //当前页
		  $currentPage = input('page');
		  if($currentPage == null){
			  $currentPage =1;
			  }
		  //分页变量
		  $offset = ($currentPage - 1)*$num;
		  //总页数
		  $sql1 = 'select count(*) as total from dynamic';
		  $totalpage = Db::query($sql1);
		  //return $totalpage[0]['total'];
		  $total = ceil($totalpage[0]['total']/$num);
		  //return $total;
		  
		  //获取显示的数据
		  $sql2 = "select *from dynamic limit $offset,$num";
		  $res = Db::query($sql2);
		  //dump($res);
		  $view = new View();
		  $view->list = $res;
		  $view->total = $total;
		  $view->currentPage = $currentPage;
		  return $view->fetch();
		  }
	 }
?>