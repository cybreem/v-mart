<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
        $this->load->model('slideshow_model');
        $this->load->helper(array('url','form'));
        // if(!$this->session->userdata('logged_in'))
        // {
            // show_404();
        // }
        $this->load->model('slideshow_model');
    }
	
	/* Login Modal */
    
	function index()
	{
		$data['item'] = $this->slideshow_model->getslideshow();
		$data = array(
			'content'=>$this->load->view('content', $data, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	

	function create()
	{
		$data['title'] = "Create Slideshow";
		$data['content'] = array('action' => 'create');
 		$this->load->view('modal', $data);
	}

	function insert()
	{
		$image_slideshow = $_FILES['image']['name'];
		// Konfigurasi Upload Gambar	
		$config['file_name'] = $image_slideshow;
		$config['upload_path'] = './assets/content/image-slideshow/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['overwrite'] = 'TRUE';
		$config['max_size']	= '3024';
		$config['max_width']  = '1600';
		$config['max_height']  = '1200';

		// Memuat Library Upload File
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('image')){
			echo print_r($json = array('status'=>0, 'alert'=>$this->upload->display_errors()));
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			
			$get_name = $this->upload->data();
			$nama_file = $get_name['file_name'];

			$active = $this->input->post('active')?1:0;
			$data = array(
				'image' => $nama_file,
				'link_url' => $this->input->post('link_url'),
				'description' => strip_tags($this->input->post('description')),
				'active' => 1
			);
			$this->slideshow_model->add($data);
		}
	}

	function edit($id){
		$data['title'] = "Edit Slideshow";
		$data['model'] = $this->slideshow_model->edit($id);
		$data['content'] = array('action' => 'edit');
		$data['id'] = $id;
		$this->load->view('modal', $data);
	}

	function update()
	{
		$id = $this->input->post('id');
		$image_slideshow = $_FILES['image']['name'];
		// Konfigurasi Upload Gambar	
		$config['file_name'] = $image_slideshow;
		$config['upload_path'] = './assets/content/image-slideshow/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['overwrite'] = 'TRUE';
		$config['max_size']	= '3024';
		$config['max_width']  = '1600';
		$config['max_height']  = '1200';

		// Memuat Library Upload File
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('image')){
			$active = $this->input->post('active');
			if(!empty($active)){
				$active = "1";
			}else{
				$active = "0";
			}
			$data = array(
				'link_url' => $this->input->post('link_url'),
				'description' => strip_tags($this->input->post('description')),
				'active' => $active
			);
			//$this->slideshow_model->update($data,$id);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			
			$get_name = $this->upload->data();
			$nama_file = $get_name['file_name'];
			$active = $this->input->post('active');
			if(!empty($active)){
				$active = "1";
			}else{
				$active = "0";
			}
			$data = array(
				'image' => $nama_file,
				'link_url' => $this->input->post('link_url'),
				'description' => strip_tags($this->input->post('description')),
				'active' => $active
			);
			$this->slideshow_model->update($data,$id);
		}
	}
	
	function upload()
	{

	}
	
	function delete($id)
	{
	}
}