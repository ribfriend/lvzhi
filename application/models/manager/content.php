<?php
class Content extends CI_Model{
	private static $tableName = "double_content";
	public function __construct(){
		parent::__construct();
	}
	/*获取文章内容数目*/
	public function getContentCount(){
		$sql = "SELECT COUNT(id) AS num FROM ".self::$tableName." WHERE is_del = 0";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return intval($result['num']);
	}
	/*获取文章内容*/
	public function getContentList($offset = 0, $limit = 10){
		$sql = "SELECT * FROM ".self::$tableName." WHERE is_del = 0 ORDER BY createtime DESC LIMIT {$offset},{$limit} ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	/*新增文章*/
	public function addArticleInfo($data){
		return $this->db->insert(self::$tableName, $data); 
	}
	/*查询对应文章内容*/
	public function getArticleInfo($id){
		$sql ="SELECT * FROM ".self::$tableName." WHERE id = {$id}";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	/*更新文章*/
	public function updateArticleInfo($data,$id){
		return $this->db->update(self::$tableName, $data, "id = {$id}");
	}
}
?>