<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function add($data)
	{
		$this->db->insert('article',$data);
	}
	
	function select_article()
	{
		$query = $this->db->select('article.id, title, content, image, author, date, username')
							->from('article')
							->join('admin','article.author=admin.id','inner')
							->get();
		$result = $query->result_array();
		return $result;
	}
	
	function select_edit($id)
	{
		$query = $this->db->select('article.id, title, content, image, author, date, username')
							->from('article')
							->join('admin','article.author=admin.id','inner')
							->where('article.id',$id)
							->get();
		$result = $query->result_array();
		return $result;
	}
	
	function update($data,$id)
	{
		$this->db->where('article.id',$id)->update('article',$data);
	}
	
	function delete($id)
	{
		$this->db->delete('article',array('id' => $id));
	}
}