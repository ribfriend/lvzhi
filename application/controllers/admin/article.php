<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("manager/Content","con");
	}
	/**
	* 文章管理
	*/
	public function index(){
		$offset = intval($this->uri->segment(4)) > 0 ? intval($this->uri->segment(4)) : 0;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('admin/article/index');
		$config['per_page'] = $this->config->item('page_size');;
		$config['total_rows'] = $this->con->getContentCount();
		$data['contentList'] = $this->con->getContentList($offset, $config['per_page']);
		$this->pagination->initialize($config); 
		$page = $this->pagination->create_links();
		$data['page'] = $page;
		$this->load->view('admin/article_list', $data);
	}

	/**
	 * 新增文章
	 */
	public function add(){
		$this->load->view("admin/article_add");
	}

	/**
	* 文章入库
	*/
	public function insert(){
		$title = isset($_POST['article_name']) ? $_POST['article_name'] : '';
		$insert_time = isset($_POST['insert_time']) ? $_POST['insert_time'] : '';
		$description = isset($_POST['description']) ? $_POST['description'] : '';
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		if($title == '' || $insert_time == '' || $description == '' || $content == ''){
			die("错误参数");
		}
		$data['title'] = $title;
		$data['createtime'] = strtotime($insert_time);
		$data['description'] = $description;
		$data['content'] = $content;
		$data['is_del'] = 0;
		$data['updatetime'] = 0;
		$data['is_batch'] = 0;
		$data['status']= 0;
		$aid = $this->con->addArticleInfo($data);
		if(intval($aid) > 0){
			redirect("/admin/article/index");
		} else {
			die("发布失败");
		}
	}

	public function edit(){
		$id = $this->uri->segment(4);
		//echo $id;
		if($id <= 0 || empty($id) || !is_numeric($id)){
			die("错误参数");
		}
		$data['info'] = $this->con->getArticleInfo($id);
		$data['id'] = $id;
		$this->load->view("admin/article_update",$data);
	}

	public function update(){
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$title = isset($_POST['article_name']) ? $_POST['article_name'] : '';
		$updatetime = isset($_POST['updatetime']) ? $_POST['updatetime'] : '';
		$description = isset($_POST['description']) ? $_POST['description'] : '';
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		if($id == '' || $title == '' || $updatetime == '' || $description == '' || $content == ''){
			die("错误参数");
		}
		$data['title'] = $title;
		$data['updatetime'] = strtotime($updatetime);
		$data['description'] = $description;
		$data['content'] = $content;
		$data['is_del'] = 0;
		$data['is_batch'] = 0;
		$data['status']= 0;
		$aid = $this->con->updateArticleInfo($data,$id);
		if(intval($aid) > 0){
			redirect("/admin/article/index");
		} else {
			die("修改失败");
		}
	}

	public function del(){
		$id = $this->uri->segment(4);
		if($id <= 0 || empty($id) || !is_numeric($id))
		{
			die("错误参数");
		}
		$data = array('is_del' => 1);
		$delStatus = $this->con->updateArticleInfo($data,$id);
		if ($delStatus) 
		{
			die("删除文章成功！");
		} else 
		{
			die("删除文章失败！");
		}
	}
}
?>