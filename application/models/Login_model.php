<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Login_model extends CI_Model{

	function validasi() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

   		$query = $this->db->query(
			"SELECT * FROM ms_admin
			WHERE nik = '$username'
			AND password = md5('$password')"
   		);
   		if($query -> num_rows() > 0) {
			return $query->result();
   		}
   		else {
			 return false;
   		}
   		
	 }
	 
	 function get_user_store($nik) {

   		$query = $this->db->query(
			"SELECT MSP_UU_CODE AS KD_STORE FROM MS_PEGAWAI
			WHERE MSP_UU_PARENT = 'BZ01' 
			AND MSP_KODE = '$nik'
			AND MSP_AKTIF = 'Y'"
   		);
   		if($query -> num_rows() > 0) {
			return $query->result();
   		}
   		else {
			 return false;
   		}
   		
	 }

	 function get_user_role($nik) {

		$query = $this->db->query(
		 "SELECT * FROM ms_admin_role
		 WHERE NIK = '$nik'"
		);
		if($query -> num_rows() > 0) {
		 return $query->result();
		}
		else {
		  return false;
		}
		
  }
	 
	function last_login() {
		$username = $this->input->post('username');
		
   		$query = $this->db->query(
   			"UPDATE ms_admin SET last_login = SYSDATE WHERE nik = '$username' AND active = true"
   		);
   		
   		//$attempts = $this->db->query(
   		//	"INSERT INTO log_login_attempts(ip_address, login, date, time) VALUES('$ip', '$username', CURDATE(), CURTIME())"
   		//);
   		
 	} 	

	/*
	 function total_record() {
		$query=$this->db->query(
			"SELECT NIK, PASSWORD, HAK 
   			FROM SAT_B_USER_T INNER JOIN HAK_OPERASI ON USER.HAK = HAK_OPERASI.HAK"
   		);
		return $query->num_rows();
		
	}
	
	function get_record() {
		$query=$this->db->query(
			"SELECT *
   			FROM SAT_B_USER_T"
		);
		if($query->num_rows()>=0){
			return $query->result();
		}
		
	}

	function get_nik() {
		$query=$this->db->query(
			"SELECT NIK FROM KARYAWAN"
		);
		if($query->num_rows()>=0){
			return $query->result();
		}
		
	}

	public function detail_record($id)
	{
		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$id'");
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		
	}

	function insert_record()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nik = $this->input->post('nik');
		$hak = $this->input->post('hak');

		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$username'");
		if (!$query->num_rows()) {
			
			$insert = $this->db->query(
				"INSERT INTO USER (
					USERNAME, 
					PASSWORD, 
					NIK, 
					HAK)
				VALUES (
					'$username',
					'$password',
					'$nik',
					'$hak')"
			);

			if ($insert) {
				return true;
			}
				
			else {

			echo 'Tidak dapat menambahkan data';
			
			}
			
		}

		else {
			echo 'NIK sudah ada!';
		}
		
	}

	function update_record()
	{
		$id_param = $this->input->post('id_param');
		$username = $this->input->post('username');
		$nik = $this->input->post('nik');
		$hak = $this->input->post('hak');

		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$id_param'");
		if ($query->num_rows()) {
			
			$insert = $this->db->query(
				"UPDATE
					USER
				SET
					USERNAME = '$username', 
					NIK = '$nik',
					HAK = '$hak'
				WHERE
					USERNAME = '$id_param'"
			);

			if ($insert) {
				return true;
			}
				
			else {

			echo 'Tidak dapat merubah data';
			
			}
			
		}

		else {
			echo 'Username tidak ditemukan!';
		}
		
	}

	function update_record_hak_operasi()
	{
		$id_param = $this->input->post('id_param');
		$hak = $this->input->post('hak_operasi');

		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$id_param'");
		if ($query->num_rows()>0) {
			
			$update = $this->db->query(
				"UPDATE 
					USER
				SET 
					HAK = '$hak'
				WHERE 
					USERNAME = '$id_param'"
			);

			if ($update) {
				return true;

			}
				
			else {

			echo 'Tidak dapat merubah data!';
			
			}
			
		}

		else {
			echo 'Data user tidak ditemukan!';
		}
		
	}

	function delete_record($id)
	{
		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$id'");
		if ($query->num_rows()>0) {
			$delete = $this->db->query("DELETE FROM USER WHERE USERNAME = '$id'");
			if ($delete) {
				return true;
			}
				
			else {

			echo 'Tidak dapat menghapus data!';
			
			}
			
		}

		else {
			echo 'Data user tidak ditemukan!';
		}
			
	}	

	function ganti_password() {
		
		$username = $this->input->post('id_param');
		$password_baru = md5($this->input->post('password_baru'));
	
		$query = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$username' LIMIT 1");
		
		if ($query->num_rows = 1) {
			$ganti = $this->db->query("UPDATE USER SET PASSWORD = '$password_baru' WHERE USERNAME = '$username'");
			return true;
		}
		else
		{
			echo "gagal";
		}
		
	}
	*/
}