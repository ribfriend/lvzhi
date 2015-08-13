<?php
class Customers extends CI_Model{
	private static $tableName = "agent";
	public function __construct(){
		parent::__construct();
	}
	public function getList(){
		$sql = "SELECT * FROM ".self::$tableName;
		//echo $sql;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getListFirst(){
		$sql = "SELECT * FROM ".self::$tableName." WHERE parent_id = 0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getInfoById($id){
		$sql = "SELECT * FROM ".self::$tableName." WHERE id = {$id}";
		$query = $this->db->query($sql);
		$result_Info = $query->first_row('array');
		//print_r($result_Info);
		return $result_Info;
	}
	public function getInfoByAuthId($id){
		$sql = "SELECT * FROM ".self::$tableName." WHERE auth_id = '{$id}'";
		$query = $this->db->query($sql);
		$result_Info = $query->first_row('array');
		//print_r($result_Info);
		return $result_Info;
	}

	public function getParentInfo($pid){
		$sql = "SELECT contact FROM ".self::$tableName." WHERE id = {$pid}";
		$query = $this->db->query($sql);
		$result = $query->first_row('array');
		//print_r($result);
		//print_r($result);exit();
		if(empty($result['contact'])){
			return $result['contact'] ='无';
		} else {
			return $result['contact'];
		}
	}

	public function updateInfo($data,$id){
		return $this->db->update(self::$tableName, $data, "id = {$id}");
	}
	
	public function updateUserInfo($data,$where){
		return $this->db->update("man_user", $data, $where);
	}

	public function insertInfo($data){
		$query = $this->db->insert(self::$tableName, $data);
		return $this->db->insert_id();
	}

	public function delInfo($id){
		return $this->db->delete(self::$tableName, array('id' => $id)); 
	}
}
?>