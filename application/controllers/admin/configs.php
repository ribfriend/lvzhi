<?if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configs extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("manager/Config",'configs');
	}
	public function index(){
		$id  = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
		$site_name = isset($_REQUEST['site_name']) ? $_REQUEST['site_name'] : '';
		$site_icp = isset($_REQUEST['site_icp']) ? $_REQUEST['site_icp'] : '';
		$site_copy = isset($_REQUEST['site_copy']) ? $_REQUEST['site_copy'] : '';
		$company_tel = isset($_REQUEST['company_tel']) ? $_REQUEST['company_tel'] : '';
		$reldata = array('site_name' => $site_name,'site_icp'=>$site_icp,'site_copy'=>$site_copy,'company_tel'=>$company_tel);
		if($id != 0){
			$insert_id = $this->configs->updatesiteinfo($reldata,$id);
			
			if($insert_id != 0){
				redirect('/admin/index/manager', 'refresh');
			}
		} else {
			$insert_id = $this->configs->addsiteinfo($reldata);
			
			if($insert_id != 0){
				redirect('/admin/index/manager', 'refresh');
			}
		}	
	}
}
?>