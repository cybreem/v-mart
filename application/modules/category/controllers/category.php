<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
        $this->load->model('category_model');
        $this->load->helper(array('url','form'));
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
		$level = $this->input->post('level');
		if($ref_category=="undefined")
		{
			$data = array(
				'category_name' => $this->input->post('category_name'),
				'level' => $this->input->post('level')
			);
		}
		else
		{
			if($level=="3")
			{
				$image_brands = $_FILES['image']['name'];
				// Konfigurasi Upload Gambar	
				$config['file_name'] = $image_brands;
				$config['upload_path'] = './assets/image_category';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']	= '3024';
				$config['max_width']  = '1600';
				$config['max_height']  = '1200';

				// Memuat Library Upload File
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('image');
				$data = array('upload_data' => $this->upload->data());
				
				$get_name = $this->upload->data();
				$nama_file = $get_name['file_name'];

				$data = array(
				'category_name' => $this->input->post('category_name'),
				'level' => $this->input->post('level'),
				'ref_category' => $this->input->post('ref_category'),
				'image' => $nama_file
				);
					
				$this->category_model->add($data);
			}
			else
			{
				$data = array(
				'category_name' => $this->input->post('category_name'),
				'level' => $this->input->post('level'),
				'ref_category' => $this->input->post('ref_category')	
				);
			}
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

	function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'category_name' => $this->input->post('category_name')
			);
		$this->category_model->update($data, $id);
	}
	
	function upload()
	{

	}
	
	function delete($id)
	{
	}
}