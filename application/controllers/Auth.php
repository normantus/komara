<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('nor_auth');
	}

	public function index()
	{
		$this->nor_auth->isLoggedIn();	//rubah yang ini biar ga looping
	}

	public function loginMe()
	{
		//$ip = $this->input->ip_address();
		$this->nor_auth->loginMe();
	}

	public function login()
	{
        if ($this->session->userdata ( 'isLoggedIn' )) {
          	redirect(base_url('dashboard'));
        } else {
			$this->nor_auth->view('system','login','Login', null); // view(folder, page, title, $data)  
        }
		
	}

	public function logout()
	{
		$this->nor_auth->logout();
	}

	public function forbidden()
	{
		if (!$this->session->userdata ( 'isLoggedIn' )) {
			redirect(base_url('login'));
	  } else {
			$this->nor_auth->view('system','forbidden','Forbidden', null); // view(folder, page, title, $data)  
	  }
	}
}
