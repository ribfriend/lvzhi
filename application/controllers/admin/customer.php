<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	public $userdata;
	public function __construct(){
		parent::__construct();
		$this->load->model("manager/Customers","cust");
		$this->load->library('session');
		$this->userdata = $this->session->userdata("logged_in");
		if($this->userdata != 1){
			die('你还未登陆，请登陆后再来操作！');
		}
	}

	public function index(){
		$list =$this->cust->getList();
		$str = "";
		foreach ($list as $key => $value) {
			//# code...
			if($value['parent_id'] == 0){
				$str=$str.'{ id:'.$value['id'].', pId:'.$value['parent_id'].', name:"'.$value['contact'].'", open:true},';
			} else {
				$str=$str.'{id:'.$value['id'].', pId:'.$value['parent_id'].', name:"'.$value['contact'].'"},';
			}			
		}
		$data['str'] = $str;
		$this->load->view('admin/customer',$data);
	}	

	public function edit(){
		$id = $_REQUEST['id'];
		//查询该会员的信息
		$info  = $this->cust->getInfoById($id);
		$info['parent_name'] = $this->cust->getParentInfo($info['parent_id']);
		//获取分类树
		//$list = $this->cust->getList();
		/*$optionss = get_tree_option($list, 0); 
		$options = "";
	    foreach($optionss as $op) {
	    	if($op['id'] == $info['parent_id']){
	    		$options .= '<option value="' . $op['id'] .'" selected="selected">' . str_repeat("&nbsp;", $op['level_num'] * 2) . $op['contact'] . '</option>';
	    	} else {
	    		$options .= '<option value="' . $op['id'] .'">' . str_repeat("&nbsp;", $op['level_num'] * 2) . $op['contact'] . '</option>';	
	    	}	        
	    }*/
		//die(json_encode($info));
		die($this->JSON($info));
		//echo $this->output->set_content_type('application/json')->set_output(json_encode($info ));exit();
		
		
		//die($this->JSON($info));
		//echo '<pre>';print_r($info);exit();
		//$data['option'] = $options;
		//$this->load->view("admin/customer_edit",$data);
	}
	
	public function editUser(){
		
		/*$list = $this->cust->getList();
		$optionss = get_tree_option($list, 0); 
		$options = "";
	    foreach($optionss as $op) {
	    	$options .= '<option value="' . $op['id'] .'">' . str_repeat("&nbsp;", $op['level_num'] * 2) . $op['contact'] . '</option>';	
	    }
	    $data['option'] = $options;*/
	    $data['info'] = $this->session->userdata("username");
		$this->load->view("admin/customer_edit",$data);
	}
	public function check_auth_id(){
		$id = $this->input->post('id');
		//查询该会员的信息
		$info  = $this->cust->getInfoByAuthId($id);
		//die($this->JSON($info));
		$info_num = count($info);
		if($info_num === 0){
			die("0");
		}else {
			die("1");
		}
	}
	public function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
    	static $recursive_counter = 0;
    	if (++$recursive_counter > 1000) {
     	 	die('possible deep recursion attack');
		}
		foreach ($array as $key => $value) {
     		 if (is_array($value)) {
         		 arrayRecursive($array[$key], $function, $apply_to_keys_also);
      		} else {
         		 $array[$key] = $function($value);
      		}
    		if ($apply_to_keys_also && is_string($key)) {
				$new_key = $function($key);
         		if ($new_key != $key) {
              	$array[$new_key] = $array[$key];
              	unset($array[$key]);
          		}
     		 }
  		}
  		$recursive_counter--;
	}
	public function JSON($array) {
    	$this->arrayRecursive($array, 'urlencode', true);
    	$json = json_encode($array);
   		return urldecode($json);
	}
	
	public function add(){
		$parent_id = $this->uri->segment(4);
		if($parent_id == "" || empty($parent_id)){
			die("异常操作");
		}
		$info['parent_name'] = $this->cust->getParentInfo($parent_id);
		$info['parent_id'] = $parent_id;
		/*$list = $this->cust->getList();
		$optionss = get_tree_option($list, 0); 
		$options = "";
	    foreach($optionss as $op) {
	    	$options .= '<option value="' . $op['id'] .'">' . str_repeat("&nbsp;", $op['level_num'] * 2) . $op['contact'] . '</option>';	
	    }
	    $data['option'] = $options;*/
	    $data['info'] = $info;
		$this->load->view("admin/customer_add",$data);
	}

	public function adds(){
		$this->load->view("admin/customer_adds");
	}
	public function updateUser($data){
		$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		$data['username'] = $username;
		$data['password'] = md5($password);
		$where['userid'] =1;
		$query = $this->cust->updateUserInfo($data,$where);
		if($query){
			redirect("/admin/index/index");
		} else {
			die("错误参数");
		}
		//return $this->db->update("man_user", $data, "id = 1");
	}
	public function insert(){
		$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
		$chanel  = isset($_POST['chanel']) ? $_POST['chanel'] : 0;
		$chanel_id  = isset($_POST['chanel_id']) ? $_POST['chanel_id'] : 0;
		$contact  = isset($_POST['contact']) ? $_POST['contact'] : 0;
		$telphone  = isset($_POST['telphone']) ? $_POST['telphone'] : 0;
		$address  = isset($_POST['address']) ? $_POST['address'] : 0;
		$deadline  = isset($_POST['deadline']) ? $_POST['deadline'] : 0;
		$is_auth  = isset($_POST['is_auth']) ? $_POST['is_auth'] : 0;
		$remark  = isset($_POST['remark']) ? $_POST['remark'] : 0;
		$user_num  = isset($_POST['user_num']) ? $_POST['user_num'] : 0;
		$level  = isset($_POST['level']) ? $_POST['level'] : 0;		
		$auth_id  = isset($_POST['auth_id']) ? $_POST['auth_id'] : 0;		
		if($parent_id == 0){
			$data = array(
					'auth_id' => $auth_id,
					'chanel' => $chanel,
					'chanel_id' => $chanel_id,
					'contact' => $contact,
					'telphone' => $telphone,
					'address' => $address,
					'deadline' => $deadline,
					'is_auth' => $is_auth,
					'remark' => $remark,
					'user_num' => $user_num,
					'level' => $level
				);
		} else {
			$data = array(
					'auth_id' => $auth_id,
					'chanel' => $chanel,
					'chanel_id' => $chanel_id,
					'contact' => $contact,
					'telphone' => $telphone,
					'address' => $address,
					'deadline' => $deadline,
					'is_auth' => $is_auth,
					'remark' => $remark,
					'user_num' => $user_num,
					'level' => $level,
					'parent_id' => $parent_id
				);	
		}		
		$query = $this->cust->insertInfo($data);
		if($query){
			redirect("/admin/customer/index");
		} else {
			die("修改失败");
		}
	}

	public function delInfo(){
		$id  = isset($_POST['id']) ? $_POST['id'] : 0;
		if($id == 0 || empty($id)){
			$data = array('status' => 2,'message' => '异常操作');
			die(json_encode(print_r($data)));
		} else {
			$query = $this->cust->delInfo($id);
			if($query){
				$data = array('status' => 1,'message' => '删除成功');
				die(json_encode(print_r($data)));
			} else {
				$data = array('status' => 0,'message' => '删除失败');
				die(json_encode(print_r($data)));
			}
		}
	}

	public function update(){
		$id  = isset($_POST['id']) ? $_POST['id'] : 0;
		$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
		$chanel  = isset($_POST['chanel']) ? $_POST['chanel'] : 0;
		$chanel_id  = isset($_POST['chanel_id']) ? $_POST['chanel_id'] : 0;
		$contact  = isset($_POST['contact']) ? $_POST['contact'] : 0;
		$telphone  = isset($_POST['telphone']) ? $_POST['telphone'] : 0;
		$address  = isset($_POST['address']) ? $_POST['address'] : 0;
		$deadline  = isset($_POST['deadline']) ? $_POST['deadline'] : 0;
		$is_auth  = isset($_POST['is_auth']) ? $_POST['is_auth'] : 0;
		$remark  = isset($_POST['remark']) ? $_POST['remark'] : 0;
		$user_num  = isset($_POST['user_num']) ? $_POST['user_num'] : 0;
		$level  = isset($_POST['level']) ? $_POST['level'] : 0;		
		$auth_id  = isset($_POST['auth_id']) ? $_POST['auth_id'] : 0;		
		if($id == 0 || empty($id)){
			die("异常操作");
		}
		$data = array('id' => $id,
					'auth_id' => $auth_id,
					'chanel' => $chanel,
					'chanel_id' => $chanel_id,
					'contact' => $contact,
					'telphone' => $telphone,
					'address' => $address,
					'deadline' => $deadline,
					'is_auth' => $is_auth,
					'remark' => $remark,
					'user_num' => $user_num,
					'level' => $level,
					'parent_id' => $parent_id
				);
		$query = $this->cust->updateInfo($data,$id);
		if($query){
			redirect("/admin/customer/index");
		} else {
			die("修改失败");
		}
	}
}
?>