<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('nor_auth');
		$this->load->model('cctv_model');
		if(!$this->nor_auth->isStore()) {
			redirect(base_url('dashboard'));
		}
	}
	
	function index() {
		redirect(base_url('dashboard'));
	}

	public function input() // New Problem
	{
		//$data['list_toko'] = $this->cctv_model->get_faktur();
		//$data['list_it_store'] = $this->cctv_model->get_list_it_store();
		$this->nor_auth->view('app/store','v_problem_new','Tambah Data Kerusakan CCTV', NULL); // view(folder, page, title, $data)	
	}

	public function detail($id) // Detail Problem
    {
        $data['detail_problem'] = $this->cctv_model->get_detail_problem_cctv($id);
        $this->nor_auth->view('app/store','v_problem_detail','Review Problem CCTV', $data); // view(folder, page, title, $data)  
    }

	
	
	
	
	// fungsi request data JSON
	function ajax_get_faktur()
    {
        $data = $this->cctv_model->get_faktur();
        echo json_encode($data);
	}
	
	function ajax_list_toko()
    {
        //header('Content-Type: application/json');
        echo $this->cctv_model->get_list_toko();
        //$data = $this->cctv_model->get_list_toko();
        //echo json_encode($data);
	}
	
	function ajax_detail_toko($id)
    {
        $data = $this->cctv_model->get_toko_by_id($id);
        echo json_encode($data);
	}
	
	public function ajax_save_problem()
    {
        //echo $this->input->post('kode_toko');
        $this->load->model('cctv_model');
		$this->cctv_model->save_cctv_problem();
		$this->toastr->success('Sukses menambahkan data.'); 
		echo json_encode(array("status" => TRUE));        
	}
	
	//function toastr() {
		//$this->toastr->success('Your account was created successfully');
		
		//$this->toastr->warning('Email is required');
		//$this->toastr->error('Error in creating account');
		//$this->nor_auth->view('app/store','flash','Flash', NULL); // view(folder, page, title, $data)	
		//$this->load->view('app/store/flash');
	//}
}