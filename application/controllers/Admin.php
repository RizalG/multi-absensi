<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
		$this->load->library('session');
 		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->auth = new stdClass;
		
		$this->load->library('ion_auth');
		//$this->load->model('news_model');
		$this->load->library('uuid');
	}

	function welcome()
	{
		$syg = $this->ion_auth->is_admin();

		if($syg)
		{
			echo "This Page Admin (UnderConstruction)";
			//$this->load->view('Admin/page_admin.html');
		}
		else
		{
			redirect('admin/login');
		}
	}

	function logout()
	{
		$this->ion_auth->logout(TRUE);
		redirect('welcome/index');
	}

	/*function load_news()
	{
		if($this->ion_auth->is_admin())
		{
			$data = $this->news_model->get_news();
			$this->load->view('Admin/news/load_data_news.html', array('data' => $data));
		}
		else
		{
			redirect('admin/login');
		}
	}

	function news()
	{
		if ($this->ion_auth->is_admin())
		{
			$this->load->view('Admin/news/form_add_news.html');
		}
		else
		{
			redirect('admin/login');
		}
	}
	
	function insert_news()
	{
		if($this->ion_auth->is_admin())
		{
			$config['upload_path']          = './assets/images';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = '5000';
            $config['max_width']            = '3000';
            $config['max_height']           = '3000';

            $this->load->library('upload', $config);
            
            if($this->upload->do_upload())
            {
            	$user = $this->ion_auth->user()->row();
            	$id_news = $_POST['id_news'];
            	$title = $_POST['title'];
            	$content = $_POST['content'];
            	$date_created = date('Y-m-d H:i:s');
            	$tags = $_POST['tags'];
            	$meta_key = $_POST['meta_key'];
            	$meta_data = $_POST['meta_data'];
            	$id_category = $this->uuid->v5(date('Y-m-d H:i:s'));
            	$created_by = $user->username;
            	$publish = $_POST['publish'];
            	$userfile = $this->upload->file_name;

	 			$data_news = array(
	 					'id_news' => $id_news,
	 					'title' => $title,
	 					'content' => $content,
	 					'date_created' => $date_created,
	 					'tags' => $tags,
	 					'meta_key' => $meta_key,
	 					'meta_data' => $meta_data,
	 					'id_category' => $id_category,
	 					'created_by' =>$created_by,
	 					'publish' => $publish,
	 					'nama_gambar' => $userfile
	 			);
	 			$syg = $this->news_model->insert_news($data_news);
	 			if($syg)
	 			{
	 				redirect('admin/load_news');
	 			}
        	}
        	else
        	{
        		echo "Error Babi";
        	}
        }	  
        else
        {
        	redirect('admin/login');
        }  	
    }	

	function update_news()
	{
		if($this->ion_auth->is_admin())
		{	
			$id_news = $this->uri->segment(2);
			if ($this->uri->segment(3) === False)
			{
				$id_news = 0;
			}
			else
			{
				$id_news = $this->uri->segment(3);
			}
			// echo $id_pricing;
			$data ['news'] = $this->news_model->get_news_by_id($id_news);
			$this->load->view('Admin/news/form_edit_news.html', $data);
	
		}
		else
		{
			redirect('admin/login');
		}	
	}
	
	function update_news_process()
	{
		if($this->ion_auth->is_admin())
		{	
			
			$user = $this->ion_auth->user()->row();	
			$data_update = array(
		 		'date_created' => date('Y-m-d H:i:s'),
		 		'title' => $this->input->post('title'),
		 		'content' => $this->input->post('content'),
		 		'tags' => $this->input->post('tags'),
		 		'meta_key' => $this->input->post('meta_key'),
		 		'meta_data' => $this->input->post('meta_data'),
		 		'created_by' => $user->username,
		 		'id_category' => $this->uuid->v5(date('Y-m-d H:i:s')),
		 		'publish' => $this->input->post('publish')
				);		
			$id_news = $this->input->post('id_news');	
			$syg = $this->news_model->update_news($id_news, $data_update);

			if($syg)
			{
				redirect('admin/load_news');
			}
			else
			{
			echo"<h3>Update Data Gagal !!</h3>";
			}
		}
	}	
	
	function delete_news()
	{
		if($this->ion_auth->is_admin())
		{
			$id_news = $this->uri->segment(3);
		        $this->news_model->delete_news($id_news);
		        redirect('admin/load_news');
		}
		else
		{
			redirect('admin/login');
		}
	}*/
}
