<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 /*
  * Simple Login Libraries
  * Class ini digunakan untuk fitur login, proteksi halaman dan logout
  * @author  Norman Nurbahar
  * @url    https://normantus.com
  */
 
 class Nor_auth {
 
     // SET SUPER GLOBAL
     var $ci = NULL;
     var $app_name = "komara_app";
 
     /**
      * Class constructor
      *
      * @return   void
      */
     public function __construct() {
         $this->ci =& get_instance();
         $this->ci->load->helper(array('cookie','url'));
         $this->ci->load->library(array('session'));
         $this->ci->load->model('login_model');
         
     }
 
     /*
     * cek username dan password pada table users, jika ada set session berdasar data user dari
     * table users.
     * @param string username dari input form
     * @param string password dari input form
     */
     
      function isLoggedIn() {
        $isLoggedIn = $this->ci->session->userdata ( 'isLoggedIn' );
        
        if ($isLoggedIn == $this->app_name) {
          redirect(base_url('dashboard'));
        } else {
          redirect(base_url('login'));
        }
      }

     public function status_login() {
    	// disini untuk memvalidasi username sudah login apa belum jika sudah validasi juga hak aksesnya apa..
  		if ($this->ci->session->userdata('status_login') !== $this->app_name)
  		{
        redirect(base_url('auth/logon'), 'refresh');
        //$this->view('system','login','Login', NULL); // view(folder, page, title, $data)
  		}
  		elseif ($this->ci->session->userdata('status_login') == $this->app_name)
  		{
        $url = 'dashboard';
        redirect(base_url($url), 'refresh');
        //$this->view('app','dashboard','Dashboard', NULL); // view(folder, page, title, $data)	
  		}

     }

     function loginMe() {
      $this->ci->load->database();
      $result = $this->ci->login_model->validasi();
      
		 
   		if($result) {
     		foreach($result as $session) {
  				$sess_data['isLoggedIn'] = 'komara_app';
  				$sess_data['nik'] = $session->nik;
  				$sess_data['first_name'] = $session->first_name;
  				$sess_data['last_name'] = $session->last_name;
          $sess_data['position'] = $session->jabatan;
  				$sess_data['photo'] = $session->photo;
          $sess_data['last_login'] = $session->last_login;
          $sess_data['pin'] = $session->pin;
  				$this->ci->session->set_userdata($sess_data);
			  }
        
        //$user_access = $this->ci->login_model->get_user_access();
        //foreach($user_access as $modul) {
          //$sess_data['role'] = $modul->USER_AKSES;
          //$this->ci->session->set_userdata($sess_data);
        //}
        $this->get_user_role();        
        redirect('dashboard');     		
   		}
   		else {
        $this->ci->session->set_flashdata('result_login', 'Maaf, Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
   		}
   	}
 
     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
    
      function get_user_role() {
        $this->ci->load->database('apps');
        $result = $this->ci->login_model->get_user_role($this->ci->session->userdata('nik'));
		 
        if($result) {
          foreach($result as $session) {
            $sess_data['role'] = $session->ROLE;
            $this->ci->session->set_userdata($sess_data);
          }
        }
        return;
      }
      
     
      public function logout() {
        $this->ci->session->sess_destroy();
        //$this->ci->login_model->last_login();  //di skip dulu belum benar.
        redirect(base_url());
     }
 
    public function view($folder, $page, $title, $data) {
  		$data['title'] = $title;
  		$this->ci->load->view('layout/header', $data);
  		$this->ci->load->view('layout/navbar');
  		$this->ci->load->view($folder.'/'. $page, $data);
  		$this->ci->load->view('layout/footer');
     }

    function isLoginStatus() {
      $isLoginStatus = $this->ci->session->userdata ( 'isLoggedIn' );
        
        if ($isLoginStatus == $this->app_name) {
          return true;
        } else {
          redirect(base_url('login'));
        }
    }
    function isTeller() {
      if ($this->isLoginStatus() && strpos($this->ci->session->userdata('role'), 'TELLER') !== false) {
        return true;
      } else {
        return false;
      }
    }

    function isOperator() {
      if ($this->isLoginStatus() && $this->ci->session->userdata('role') == 'OPERATOR') {
        return true;
      } else {
        return false;
      }
    }

    function isSupport() {
      if ($this->isLoginStatus() && $this->ci->session->userdata('role') == 'SUPPORT') {
        return true;
      } else {
        return false;
      }
    }

    function isArea() {
      if ($this->isLoginStatus() && $this->ci->session->userdata('role') == 'AREA') {
        return true;
      } else {
        return false;
      }
    }

    function isAm() {
      if ($this->isLoginStatus() && $this->ci->session->userdata('role') == 'AM') {
        return true;
      } else {
        return false;
      }
    }

    function isPurchasing() {
      if ($this->isLoginStatus() && $this->ci->session->userdata('role') == 'PURCHASING') {
        return true;
      } else {
        return false;
      }
    }

 }