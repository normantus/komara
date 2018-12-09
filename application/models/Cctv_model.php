<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cctv_model extends CI_Model {

	function __construct()
  {
    parent::__construct();  

  }

  function get_faktur() {
    $this->load->database('apps');
    $this->cek_faktur();
    $query = $this->db->query("
      SELECT HEADER||MONTH||'-'||COUNTER AS FAKTUR FROM APP_TX_FAKTUR WHERE FAKTUR_ID = 'CCTV'     
    ");
    return $query->row();
    //tambah logic untuk cek date_create dengan tgl sekarang, bila bulan nya berbeda, update month jd kode month skrng dan counter = 1
    $this->db->close();
  }

  function cek_faktur() {
    $this->load->database('apps');
    $query = $this->db->query("
      SELECT
        CASE TO_CHAR(TRUNC(SYSDATE),'mm') 
            WHEN '01' THEN 'A'
            WHEN '02' THEN 'B'
            WHEN '03' THEN 'C'
            WHEN '04' THEN 'D'
            WHEN '05' THEN 'E'
            WHEN '06' THEN 'F'
            WHEN '07' THEN 'G'
            WHEN '08' THEN 'H'
            WHEN '09' THEN 'I'
            WHEN '10' THEN 'J'
            WHEN '11' THEN 'K'
            WHEN '12' THEN 'L'
        END||TO_CHAR(TRUNC(SYSDATE),'yy') NOW, MONTH LAST
      FROM APP_TX_FAKTUR WHERE FAKTUR_ID = 'CCTV'
    ");
    $data = $query->result();
    $now = $data[0]->NOW;
    $last = $data[0]->LAST;
    if ($now <> $last) {
      $query = $this->db->query("UPDATE APP_TX_FAKTUR SET MONTH = '$now', COUNTER = '0001' WHERE FAKTUR_ID = 'CCTV'");
      //echo $data[0]->NOW;
      return;
    } else {
      return;
    }

  }
  


  function get_record_problem() {
    $this->load->database('apps');
    $query = $this->db->query("
      SELECT * FROM
        (SELECT COUNT(DISTINCT(NO_PROBLEM))NEW FROM APP_TX_CCTV_PROBLEM_HDR
        WHERE FLAG = '0')A,
        (SELECT COUNT(DISTINCT(NO_PROBLEM))PROGRESS FROM APP_TX_CCTV_PROBLEM_HDR
        WHERE FLAG = '1')B,
        (SELECT COUNT(DISTINCT(NO_PROBLEM))SOLVE FROM APP_TX_CCTV_PROBLEM_HDR
        WHERE FLAG = '10')C,
        (SELECT COUNT(DISTINCT(NO_PROBLEM))TOTAL FROM APP_TX_CCTV_PROBLEM_HDR)D
    ");
    return $query->result();
    //tambah logic untuk cek date_create dengan tgl sekarang, bila bulan nya berbeda, update month jd kode month skrng dan counter = 1
    $this->db->close();
  }


  

	
  function get_list_toko() {
    $this->load->database('ims');
    $this->datatables->select('KD_STORE, NAMA_STORE');
    $this->datatables->from('AMU_STORE_T');
    //$where = array('AKTIF' => 'T', 'DC' => 'FALSE', 'FLAG <>' => 'Z');
    $where = "AKTIF = 'T' AND DC = 'FALSE' AND STATUS <> 'Z'";
    $this->datatables->where($where);
    return $this->datatables->generate();
    $this->db->close();
  }

  function get_list_it_store() {
    $this->load->database('acc');
    $this->datatables->select('MSP_KODE NIK, MSP_KETERANGAN NAMA');
    $this->datatables->from('MS_PEGAWAI');
    $where = "MSP_UU_CODE = 'BZ01' AND MSP_MSCC_KODE = 'C030' AND MSP_JABATAN = 'Store Support' AND MSP_AKTIF = 'Y'";
    $this->datatables->where($where);
    return $this->datatables->generate();
    $this->db->close();
  }

	function get_toko_by_id($id)
    {
        $this->load->database('ims');
        $query = $this->db->query("
        	SELECT 
              A.KD_STORE KODE_TOKO, A.NAMA_STORE NAMA_TOKO, UPPER(ALAMAT) AS ALAMAT, STATUS, C.TELP, JARAK, to_char(TGL_GO,'dd-Mon-yyyy')TGL_GO, ORG_AREA_MANAGER_NIK AS AM_NIK, UPPER(AM.AUM_NAMA) AS AM_NAMA, ORG_AREA_COORDINATOR_NIK AS AC_NIK, UPPER(AC.AUM_NAMA) AS AC_NAMA
          FROM
              (SELECT KD_STORE, NAMA_STORE, DECODE(STATUS,'T','REGULER','FRANCHISE')STATUS, TELPS TELP  FROM AMU_STORE_T WHERE AKTIF = 'T' AND DC = 'FALSE')A,
              (SELECT KD_STORE, JARAK FROM AMU_JARAK_DC_TOKO_T@DCS)B,
              (SELECT KD_STORE, ALAMAT1||' '||ALAMAT2||' '||ALAMAT3 ALAMAT, TGL_BUKA TGL_GO, TELP, ORG_AREA_MANAGER_NIK, ORG_AREA_COORDINATOR_NIK FROM AMU_STORES_T WHERE KD_BRANCH = 'BZ01' AND STATUS_AKTIF = 'Y')C,
              (SELECT * FROM AMU_USER_MAX_T)AM,
              (SELECT * FROM AMU_USER_MAX_T)AC
          WHERE
              A.KD_STORE = B.KD_STORE(+)
              AND A.KD_STORE = C.KD_STORE
              AND A.KD_STORE = '$id'
              AND AM.AUM_NIP = ORG_AREA_MANAGER_NIK
              AND AC.AUM_NIP = ORG_AREA_COORDINATOR_NIK");
        if($query->num_rows()>0){
			return $query->row();
		} 
		else {
			return false;
		}
    $this->db->close();
    
    }

    function get_by_nik_it_store($id)
    {
      $this->load->database('acc');
      $query = $this->db->query("
        SELECT MSP_KODE NIK, MSP_KETERANGAN NAMA FROM MS_PEGAWAI
        WHERE MSP_UU_CODE = 'BZ01'
        AND MSP_MSCC_KODE = 'C030'
        AND MSP_JABATAN = 'Store Support'
        AND MSP_AKTIF = 'Y'
        AND MSP_KODE = '$id'"
      // C3306 = IT OFFICE, C3307 = IT STORE, C3305 = ASCORD STORE, C3304 = ASCORD OFFICE, C3303 = COORDINATOR, C3326 = ADMIN, C3301 = MANAGER IT
    );
        if($query->num_rows()>0){
      return $query->row();
    } 
    else {
      return false;
    }
    $this->db->close();
    
    }


    

    function get_detail_problem_cctv($id) {
        $this->load->database('apps');
        $query = $this->db->query("
            SELECT 
              PROBLEM.KD_STORE KD_STORE, STORE.NAMA_STORE NAMA_STORE, UPPER(ALAMAT) AS ALAMAT, STORE.STATUS, STORE_DTL.TELP, JARAK,
              (SELECT TO_CHAR(MAX(SERVICE_DATE),'dd-Mon-yyyy') FROM APP_TX_CCTV_PROBLEM_HDR WHERE APP_TX_CCTV_PROBLEM_HDR.SERVICE_DATE < PROBLEM.INPUT_DATE)LAST_SERVICE_DATE, 
              TO_CHAR(TGL_GO,'dd-Mon-yyyy')TGL_GO, ORG_AREA_MANAGER_NIK AS AM_NIK, UPPER(AM.AUM_NAMA) AS AM_NAMA, ORG_AREA_COORDINATOR_NIK AS AC_NIK, 
              UPPER(AC.AUM_NAMA) AS AC_NAMA, PROBLEM.NO_PROBLEM,  NO_SPK, TO_CHAR(INPUT_DATE,'dd-Mon-yyyy')INPUT_DATE, TO_CHAR(SERVICE_DATE,'dd-mm-yyyy')SERVICE_DATE, TO_CHAR(DAMAGE_DATE,'dd-mm-yyyy')DAMAGE_DATE, DAMAGE_INFO, TO_CHAR(INSPECT_DATE,'dd-mm-yyyy')INSPECT_DATE, INSPECT_INFO, INSPECT_PIC, INSPECT_PIC_NAME, PROBLEM.FLAG AS PROBLEM_STATUS,
              DVR_STATUS, DVR_INFO, ADAPTOR_STATUS, ADAPTOR_INFO, CABEL_STATUS, CABEL_INFO, CAM_INDOR_STATUS, CAM_INDOR_INFO, CAM_OUTDOR_STATUS, CAM_OUTDOR_INFO, HDD_STATUS, HDD_INFO, LCD_STATUS, LCD_INFO, SPECIAL_REASON, CAM_INDOR_STATUS+CAM_OUTDOR_STATUS CAM_STATUS,
              DVR_REPLACE, DVR_REPAIR, ADAPTOR_REPLACE, ADAPTOR_REPAIR, CABEL_REPLACE, CABEL_REPAIR, CAM_INDOR_REPLACE, CAM_INDOR_REPAIR, CAM_OUTDOR_REPLACE, CAM_OUTDOR_REPAIR, HDD_REPLACE, HDD_REPAIR, LCD_REPLACE, LCD_REPAIR
            FROM
              (SELECT * FROM APP_TX_CCTV_PROBLEM_HDR)PROBLEM,
              (SELECT * FROM APP_TX_CCTV_PROBLEM_DTL)PROBLEM_DTL,
              (SELECT * FROM APP_TX_CCTV_PROBLEM_DTL_TS)PROBLEM_TS,
              (SELECT KD_STORE, NAMA_STORE, DECODE(STATUS,'T','REGULER','FRANCHISE')STATUS, TELPS TELP  FROM AMU_STORE_T WHERE AKTIF = 'T' AND DC = 'FALSE')STORE,
              (SELECT KD_STORE, JARAK FROM AMU_JARAK_DC_TOKO_T)JARAK,
              (SELECT KD_STORE, ALAMAT1||' '||ALAMAT2||' '||ALAMAT3 ALAMAT, TGL_BUKA TGL_GO, TELP, ORG_AREA_MANAGER_NIK, ORG_AREA_COORDINATOR_NIK FROM AMU_STORES_T WHERE KD_BRANCH = 'BZ01' AND STATUS_AKTIF = 'Y')STORE_DTL,
              (SELECT * FROM AMU_USER_MAX_T)AM,
              (SELECT * FROM AMU_USER_MAX_T)AC
            WHERE
              PROBLEM.KD_STORE = JARAK.KD_STORE(+)
              AND PROBLEM.KD_STORE = STORE.KD_STORE
              AND PROBLEM.KD_STORE = STORE_DTL.KD_STORE
              AND AM.AUM_NIP = ORG_AREA_MANAGER_NIK
              AND AC.AUM_NIP = ORG_AREA_COORDINATOR_NIK
              AND PROBLEM.NO_PROBLEM = PROBLEM_DTL.NO_PROBLEM(+)
              AND PROBLEM.NO_PROBLEM = PROBLEM_TS.NO_PROBLEM(+)
              AND PROBLEM.NO_PROBLEM = '$id'
        ");
        if($query->num_rows()>0){
            return $query->result();
        } 
        else {
            return false;
        }
        $this->db->close();
    }

    function save_cctv_problem()
    {
      $no_problem = $this->input->post('no_problem');
      $kode_toko = $this->input->post('kode_toko');
      $tgl_info_kerusakan = $this->input->post('tgl_info_kerusakan');
      $info_kerusakan = $this->input->post('info_kerusakan');
      $tgl_pemeriksaan = $this->input->post('tgl_pemeriksaan');
      $pemeriksaan_it = $this->input->post('pemeriksaan_it');
      $nik_pic_it = $this->input->post('nik_pic_it');
      $nama_pic_it = $this->input->post('nama_pic_it');

      $this->load->database('apps');
      $query = $this->db->query("
        INSERT INTO APP_TX_CCTV_PROBLEM_HDR(NO_PROBLEM, INPUT_DATE, KD_STORE, DAMAGE_DATE, DAMAGE_INFO, INSPECT_DATE, INSPECT_INFO, INSPECT_PIC, INSPECT_PIC_NAME, FLAG) VALUES ('$no_problem', TRUNC(SYSDATE), '$kode_toko', TO_DATE('$tgl_info_kerusakan','dd-mm-YYYY'), '$info_kerusakan', TO_DATE('$tgl_pemeriksaan','dd-mm-YYYY'), '$pemeriksaan_it', '$nik_pic_it', '$nama_pic_it', '0')
      ");
      if ($query) {
        $query = $this->db->query("
          INSERT INTO APP_TX_CCTV_PROBLEM_DTL(NO_PROBLEM) VALUES ('$no_problem')
        ");
        if ($query) {
          $query = $this->db->query("
            INSERT INTO APP_TX_CCTV_PROBLEM_DTL_TS(NO_PROBLEM) VALUES ('$no_problem')
          ");
          if ($query) {
            //tambahkan update counter
            $counter = $this->db->query("SELECT TO_NUMBER(COUNTER)+1 AS COUNTER FROM APP_TX_FAKTUR");
            $counter = $counter->result();
            $counter_new = sprintf('%04d', $counter[0]->COUNTER);
            $query = $this->db->query("
              UPDATE APP_TX_FAKTUR SET COUNTER = '$counter_new', DATE_CREATE = TRUNC(SYSDATE) WHERE FAKTUR_ID = 'CCTV'     
            ");
            if ($query) {
                return;
            }
          }
          elseif (!$query) {
            return false;
          }
          $this->db->close();
        }
      }
    }

    public function update_cctv_problem($id, $data)
    {
      $no_spk = $data['no_spk'];
      $tgl_pemeriksaan = $data['tgl_pemeriksaan'];
      $pemeriksaan_it = $data['pemeriksaan_it'];
      $nik_pic_it = $data['nik_pic_it'];
      $nama_pic_it = $data['nama_pic_it'];
      $tgl_kirim_vendor = $data['tgl_kirim_vendor'];
      $dvr_toggle = $data['dvr_toggle'];
      $adaptor_toggle = $data['adaptor_toggle'];
      $cabel_toggle = $data['cabel_toggle'];
      $cam_indor_toggle = $data['cam_indor_toggle'];
      $cam_outdor_toggle = $data['cam_outdor_toggle'];
      $hdd_toggle = $data['hdd_toggle'];
      $lcd_toggle = $data['lcd_toggle'];
      $dvr_info = $data['dvr_info'];
      $adaptor_info = $data['adaptor_info'];
      $cabel_info = $data['cabel_info'];
      $cam_indor_info = $data['cam_indor_info'];
      $cam_outdor_info = $data['cam_outdor_info'];
      $hdd_info = $data['hdd_info'];
      $lcd_info = $data['lcd_info'];
      $special_reason_info = $data['special_reason_info'];

      $dvr_replace = $data['ts_dvr_ganti'];
      $adaptor_replace = $data['ts_adaptor_ganti'];
      $cabel_replace = $data['ts_cabel_ganti'];
      $cam_indor_replace = $data['ts_cam_indor_ganti'];
      $cam_outdor_replace = $data['ts_cam_outdor_ganti'];
      $hdd_replace = $data['ts_hdd_ganti'];
      $lcd_replace = $data['ts_lcd_ganti'];
      $dvr_repair = $data['ts_dvr_perbaikan'];
      $adaptor_repair = $data['ts_adaptor_perbaikan'];
      $cabel_repair = $data['ts_cabel_perbaikan'];
      $cam_indor_repair = $data['ts_cam_indor_perbaikan'];
      $cam_outdor_repair = $data['ts_cam_outdor_perbaikan'];
      $hdd_repair = $data['ts_hdd_perbaikan'];
      $lcd_repair = $data['ts_lcd_perbaikan'];

      $this->load->database('apps');
      //$this->db->update('APP_TX_CCTV_PROBLEM_HDR', $data, $where);
      $query = $this->db->query("
       UPDATE APP_TX_CCTV_PROBLEM_HDR
       SET 
            NO_SPK = '$no_spk',
            INSPECT_DATE = TO_DATE('$tgl_pemeriksaan','dd-mm-YYYY'),
            INSPECT_INFO = '$pemeriksaan_it',
            INSPECT_PIC = '$nik_pic_it',
            INSPECT_PIC_NAME = '$nama_pic_it',
            SERVICE_DATE = TO_DATE('$tgl_kirim_vendor','dd-mm-YYYY'),
            FLAG = '1'
        WHERE NO_PROBLEM = '$id'
      ");
      $query = $this->db->query("
        SELECT * FROM APP_TX_CCTV_PROBLEM_DTL WHERE NO_PROBLEM = '$id'
      ");
        if ($query->num_rows >= 0) {
          $query = $this->db->query("
          UPDATE APP_TX_CCTV_PROBLEM_DTL
          SET 
            DVR_STATUS = '$dvr_toggle',
            DVR_INFO = '$dvr_info',
            ADAPTOR_STATUS = '$adaptor_toggle',
            ADAPTOR_INFO = '$adaptor_info',
            CABEL_STATUS = '$cabel_toggle',
            CABEL_INFO = '$cabel_info',
            CAM_INDOR_STATUS = '$cam_indor_toggle',
            CAM_INDOR_INFO = '$cam_indor_info',
            CAM_OUTDOR_STATUS = '$cam_outdor_toggle',
            CAM_OUTDOR_INFO = '$cam_outdor_info',
            HDD_STATUS = '$hdd_toggle',
            HDD_INFO = '$hdd_info',
            LCD_STATUS = '$lcd_toggle',
            LCD_INFO = '$lcd_info',
            SPECIAL_REASON = '$special_reason_info'
            WHERE NO_PROBLEM = '$id'
          ");
          if ($this->db->affected_rows()) {
            $query = $this->db->query("
            UPDATE APP_TX_CCTV_PROBLEM_DTL_TS
            SET 
              DVR_REPLACE = '$dvr_replace',
              DVR_REPAIR = '$dvr_repair',
              ADAPTOR_REPLACE = '$adaptor_replace',
              ADAPTOR_REPAIR = '$adaptor_repair',
              CABEL_REPLACE = '$cabel_replace',
              CABEL_REPAIR = '$cabel_repair',
              CAM_INDOR_REPLACE = '$cam_indor_replace',
              CAM_INDOR_REPAIR = '$cam_indor_repair',
              CAM_OUTDOR_REPLACE = '$cam_outdor_replace',
              CAM_OUTDOR_REPAIR = '$cam_outdor_repair',
              HDD_REPLACE = '$hdd_replace',
              HDD_REPAIR = '$hdd_repair',
              LCD_REPLACE = '$lcd_replace',
              LCD_REPAIR = '$lcd_repair'
              WHERE NO_PROBLEM = '$id'
            ");
          }
        }
        
      
      return $this->db->affected_rows();
    }

    public function solve_cctv_problem($id)
    {
      $this->load->database('apps');
      //$this->db->update('APP_TX_CCTV_PROBLEM_HDR', $data, $where);
      $query = $this->db->query("
       UPDATE APP_TX_CCTV_PROBLEM_HDR
       SET 
            FLAG = '3'
        WHERE NO_PROBLEM = '$id'
      ");
      return $this->db->affected_rows();
    }





//FUNGSI YANG TIDAK DIPAKAI


    function get_list_toko_asli() {
    $this->load->database('ims');
    $query=$this->db->query(
      "SELECT KD_STORE KODE_TOKO, NAMA_STORE NAMA_TOKO FROM AMU_STORE_T WHERE AKTIF = 'T' AND DC = 'FALSE' AND STATUS <> 'Z'"
    );
    if($query->num_rows()>=0){
      return $query->result();
    }
  }

    function get_list_it_store_via_hrd()
    {
      $this->load->database('ims');
      //$this->datatables->select('NIK, NAMA');
      $this->datatables->from("(SELECT NIK, NAMA FROM PS_KARYAWAN_IMS_V@HRD WHERE KODE_BRANCH = 'BZ01' AND STATUS_AKTIF='Y' AND KODE_DIVISI = 'C0000' AND KODE_JABATAN = 'C3307')");
      //$where = array('KODE_BRANCH' => 'BZ01', 'STATUS_AKTIF' => 'Y', 'KODE_DIVISI' => 'C0000', 'KODE_JABATAN' => 'C3307');
      //$this->datatables->where($where);
      //$this->datatables->where_not(array('STATUS' => 'Z'));
      return $this->datatables->generate();
      //$db_ims->close();

      // C3306 = IT OFFICE, C3307 = IT STORE, C3305 = ASCORD STORE, C3304 = ASCORD OFFICE, C3303 = COORDINATOR, C3326 = ADMIN, C3301 = MANAGER IT
      //$this->datatables->from("PS_KARYAWAN_IMS_V@HRD WHERE KODE_BRANCH = 'BZ01' AND STATUS_AKTIF = 'Y' AND KODE_DIVISI = 'C0000' AND KODE_JABATAN = 'C3307' ");
     // return $this->datatables->generate();
      
    }

    function get_by_nik_it_store_VIA_HRD($id)
    {
      $this->load->database('ims');
      $query = $this->db->query("
        	SELECT 
        		NIK, NAMA FROM PS_KARYAWAN_IMS_V@HRD
			WHERE 
				KODE_BRANCH = 'BZ01'
				AND STATUS_AKTIF = 'Y'
				AND KODE_DIVISI = 'C0000'
				AND KODE_JABATAN = 'C3307'
				AND NIK = '$id'"
			// C3306 = IT OFFICE, C3307 = IT STORE, C3305 = ASCORD STORE, C3304 = ASCORD OFFICE, C3303 = COORDINATOR, C3326 = ADMIN, C3301 = MANAGER IT
		);
        if($query->num_rows()>=0){
			return $query->row();
		} 
		else {
			return false;
		}
    
    }

    


    function test()
    {
     
      $this->load->database('itbdg');
      $query = $this->db->query("
          SELECT MONTH, COUNTER FROM TX_FAKTUR WHERE FAKTUR_ID = 'CCTV'     
        ");
      $counter = $query->result();

      echo sprintf('%04d', $counter[0]->COUNTER);   
      //echo number_to_alphabet('2');

    }

     function counter()
    {
        $this->load->database('apps');
        $counter = $this->db->query("SELECT TO_NUMBER(COUNTER)+1 AS COUNTER FROM APP_TX_FAKTUR");
        $counter = $counter->result();
        $counter = sprintf('%04d', $counter[0]->COUNTER);
        echo $counter;
    }
/*
if($query->affected_rows() > 0){
        return true;
      } 
      else {
        return false;
      }
*/

    

     


	
}