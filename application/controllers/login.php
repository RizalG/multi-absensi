<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
		$this->load->library('session');
 		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->auth = new stdClass;
		
		$this->load->library('ion_auth');
	}

	function index()
	{
		$this->load->view('login/login');
	}

	function login_proses()
	{
		$identity = $_POST['username'];
		$password = $_POST['password'];
		$remember_user = true;
		$group = 'admin';
		$group_id = $this->ion_auth->in_group($group);
	
		$syg = $this->ion_auth->login($identity, $password, $remember_user, $group_id);
		if($syg)
		{
			redirect('admin/welcome');
		}
		else
		{
			redirect('login');
		}
	}
}
