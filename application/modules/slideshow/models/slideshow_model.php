<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow_model extends CI_Model {

	function getSlideshow()
	{
		$this->db->select('*')
            ->from('tb_slideshow');
        $result = $this->db->get()->result();
        return $result;
	}

	function add($data)
	{
		$this->db->insert('tb_slideshow',$data);
		redirect('category','refresh');
	}
	
	
	function update($data,$id)
	{
		$this->db->where('id',$id)
				->update('tb_slideshow',$data);
		return;
	}
	
	function delete($id)
	{
		$this->db->delete('slideshow',array('id' => $id));
	}

	function edit($id)
	{
		$this->db->select('image, link_url, description, active')
			->from('tb_slideshow')
			->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}
}