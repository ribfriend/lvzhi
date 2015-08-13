<?php
class Login extends CI_Model{
	private static $tableName = "man_user";
	public function __construct(){
		parent::__construct();
	}
	public function getRoleInfo($userName,$passWord){
		$roleSql = "SELECT userid,username FROM ".self::$tableName." WHERE username = '".$userName."' AND password = '".md5($passWord)."'";
		$roleQuery =  $this->db->query($roleSql);
		return $roleQuery->row_array();
	}
}
?>