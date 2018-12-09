<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard_model extends CI_Model {
	
	

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}
	
	function get_record_problem_store($kd_store) {
		$query = $this->db->query("
		SELECT 
			A.KD_STORE, NVL(NEW,0)NEW, NVL(PROGRESS,0)PROGRESS, NVL(SOLVE,0)SOLVE, NVL(TOTAL,0)TOTAL 
		FROM
			(SELECT KD_STORE FROM AMU_STORE_T WHERE KD_STORE = '$kd_store')A,
			(SELECT KD_STORE, COUNT(DISTINCT(NO_PROBLEM))NEW FROM APP_TX_CCTV_PROBLEM_HDR
			WHERE FLAG = '0'
			GROUP BY KD_STORE)B,
			(SELECT KD_STORE, COUNT(DISTINCT(NO_PROBLEM))PROGRESS FROM APP_TX_CCTV_PROBLEM_HDR
			WHERE FLAG = '1'
			GROUP BY KD_STORE)C,
			(SELECT KD_STORE, COUNT(DISTINCT(NO_PROBLEM))SOLVE FROM APP_TX_CCTV_PROBLEM_HDR
			WHERE FLAG = '10'
			GROUP BY KD_STORE)D,
			(SELECT KD_STORE, COUNT(DISTINCT(NO_PROBLEM))TOTAL FROM APP_TX_CCTV_PROBLEM_HDR
			GROUP BY KD_STORE)E
		WHERE A.KD_STORE = B.KD_STORE(+)
		AND A.KD_STORE = C.KD_STORE(+)
		AND A.KD_STORE = D.KD_STORE(+)
		AND A.KD_STORE = E.KD_STORE(+)
		");
		return $query->result();
		//tambah logic untuk cek date_create dengan tgl sekarang, bila bulan nya berbeda, update month jd kode month skrng dan counter = 1
		$this->db->close();
	}

	function get_problem_cctv_all_store($kd_store) {
        $this->load->database('apps');
        $this->datatables->select("NO_PROBLEM, INPUT_DATE, APP_TX_CCTV_PROBLEM_HDR.KD_STORE AS KD_STORE, NAMA_STORE, APP_TX_CCTV_PROBLEM_HDR.STATUS, (CASE FLAG WHEN '0' THEN '<span class=''badge bg-danger''>New</span>' WHEN '1' THEN '<span class=''badge bg-warning''>Prog</span>' WHEN '10' THEN '<span class=''badge bg-success''>Solve</span>' END) AS STATUS_PROBLEM");
        $this->datatables->from('APP_TX_CCTV_PROBLEM_HDR');
        $this->datatables->join('AMU_STORE_T', 'AMU_STORE_T.KD_STORE = APP_TX_CCTV_PROBLEM_HDR.KD_STORE');
		$where = "APP_TX_CCTV_PROBLEM_HDR.KD_STORE = '$kd_store'";
        $this->datatables->where($where);
		$this->datatables->add_column('ACTION', '<a href="store/problem-detail/$1"><button type="button" class="btn btn-block btn-primary btn-sm">View Problem</button></a>'
        , 'NO_PROBLEM');
        return $this->datatables->generate();
        $this->db->close();
    }



















//belum di pakai


	function get_problem_cctv_new_store($kd_store) {
        $this->load->database('apps');
        $this->datatables->select("NO_PROBLEM, INPUT_DATE, APP_TX_CCTV_PROBLEM_HDR.KD_STORE AS KD_STORE, NAMA_STORE, 'NEW' AS STATUS");
        $this->datatables->from('APP_TX_CCTV_PROBLEM_HDR');
        $this->datatables->join('AMU_STORE_T', 'AMU_STORE_T.KD_STORE = APP_TX_CCTV_PROBLEM_HDR.KD_STORE');
        $where = "APP_TX_CCTV_PROBLEM_HDR.FLAG = '0' AND APP_TX_CCTV_PROBLEM_HDR.KD_STORE = '$kd_store'";
        $this->datatables->where($where);
        $this->datatables->add_column('ACTION', '
            <div class="btn-group">
                  <a class="btn btn-flat btn-default" href="cctv_problem/view_problem/$1">View Problem</a>
                  <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="cctv_problem/respon_problem/$1">Respon Problem</a></li>
                  </ul>
                </div>'
        , 'NO_PROBLEM');
        $this->datatables->add_column('STATUS_PROBLEM', '<span class="badge bg-red">New</span>');
        return $this->datatables->generate();
        $this->db->close();
    }

    function get_problem_cctv_progress_store($kd_store) {
        $this->load->database('apps');
        $this->datatables->select('NO_PROBLEM, INPUT_DATE, NO_SPK, APP_TX_CCTV_PROBLEM_HDR.KD_STORE AS KD_STORE, NAMA_STORE, APP_TX_CCTV_PROBLEM_HDR.FLAG AS STATUS');
        $this->datatables->from('APP_TX_CCTV_PROBLEM_HDR');
        $this->datatables->join('AMU_STORE_T', 'AMU_STORE_T.KD_STORE = APP_TX_CCTV_PROBLEM_HDR.KD_STORE');
		$where = "APP_TX_CCTV_PROBLEM_HDR.FLAG = '1' AND APP_TX_CCTV_PROBLEM_HDR.KD_STORE = '$kd_store'";
        $this->datatables->where($where);
        $this->datatables->add_column('ACTION', '
            <div class="btn-group">
                  <a class="btn btn-flat btn-default" href="cctv_problem/respon_problem/$1">Update Progress</a>
                  <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="cctv_problem/view_problem/$1">View Problem</a></li>
                    <li class="divider"></li>
                    <li><a href="cctv_problem/print_problem/$1" target="_blank"><i class="fa fa-print"></i> Print BAP</a></li>
                  </ul>
                </div>'
        , 'NO_PROBLEM');
        $this->datatables->add_column('STATUS_PROBLEM', '<span class="badge bg-yellow">Progress</span>');
        return $this->datatables->generate();
        $this->db->close();
    }

    function get_problem_cctv_solve_store($kd_store) {
        $this->load->database('apps');
        $this->datatables->select('NO_PROBLEM, INPUT_DATE, NO_SPK, APP_TX_CCTV_PROBLEM_HDR.KD_STORE AS KD_STORE, NAMA_STORE, APP_TX_CCTV_PROBLEM_HDR.FLAG AS STATUS');
        $this->datatables->from('APP_TX_CCTV_PROBLEM_HDR');
        $this->datatables->join('AMU_STORE_T', 'AMU_STORE_T.KD_STORE = APP_TX_CCTV_PROBLEM_HDR.KD_STORE');
		$where = "APP_TX_CCTV_PROBLEM_HDR.FLAG = '10' AND APP_TX_CCTV_PROBLEM_HDR.KD_STORE = '$kd_store'";
        $this->datatables->where($where);
        $this->datatables->add_column('ACTION', '
            <div class="btn-group">
                  <a class="btn btn-flat btn-default" href="cctv_problem/view_problem/$1">View Problem</a>
                  <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="cctv_problem/print_problem/$1" target="_blank"><i class="fa fa-print"></i>Print BAP</a></li>
                  </ul>
                </div>'
        , 'NO_PROBLEM');
        $this->datatables->add_column('STATUS_PROBLEM', '<span class="badge bg-green">Solve</span>');
        return $this->datatables->generate();
        $this->db->close();
    }


}