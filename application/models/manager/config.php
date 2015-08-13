<?php
class Config extends CI_Model{
	private static $tableName = "man_config";
	public function __construct(){
		parent::__construct();
	}
	public function getinfo($num){
		$roleSql = "SELECT * FROM ".self::$tableName." WHERE id =".$num;
		$roleQuery =  $this->db->query($roleSql);
		return $roleQuery->row_array();
	}
	public function updatesiteinfo($data,$id){
		$info = $this->db->update(self::$tableName, $data, array('id' => $id));
		return $info;
	}
}
?>