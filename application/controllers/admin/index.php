<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type:text/html;charset=utf-8");
class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("manager/Login",'login');
		$this->load->model("manager/Config",'configs');
		$this->load->library('session');
	}
	public function index(){
	if( $this->session->userdata('logged_in') == 1){
			redirect("/admin/customer/index");
			exit();
		}
		$this->load->view('admin/login');
	}
	public function doLogin(){
		
		$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		if($username == '' || $password == ''){
			die("登录失败！");
			exit();
		}
		$loginInfo = $this->login->getRoleInfo(trim($username),trim($password));
		//var_dump($loginInfo);
		if( empty($loginInfo))
		{
			die("用户名或密码错误");
		} 
		else 
		{
			$newdata = array(
                   'username'  => $username,
                   'logged_in' => 1,
				   'cookie'=>1
             );
            $this->session->set_userdata($newdata);
			redirect("/admin/customer/index");
		}
	}
	public function manager(){
		$info = $this->configs->getinfo(1);
		$this->load->view('admin/site',$info);
	}

	public function test(){
		batchMessage();
	}
	public function logout(){
			$newdata = array(
				'username' => $this->session->userdata('username'),
				'logged_in' => 0
			);
			$this->session->set_userdata($newdata);
			$this->load->view('admin/login');
	}
}

?>