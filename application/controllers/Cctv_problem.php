<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cctv_problem extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('nor_auth');
        $this->nor_auth->hak_akses('CCTV');
	}

    public function cek_faktur() {
        $this->load->model('cctv_model');
        echo $this->cctv_model->cek_faktur();
    }

	public function input_problem()
	{
		$this->load->model('cctv_model');
		$data['list_toko'] = $this->cctv_model->get_faktur();
		//$data['list_it_store'] = $this->cctv_model->get_list_it_store();
		$this->nor_auth->view('app/CCTV','cctv_problem_new_view','Tambah Data Kerusakan CCTV', $data); // view(folder, page, title, $data)	
	}

	function ajax_list_toko()
    {
        //header('Content-Type: application/json');
        $this->load->model('cctv_model');
        echo $this->cctv_model->get_list_toko();
        //$data = $this->cctv_model->get_list_toko();
        //echo json_encode($data);
    }

    function ajax_list_it_store()
    {
        //header('Content-Type: application/json');
        $this->load->model('cctv_model');
        echo $this->cctv_model->get_list_it_store();
        //$data = $this->cctv_model->get_list_toko();
        //echo json_encode($data);
    }

	function ajax_detail_toko($id)
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_toko_by_id($id);
        echo json_encode($data);
    }


    public function ajax_detail_it_store($id)
	{
		$this->load->model('cctv_model');
		$data = $this->cctv_model->get_by_nik_it_store($id);
		echo json_encode($data);
	}

    public function save_cctv_problem()
    {
        //echo $this->input->post('kode_toko');
        $this->load->model('cctv_model');
        $this->cctv_model->save_cctv_problem();
        echo json_encode(array("status" => TRUE));
    }

    public function update_cctv_problem()
    {
        $this->load->model('cctv_model');

        $id = $this->input->post('no_problem');
        $data['no_spk'] = $this->input->post('no_spk');
        $data['tgl_pemeriksaan'] = $this->input->post('tgl_pemeriksaan');
        $data['pemeriksaan_it'] = $this->input->post('pemeriksaan_it');
        $data['nik_pic_it'] = $this->input->post('nik_pic_it');
        $data['nama_pic_it'] = $this->input->post('nama_pic_it');
        $data['tgl_kirim_vendor'] = $this->input->post('tgl_kirim_vendor');
        $data['dvr_toggle'] = $this->input->post('dvr_toggle');
        $data['adaptor_toggle'] = $this->input->post('adaptor_toggle');
        $data['cabel_toggle'] = $this->input->post('cabel_toggle');
        $data['cam_indor_toggle'] = $this->input->post('cam_indor_toggle');
        $data['cam_outdor_toggle'] = $this->input->post('cam_outdor_toggle');
        $data['hdd_toggle'] = $this->input->post('hdd_toggle');
        $data['lcd_toggle'] = $this->input->post('lcd_toggle');
        $data['dvr_info'] = $this->input->post('dvr');
        $data['adaptor_info'] = $this->input->post('adaptor');
        $data['cabel_info'] = $this->input->post('cabel');
        $data['cam_indor_info'] = $this->input->post('cam_indor');
        $data['cam_outdor_info'] = $this->input->post('cam_outdor');
        $data['hdd_info'] = $this->input->post('hdd');
        $data['lcd_info'] = $this->input->post('lcd');
        $data['special_reason_info'] = $this->input->post('special_reason');

        $data['ts_dvr_ganti'] = $this->input->post('ts_dvr_ganti');
        $data['ts_adaptor_ganti'] = $this->input->post('ts_adaptor_ganti');
        $data['ts_cabel_ganti'] = $this->input->post('ts_cabel_ganti');
        $data['ts_cam_indor_ganti'] = $this->input->post('ts_cam_indor_ganti');
        $data['ts_cam_outdor_ganti'] = $this->input->post('ts_cam_outdor_ganti');
        $data['ts_hdd_ganti'] = $this->input->post('ts_hdd_ganti');
        $data['ts_lcd_ganti'] = $this->input->post('ts_lcd_ganti');
        $data['ts_dvr_perbaikan'] = $this->input->post('ts_dvr_perbaikan');
        $data['ts_adaptor_perbaikan'] = $this->input->post('ts_adaptor_perbaikan');
        $data['ts_cabel_perbaikan'] = $this->input->post('ts_cabel_perbaikan');
        $data['ts_cam_indor_perbaikan'] = $this->input->post('ts_cam_indor_perbaikan');
        $data['ts_cam_outdor_perbaikan'] = $this->input->post('ts_cam_outdor_perbaikan');
        $data['ts_hdd_perbaikan'] = $this->input->post('ts_hdd_perbaikan');
        $data['ts_lcd_perbaikan'] = $this->input->post('ts_lcd_perbaikan');
        

        $this->cctv_model->update_cctv_problem($id, $data);
        echo json_encode(array("status" => TRUE));
    }  

    public function solve_cctv_problem()
    {
        $this->load->model('cctv_model');
        //$this->cctv_model->update_cctv_problem();
        $id = $this->input->post('no_problem');

        $this->cctv_model->solve_cctv_problem($id);
        echo json_encode(array("status" => TRUE));
    }  

    public function respon_problem($id)
    {
        $this->load->model('cctv_model');
        $data['detail_problem'] = $this->cctv_model->get_detail_problem_cctv($id);
        $this->nor_auth->view('app/CCTV','cctv_problem_respon_view','Respon Problem CCTV', $data); // view(folder, page, title, $data)  
    }

    public function detail($id)
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_detail_problem_cctv($id);
        foreach ($data as $data) {
            echo $data->DVR_STATUS;
        };

    }

    public function view_problem($id)
    {
        $this->load->model('cctv_model');
        $data['detail_problem'] = $this->cctv_model->get_detail_problem_cctv($id);
        $this->nor_auth->view('app/CCTV','cctv_problem_review_view','Review Problem CCTV', $data); // view(folder, page, title, $data)  
    }

     public function ajax_list_problem_cctv_all()
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_problem_cctv_all();
        echo ($data);
    }

    public function ajax_list_problem_cctv_new()
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_problem_cctv_new();
        echo ($data);
    }

    public function ajax_list_problem_cctv_progress()
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_problem_cctv_progress();
        echo ($data);
    }

    public function ajax_list_problem_cctv_solve()
    {
        $this->load->model('cctv_model');
        $data = $this->cctv_model->get_problem_cctv_solve();
        echo ($data);
    }

    public function laporan_pdf($htmlcontent, $for_upload = false, $new_file = null){
        include APPPATH."third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf/Dompdf();
    }

    public function print_problem($id)
    {
        $this->load->library('pdf');
        $this->load->model('cctv_model');
        $data['detail_problem'] = $this->cctv_model->get_detail_problem_cctv($id);
        $html = $this->load->view('app/cctv/cctv_report_bap_view', $data, true);
        $filename = 'BAP_'.$id;
        $this->pdf->generate($html, $filename, true, 'A4', 'portrait'); 
    }

    public function test()
    {
        $this->load->view('laporan_pdf');
    }














    public function test123()
    {
        //echo $this->input->post('kode_toko');
        //$this->load->model('cctv_model');
        //$this->cctv_model->test();
        //echo json_encode(array("status" => TRUE));
        $time = strtotime('23/10/2003');

        $newformat = date('d-m-Y', '25-10-2018');

        echo $newformat;
        // 2003-10-16
    }

    public function counter()
    {
        //echo $this->input->post('kode_toko');
        $this->load->model('cctv_model');
        $this->cctv_model->counter();
        //echo json_encode(array("status" => TRUE));

    }

    public function test_page()
    {
        //$data['list_it_store'] = $this->cctv_model->get_list_it_store();
        $this->nor_auth->view('app/CCTV','test','Tambah Data Kerusakan CCTV', NULL); // view(folder, page, title, $data)  
    }


//		$data['id'] = $this->uri->segment(4);
//		$data['data_detail'] = $this->ms_monitor_model->detail_record($data['id']);
//		
//		// set output yang dihasilkan
//		$data['folder'] = 'private/ms_inv/ms_monitor';
  //      $data['pages'] = 'ms_monitor_detail';
    //    $data['title'] = 'Detail Master Monitor | '.ucfirst($this->session->userdata('user'));
      //  $this->load->view('layout/layout',$data);
		
	
}
