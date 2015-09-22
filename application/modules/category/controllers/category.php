<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
        $this->load->model('category_model');
        // if(!$this->session->userdata('logged_in'))
        // {
            // show_404();
        // }
        $this->load->model('category_model');
    }
	
	/* Login Modal */
    
	function index()
	{
		$data['item'] = $this->category_model->getCategory();
		$data = array(
			'content'=>$this->load->view('content', $data, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	
	function getCategory($id,$level){
		$item = $this->category_model->getChildren($id,$level);
		echo json_encode($item);
	}

	function create($level, $parent)
	{
		$data['title'] = "Create Categoory";
		$data['content'] = array('action' => 'create');
		$data['level'] = $level;
		$data['parent'] = $parent;
 		$this->load->view('modal', $data);
	}

	function insert()
	{
		$ref_category = $this->input->post('ref_category');
		if($ref_category=="undefined")
		{
			$data = array(
				'category_name' => $this->input->post('category_name'),
				'level' => $this->input->post('level')
			);
		}
		else
		{
			$data = array(
				'category_name' => $this->input->post('category_name'),
				'level' => $this->input->post('level'),
				'ref_category' => $this->input->post('ref_category')
		);
		}
		
		$this->category_model->add($data);
	}

	function edit($id){
		$data['title'] = "Edit Category";
		$data['model'] = $this->category_model->edit($id);
		$data['content'] = array('action' => 'edit');
		$data['id'] = $id;
		$this->load->view('modal', $data);
	}

	function update($id)
	{

	}
	
	function upload()
	{

	}
	
	function delete($id)
	{
	}
}