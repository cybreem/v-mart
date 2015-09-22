<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
        $this->load->model('admin_model');
        // if(!$this->session->userdata('logged_in'))
        // {
            // show_404();
        // }
    }
	
	/* Login Modal */
    
	function index()
	{
		if(!$this->session->userdata('logged_in'))
        {
            redirect('auth/');  
        }
        else
        {
		$item = "";
		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
        }
	}
	
	function gallery()
	{
		$item['data'] = $this->admin_model->select_article();
		$data = array(
			'content'=>$this->load->view('gallery', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	
	
	function add()
	{
		
		$config['upload_path'] = './assets/thumbnail/';
		$config['allowed_types'] = '*';
		$config['file_name'] = $this->input->post('file');
        $config['overwrite'] = 'TRUE';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$json = array('status' => 'error');
		}
		else{
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$upload_data = $this->upload->data();
			$image = $upload_data['file_name'];
			$data = array('id' => "",
						  'title' => $title,
						  'content' => $content,
						  'image' => $image,
						  'author' => $this->session->userdata('id'),
						  'date' => date("Y-m-d")
			);
			$this->admin_model->add($data);
			$json = array('status' => 'success','default' => config_item('assets')."thumbnail/default-image.png");
		}
		echo json_encode($json);
	}
	
	function edit($id = false)
	{
		$item['data'] = $this->admin_model->select_edit($id);
		$data = array(
			'content'=>$this->load->view('edit', $item, TRUE),
			'script'=>$this->load->view('edit_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	
	function update($id)
	{
		
		$config['upload_path'] = './assets/thumbnail/';
		$config['allowed_types'] = '*';
		$config['file_name'] = $this->input->post('file');
        $config['overwrite'] = 'TRUE';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$data = array('title' => $title,
						  'content' => $content,
						  'author' => $this->session->userdata('id'),
						  'date' => date("Y-m-d")
			);
			$this->admin_model->update($data,$id);
			$json = array('status' => 'success','default' => config_item('assets')."thumbnail/default-image.png");
		}
		else{
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$upload_data = $this->upload->data();
			$image = $upload_data['file_name'];
			$data = array('title' => $title,
						  'content' => $content,
						  'image' => $image,
						  'author' => $this->session->userdata('id'),
						  'date' => date("Y-m-d")
			);
			$this->admin_model->update($data,$id);
			$json = array('status' => 'success','default' => config_item('assets')."thumbnail/default-image.png");
		}
		echo json_encode($json);
	}
	
	function upload()
	{
		$config['upload_path'] = './assets/thumbnail/';
		$config['allowed_types'] = '*';
		$config['file_name'] = $this->input->post('file');
        $config['overwrite'] = 'TRUE';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$json = $this->upload->display_errors();
		}
		else{
			$json = array_merge($this->upload->data(),array('url' => base_url()."assets/thumbnail/"));
		}
		echo json_encode($json);
	}
	
	function delete($id)
	{
		$this->admin_model->delete($id);
        redirect('admin/gallery');  
	}
}