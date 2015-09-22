<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	function add($data)
	{
		$this->db->insert('tb_category',$data);
		redirect('category','refresh');
	}
	
	
	function update($data,$id)
	{
		$this->db->where('id',$id)
				->update('tb_category',$data);
		redirect('category','refresh');
	}
	
	function delete($id)
	{
		$this->db->delete('article',array('id' => $id));
	}

	function getChildren($id, $level)
	{
		$this->db->select('*')
            ->from('tb_category')
            ->where(array('level'=>$level, 'ref_category'=>$id));
        $result = $this->db->get()->result();
        return $result;
	}

	function getCategory()
	{
		$this->db->select('*')
            ->from('tb_category')
            ->where(array('level'=>'1'));
        $result = $this->db->get()->result();
        return $result;
	}

	function edit($id)
	{
		$this->db->select('category_name, level, image')
			->from('tb_category')
			->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}
}