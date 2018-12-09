<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	   
    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->library('nor_auth');
        //$this->nor_auth->hak_akses('CCTV');
        
    }
    
    /*
    function index() {
        if ($this->session->userdata('CCTV-STORE') == TRUE) {
            $this->dashboard_store();
        }elseif ($this->nor_auth->sub_modul('CCTV-ADMIN') == TRUE) {
            $this->dashboard_admin();
        }elseif ($this->nor_auth->sub_modul('CCTV-SUPPORT') == TRUE) {
            $this->dashboard_support();
        }elseif ($this->nor_auth->sub_modul('CCTV-AM') == TRUE) {
            $this->dashboard_am();
        }elseif ($this->nor_auth->sub_modul('CCTV-PURCHASING') == TRUE) {
            $this->dashboard_purchasing();
        }
    } */
    function index() {
        //$this->toastr->success('Sukses menambahkan data');
        if ($this->nor_auth->isStore()) {
            $kd_store = $this->session->userdata('kd_store');
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/store','v_dashboard_store','Dashboard', $data); // view(folder, page, title, $data)  
        }elseif($this->nor_auth->isOperator()) {
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/operator','v_dashboard_operator','Dashboard', $data); // view(folder, page, title, $data)  
        }elseif($this->nor_auth->isSupport()) {
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/support','v_dashboard_support','Dashboard', $data); // view(folder, page, title, $data)  
        }elseif($this->nor_auth->isArea()) {
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/area','v_dashboard_area','Dashboard', $data); // view(folder, page, title, $data)  
        }elseif($this->nor_auth->isAm()) {
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/am','v_dashboard_am','Dashboard', $data); // view(folder, page, title, $data)  
        }elseif($this->nor_auth->isPurchasing()) {
            $data['problem_cctv'] = $this->dashboard_model->get_record_problem_store($kd_store);
            $this->nor_auth->view('app/purchasing','v_dashboard_purchasing','Dashboard', $data); // view(folder, page, title, $data)  
        }else {
            //$this->session->set_flashdata('isForbidden', 'Maaf, Anda belum memiliki hak akses aplikasi ini, hubungi IT Support.');
            redirect(base_url('forbidden/true'));
        }
    }    
    
    //Function ajax request from form
    function ajax_list_problem_cctv_all_store() {
        $kd_store = $this->session->userdata('kd_store');
        //$this->session->userdata('kd_store');
        $data = $this->dashboard_model->get_problem_cctv_all_store($kd_store);
        echo ($data);
    }
    function ajax_list_problem_cctv_new_store() {
        $kd_store = $this->session->userdata('kd_store');
        //$this->session->userdata('kd_store');
        $data = $this->dashboard_model->get_problem_cctv_new_store($kd_store);
        echo ($data);
    }
    function ajax_list_problem_cctv_progress_store() {
        $kd_store = $this->session->userdata('kd_store');
        //$this->session->userdata('kd_store');
        $data = $this->dashboard_model->get_problem_cctv_progress_store($kd_store);
        echo ($data);
    }
    function ajax_list_problem_cctv_solve_store() {
        $kd_store = $this->session->userdata('kd_store');
        //$this->session->userdata('kd_store');
        $data = $this->dashboard_model->get_problem_cctv_solve_store($kd_store);
        echo ($data);
    }
    


    
}
?>