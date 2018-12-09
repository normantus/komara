<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    $date = new DateTime(); 
    $hak_akses = $this->session->userdata('hak_akses');
    $hak = $this->session->userdata('hak');
    $hak_input = $this->session->userdata('hak_input');
    $hak_koreksi = $this->session->userdata('hak_koreksi');
    $hak_hapus = $this->session->userdata('hak_hapus');
    $hak_cetak = $this->session->userdata('hak_cetak');
    $hak_laporan = $this->session->userdata('hak_laporan');
    $hak_proses = $this->session->userdata('hak_proses');
    $menu = base_url().'cctv/cctv_problem/dashboard';

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Respon Problem CCTV New</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li>CCTV</li>
            <li class="active">Respon Problem CCTV New</li>
        </ol>
    </section>
    <!-- //Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Isi halaman -->
                <form id="form_problem_cctv_respon" action="#" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="pull-left">
                            <a style="color: #d9534f" type="button" class="btn btn-box-tool" href="<?php echo $menu; ?>"><i class="fa fa-arrow-left fa-2x"></i></a>
                        </div>
                            <div class="pull-right">
                                <?php foreach ($detail_problem as $data) { 
                                    if ($data->PROBLEM_STATUS <> '3') {?>
                                <button type="button" class="btn btn-info btn-flat" onclick="update_cctv_problem()"><span class="fa fa-floppy-o"></span> Save</a></button>
                                    <?php } if ($data->PROBLEM_STATUS == '1') {
                                ?>
                                <button type="button" class="btn btn-warning btn-flat" onclick="solve_popup()"><span class="fa fa-check-square-o"></span> Solve problem</a></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="panel-body">             
                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li role="presentation" class="active"><a href="#data_toko" aria-controls="data_toko" role="tab" data-toggle="tab">Data Toko</a></li>
                                            <li role="presentation"><a href="#data_kerusakan" aria-controls="data_kerusakan" role="tab" data-toggle="tab">Data Kerusakan</a></li>
                                            <li role="presentation"><a href="#data_pengecekan_it" aria-controls="data_pengecekan_it" role="tab" data-toggle="tab">Data Pengecekan IT</a></li>
                                            <li role="presentation"><a href="#detail_kerusakan_cctv" aria-controls="detail_kerusakan_cctv" role="tab" data-toggle="tab" hidden>Detail Kerusakan CCTV</a></li>
                                            <li role="presentation"><a href="#tindakan_service" aria-controls="tindakan_service" role="tab" data-toggle="tab" hidden>Tindakan Service</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="data_toko">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="no_problem" class="col-md-offset-1 col-md-2 control-label">No. Problem</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="no_problem" name="no_problem" value="<?php echo $data->NO_PROBLEM;?>" readonly>
                                                            </div>
                                                        </div>           
                                                        <div class="form-group">
                                                            <label for="kode_toko" class="col-md-offset-1 col-md-2 control-label">Kode Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="kode_toko" name="kode_toko" maxlength="4" value="<?php echo $data->KD_STORE;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_toko" class="col-md-offset-1 col-md-2 control-label">Nama Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="nama_toko" name="nama_toko" maxlength="20" value="<?php echo $data->NAMA_STORE;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat" class="col-md-offset-1 col-md-2 control-label">Alamat</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="alamat" name="alamat" rows="4" readonly><?php echo $data->ALAMAT;?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status" class="col-md-offset-1 col-md-2 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="status" name="status" maxlength="7" value="<?php echo $data->STATUS;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telp" class="col-md-offset-1 col-md-2 control-label">Telp Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="telp" name="telp" maxlength="12" value="<?php echo $data->TELP;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jarak" class="col-md-offset-1 col-md-2 control-label">Jarak</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="jarak" name="jarak" maxlength="7" value="<?php echo $data->JARAK;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_go" class="col-md-offset-1 col-md-2 control-label">Tanggal GO</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="tgl_go" name="tgl_go" value="<?php echo $data->TGL_GO;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="am_nik" class="col-md-offset-1 col-md-2 control-label">Area Manager</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control input-md" id="am_nik" name="am_nik" maxlength="50" value="<?php echo $data->AM_NIK;?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-md" id="am_nama" name="am_nama" maxlength="50" value="<?php echo $data->AM_NAMA;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ac_nik" class="col-md-offset-1 col-md-2 control-label">Area Coord.</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control input-md" id="ac_nik" name="ac_nik" maxlength="50" value="<?php echo $data->AC_NIK;?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-md" id="ac_nama" name="ac_nama" maxlength="50" value="<?php echo $data->AC_NAMA;?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="data_kerusakan">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="tgl_info_kerusakan" class="col-md-offset-1 col-md-2 control-label" id="tgl_info_kerusakan" name="tgl_info_kerusakan">Tgl Info Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right" id="tgl_info_kerusakan" name="tgl_info_kerusakan" value="<?php echo $data->DAMAGE_DATE;?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="info_kerusakan" class="col-md-offset-1 col-md-2 control-label">Info Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="info_kerusakan" name="info_kerusakan" maxlength="500" readonly><?php echo $data->DAMAGE_INFO;?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="data_pengecekan_it">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="tgl_pemeriksaan" class="col-md-offset-1 col-md-2 control-label" id="tgl_pemeriksaan" name="tgl_pemeriksaan">Tgl Pemeriksaan</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right datepicker" id="tgl_pemeriksaan" name="tgl_pemeriksaan" value="<?php echo $data->INSPECT_DATE; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pemeriksaan_it" class="col-md-offset-1 col-md-2 control-label">Keterangan Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="pemeriksaan_it" name="pemeriksaan_it" maxlength="500" onkeyup="uppercase(this)"><?php echo $data->INSPECT_INFO; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik_pic_it" class="col-md-offset-1 col-md-2 control-label">PIC IT Support</label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="nik_pic_it" name="nik_pic_it" maxlength="8" onkeypress="return jquery_get_detail_it_store(event)" value="<?php echo $data->INSPECT_PIC; ?>">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-flat btn-info" type="button" data-toggle="modal" data-target="#listItStore">List IT Support</button>
                                                                    </span>
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control input-md" id="nama_pic_it" name="nama_pic_it" maxlength="8" value="<?php echo $data->INSPECT_PIC_NAME; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_problem" class="col-md-offset-1 col-md-2 control-label">No. SPK</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="no_spk" name="no_spk" maxlength="30" value="<?php echo $data->NO_SPK; ?>" onkeyup="uppercase(this)">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="tgl_pemeriksaan" class="col-md-offset-1 col-md-2 control-label" id="tgl_kirim_vendor" name="tgl_kirim_vendor">Tgl Kirim ke Vendor</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right datepicker" id="tgl_kirim_vendor" name="tgl_kirim_vendor" value="<?php echo $data->SERVICE_DATE; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="detail_kerusakan_cctv">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="dvr" class="col-md-offset-1 col-md-2 control-label">DVR</label>
                                                            <div class="col-md-1">
                                                                <input id="dvr_toggle_hidden" name="dvr_toggle" type="hidden" value="0">
                                                                <input id="dvr_toggle" name="dvr_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->DVR_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="dvr" name="dvr" maxlength="200" required="required" value="<?php echo $data->DVR_INFO;?>" onkeyup="uppercase(this)" <?php if ($data->DVR_STATUS <> '0') {echo 'disabled';}?>>                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adaptor" class="col-md-offset-1 col-md-2 control-label">Adaptor DVR</label>
                                                            <div class="col-md-1">
                                                                <input id="adaptor_toggle_hidden" name="adaptor_toggle" type="hidden" value="0">
                                                                <input id="adaptor_toggle" name="adaptor_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->ADAPTOR_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="adaptor" name="adaptor" maxlength="200" value="<?php echo $data->ADAPTOR_INFO;?>" onkeyup="uppercase(this)" <?php if ($data->ADAPTOR_STATUS <> '0') {echo 'disabled';}?>>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cabel" class="col-md-offset-1 col-md-2 control-label">Instalasi Kabel</label>
                                                            <div class="col-md-1">
                                                                <input id="cabel_toggle_hidden" name="cabel_toggle" type="hidden" value="0">
                                                                <input id="cabel_toggle" name="cabel_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->CABEL_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="cabel" name="cabel" maxlength="200" value="<?php echo $data->CABEL_INFO;?>" onkeyup="uppercase(this)" <?php if ($data->CABEL_STATUS <> '0') {echo 'disabled';}?>>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cam_indor" class="col-md-offset-1 col-md-2 control-label">Kamera Indor</label>
                                                            <div class="col-md-1">
                                                                <input id="cam_indor_toggle_hidden" name="cam_indor_toggle" type="hidden" value="0">
                                                                <input id="cam_indor_toggle" name="cam_indor_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->CAM_INDOR_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-md" id="cam_indor" name="cam_indor" maxlength="50" value="<?php echo $data->CAM_INDOR_INFO;?>" onkeypress="return validasiAngka(event)" onkeyup="uppercase(this)" onClick="this.setSelectionRange(0, this.value.length)" <?php if ($data->CAM_INDOR_STATUS <> '0') {echo 'disabled';}?>>
                                                                    <div class="input-group-addon input-md">Qty</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cam_outdor" class="col-md-offset-1 col-md-2 control-label">Kamera Outdor</label>
                                                            <div class="col-md-1">
                                                                <input id="cam_outdor_toggle_hidden" name="cam_outdor_toggle" type="hidden" value="0">
                                                                <input id="cam_outdor_toggle" name="cam_outdor_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->CAM_OUTDOR_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="input-group">
                                                                    <input id="cam_outdor" name="cam_outdor" type="text" class="form-control input-md" maxlength="50" value="<?php echo $data->CAM_OUTDOR_INFO;?>" onkeypress="return validasiAngka(event)" onkeyup="uppercase(this)" onClick="this.setSelectionRange(0, this.value.length)" <?php if ($data->CAM_OUTDOR_STATUS <> '0') {echo 'disabled';}?>>
                                                                    <div class="input-group-addon input-md">Qty</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hdd" class="col-md-offset-1 col-md-2 control-label">HDD</label>
                                                            <div class="col-md-1">
                                                                <input id="hdd_toggle_hidden" name="hdd_toggle" type="hidden" value="0">
                                                                <input id="hdd_toggle" name="hdd_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->HDD_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="hdd" name="hdd" maxlength="200" value="<?php echo $data->HDD_INFO;?>" onkeyup="uppercase(this)" <?php if ($data->HDD_STATUS <> '0') {echo 'disabled';}?>>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lcd" class="col-md-offset-1 col-md-2 control-label">LCD</label>
                                                            <div class="col-md-1">
                                                                <input id="lcd_toggle_hidden" name="lcd_toggle" type="hidden" value="0">
                                                                <input id="lcd_toggle" name="lcd_toggle" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-on="OK" data-off="NOK" value="1" <?php if($data->LCD_STATUS <> '0') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="lcd" name="lcd" maxlength="200" value="<?php echo $data->LCD_INFO;?>"  onkeyup="uppercase(this)" <?php if ($data->LCD_STATUS <> '0') {echo 'disabled';}?>>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="special_reason" class="col-md-offset-1 col-md-2 control-label">Alasan Khusus</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="special_reason" name="special_reason" maxlength="500" onkeyup="uppercase(this)"><?php echo $data->SPECIAL_REASON; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="tindakan_service">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div id="ts_dvr" name="ts_dvr" class="form-group" <?php if($data->DVR_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_dvr" class="col-md-offset-1 col-md-2 control-label">DVR</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_dvr_ganti" name="ts_dvr_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->DVR_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_dvr_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_dvr_perbaikan" name="ts_dvr_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->DVR_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_dvr_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_adaptor" name="ts_adaptor" class="form-group" <?php if($data->ADAPTOR_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_adaptor" class="col-md-offset-1 col-md-2 control-label">Adaptor DVR</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_adaptor_ganti" name="ts_adaptor_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->ADAPTOR_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_adaptor_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_adaptor_perbaikan" name="ts_adaptor_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->ADAPTOR_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_adaptor_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_cabel" name="ts_cabel" class="form-group" <?php if($data->CABEL_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_cabel" class="col-md-offset-1 col-md-2 control-label">Instalasi Kabel</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_cabel_ganti" name="ts_cabel_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CABEL_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cabel_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_cabel_perbaikan" name="ts_cabel_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CABEL_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cabel_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_cam_indor" name="ts_cam_indor" class="form-group" <?php if($data->CAM_INDOR_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_cam_indor" class="col-md-offset-1 col-md-2 control-label">Kamera Indor</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_cam_indor_ganti" name="ts_cam_indor_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CAM_INDOR_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cam_indor_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_cam_indor_perbaikan" name="ts_cam_indor_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CAM_INDOR_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cam_indor_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_cam_outdor" name="ts_cam_outdor" class="form-group" <?php if($data->CAM_OUTDOR_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_cam_outdor" class="col-md-offset-1 col-md-2 control-label">Kamera Outdor</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_cam_outdor_ganti" name="ts_cam_outdor_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CAM_OUTDOR_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cam_outdor_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_cam_outdor_perbaikan" name="ts_cam_outdor_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->CAM_OUTDOR_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_cam_outdor_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_hdd" name="ts_hdd" class="form-group" <?php if($data->HDD_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_hdd" class="col-md-offset-1 col-md-2 control-label">HDD</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_hdd_ganti" name="ts_hdd_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->HDD_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_hdd_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_hdd_perbaikan" name="ts_hdd_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->HDD_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_hdd_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                        <div id="ts_lcd" name="ts_lcd" class="form-group" <?php if($data->LCD_STATUS <> '0') {echo "style='display:none'";}?>>
                                                            <label for="ts_lcd" class="col-md-offset-1 col-md-2 control-label">LCD</label>
                                                            <div class="col-md-offset-1 col-md-1">
                                                                <input id="ts_lcd_ganti" name="ts_lcd_ganti" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->LCD_REPLACE == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_lcd_ganti" class="control-label"> Ganti Baru</label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input id="ts_lcd_perbaikan" name="ts_lcd_perbaikan" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="default" data-style="ios" data-on="YA" data-off=" " value="1" <?php if($data->LCD_REPAIR == '1') {echo "checked";}?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="ts_lcd_perbaikan" class="control-label"> Perbaikan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php } ?>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- nav-tabs-custom -->
                                </div>
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </form>
                <!-- /.Isi halaman -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<script>
    //datatable



    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
          };
        };

        $.fn.DataTable.ext.pager.numbers_length = 3;

        var t_toko = $('#list_toko_table').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#list_toko_table_filter input')
                .off('.DT')
                .on('keyup.DT', function(e) {
                  if (e.keyCode == 13) {
                    api.search(this.value.toUpperCase()).draw();
                  }
                });
            },
            searchDelay: 1,
            oLanguage: {
                sProcessing: "loading..."
            },
            serverSide: true,
            "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"]],
            "iDisplayLength": 5,
            
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('cctv/cctv_problem/ajax_list_toko')?>",
                "type": "POST"
            },
            columns: [
                {"data": "KD_STORE"},
                {"data": "NAMA_STORE"}
            ],
            createdRow: function(row, data, dataIndex) {
                var a = $(row).find('td:eq(0)').html();
                $(row).find('td').attr('class', 'pilih_toko');
                $(row).find('td').attr('data-kd-toko', a);
            },
            order: [[0, 'asc']],

        });

        var t_it = $('#list_it_store_table').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#list_it_store_table_filter input')
                .off('.DT')
                .on('keyup.DT', function(e) {
                  if (e.keyCode == 13) {
                    api.search(this.value.toUpperCase()).draw();
                  }
                });
            },
            searchDelay: 1,
            oLanguage: {
                sProcessing: "loading..."
            },
            serverSide: true,
            "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"]],
            "iDisplayLength": 5,
            
            // Load data for the table's content from an Ajax source
            "ajax": {
              "url": "<?php echo site_url('cctv/cctv_problem/ajax_list_it_store')?>",
              "type": "POST"
            },
            createdRow: function(row, data, dataIndex) {
                var a = $(row).find('td:eq(0)').html();
                var b = $(row).find('td:eq(1)').html();
                $(row).find('td').attr('class', 'pilih_it_store');
                $(row).find('td').attr('data-nik-it-store', a);
                $(row).find('td').attr('data-nama-it-store', b);
            },
            columns: [
                {"data": "NIK"},
                {"data": "NAMA"}
            ],
            order: [[0, 'asc']],
        });
    } );

    $(document).on('click', '.pilih_toko', function (e) {
        var id = $(this).attr('data-kd-toko');
        document.getElementById("kode_toko").value = id;
        get_detail_toko(id);
        $('#listToko').modal('hide');
    });


    $(document).on('click', '.pilih_it_store', function (e) {
        var nik = $(this).attr('data-nik-it-store');
        var nama = $(this).attr('data-nama-it-store');
        document.getElementById("nik_pic_it").value = nik;
        document.getElementById("nama_pic_it").value = nama;
        $('#listItStore').modal('hide');
    });

    function jquery_get_detail_toko(e) {
    if (e.keyCode == 13) {
        var id = document.getElementById("kode_toko").value
        get_detail_toko(id);
        }
    }

    function jquery_get_detail_it_store(e) {
    if (e.keyCode == 13) {
        var id = document.getElementById("nik_pic_it").value
        get_detail_it_store(id);
        }
    }

    
    

    function get_detail_toko(id) {
    //$('#form_update_email')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "../cctv_problem/ajax_detail_toko/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="kode_toko"]').val(data.KODE_TOKO);
        $('[name="nama_toko"]').val(data.NAMA_TOKO);
        $('[name="alamat"]').val(data.ALAMAT);
        $('[name="status"]').val(data.STATUS);
        $('[name="telp"]').val(data.TELP);
        $('[name="jarak"]').val(data.JARAK);
        $('[name="tgl_go"]').val(data.TGL_GO);
        $('[name="am_nik"]').val(data.AM_NIK);
        $('[name="am_nama"]').val(data.AM_NAMA);
        $('[name="ac_nik"]').val(data.AC_NIK);
        $('[name="ac_nama"]').val(data.AC_NAMA);
        //$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        //$('.modal-title').text('Form Update Email Toko '+data.KD_STORE); // Set title to Bootstrap modal title  
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Data Toko ' +id+ ' tidak ditemukan, periksa kembali.');
      }
    });
  }

    function get_detail_it_store(id) {
    //$('#form_update_email')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "../cctv_problem/ajax_detail_it_store/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="nik_pic_it"]').val(data.NIK);
        $('[name="nama_pic_it"]').val(data.NAMA);
        //$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        //$('.modal-title').text('Form Update Email Toko '+data.KD_STORE); // Set title to Bootstrap modal title  
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('IT Store Support dengan NIK = ' +id+ ' tidak ada, silahkan di periksa kembali.');
      }
    });
    }

    function uppercase(element){
        element.value = element.value.toUpperCase();
    }


    function update_cctv_problem()
    {
      $.ajax({
            url : "<?php echo site_url('cctv/cctv_problem/update_cctv_problem') ?>",
            type: "POST",
            data: $('#form_problem_cctv_respon').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               //$('#modal_form').modal('hide');
              alert('Berhasil update problem CCTV');
              //location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error update data');
            }
        });
     }

    function solve_popup()
    {
      $('#modal_solve_title').text('Warning!');
      $('#modal_solve_body').text('Apakah Problem: <?php echo $data->NO_PROBLEM;?> telah selesai?');
      $('#modal_solve_popup').modal('show'); // show bootstrap modal
    }

    function solve_cctv_problem()
    {
      $.ajax({
            url : "<?php echo site_url('cctv/cctv_problem/solve_cctv_problem') ?>",
            type: "POST",
            data: $('#form_problem_cctv_respon').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               //$('#modal_form').modal('hide');
              window.location.replace('<?php echo base_url('cctv/cctv_problem/dashboard');?>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error update data');
            }
        });
     }
    
    $('#dvr_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("dvr")[0].setAttribute("disabled", "true");
        document.getElementById("ts_dvr").style.display = "none";
        document.getElementById("dvr").value = null;
        $("#ts_dvr_perbaikan").bootstrapToggle('off');
        $("#ts_dvr_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("dvr")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_dvr").style.display = "block";
        }
    });

    $('#adaptor_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("adaptor")[0].setAttribute("disabled", "true");
        document.getElementById("ts_adaptor").style.display = "none";
        document.getElementById("adaptor").value = null;
        $("#ts_adaptor_perbaikan").bootstrapToggle('off');
        $("#ts_adaptor_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("adaptor")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_adaptor").style.display = "block";
        }
    });

    $('#cabel_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("cabel")[0].setAttribute("disabled", "true");
        document.getElementById("ts_cabel").style.display = "none";
        document.getElementById("cabel").value = null;
        $("#ts_cabel_perbaikan").bootstrapToggle('off');
        $("#ts_cabel_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("cabel")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_cabel").style.display = "block";
        
        }
    });

    $('#cam_indor_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("cam_indor")[0].setAttribute("disabled", "true");
        document.getElementById("ts_cam_indor").style.display = "none";
        document.getElementById("cam_indor").value = null;
        $("#ts_cam_indor_perbaikan").bootstrapToggle('off');
        $("#ts_cam_indor_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("cam_indor")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_cam_indor").style.display = "block";
        document.getElementById("cam_indor").value = "1";
        }
    });

    $('#cam_outdor_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("cam_outdor")[0].setAttribute("disabled", "true");
        document.getElementById("ts_cam_outdor").style.display = "none";
        document.getElementById("cam_outdor").value = null;
        $("#ts_cam_outdor_perbaikan").bootstrapToggle('off');
        $("#ts_cam_outdor_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("cam_outdor")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_cam_outdor").style.display = "block";
        document.getElementById("cam_outdor").value = "1";
        }
    });

    $('#hdd_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("hdd")[0].setAttribute("disabled", "true");
        document.getElementById("ts_hdd").style.display = "none";
        document.getElementById("hdd").value = null;
        $("#ts_hdd_perbaikan").bootstrapToggle('off');
        $("#ts_hdd_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("hdd")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_hdd").style.display = "block";
        }
    });

    $('#lcd_toggle').change(function(){
        if($(this).prop('checked'))
        {
        document.getElementsByName("lcd")[0].setAttribute("disabled", "true");
        document.getElementById("ts_lcd").style.display = "none";
        document.getElementById("lcd").value = null;
        $("#ts_lcd_perbaikan").bootstrapToggle('off');
        $("#ts_lcd_ganti").bootstrapToggle('off');
        }
        else
        {
        document.getElementsByName("lcd")[0].removeAttribute("disabled", "false");
        document.getElementById("ts_lcd").style.display = "block";
        }
    });

    $('#ts_dvr_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_dvr_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_adaptor_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_adaptor_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_cabel_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cabel_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_cam_indor_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cam_indor_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_cam_outdor_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cam_outdor_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_hdd_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_hdd_perbaikan").bootstrapToggle('off');
        }
    });

    $('#ts_lcd_ganti').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_lcd_perbaikan").bootstrapToggle('off');
        }
    });


    $('#ts_dvr_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_dvr_ganti").bootstrapToggle('off');
        }
    });

    $('#ts_adaptor_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_adaptor_ganti").bootstrapToggle('off');
        }
    }); 

    $('#ts_cabel_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cabel_ganti").bootstrapToggle('off');
        }
    }); 

    $('#ts_cam_indor_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cam_indor_ganti").bootstrapToggle('off');
        }
    }); 

    $('#ts_cam_outdor_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_cam_outdor_ganti").bootstrapToggle('off');
        }
    }); 

    $('#ts_hdd_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_hdd_ganti").bootstrapToggle('off');
        }
    }); 

    $('#ts_lcd_perbaikan').change(function(){
        if($(this).prop('checked'))
        {
            $("#ts_lcd_ganti").bootstrapToggle('off');
        }
    });   

    



    
</script>


<script>
  function toggleOn() {
    $('#toggle-trigger').bootstrapToggle('on')
  }
  function toggleOff() {
    $('#toggle-trigger').bootstrapToggle('off')  
  }
  function toggleOnByInput() {
    $('#toggle-trigger').prop('checked', true).change()
  }
  function toggleOffByInput() {
    $('#toggle-trigger').prop('checked', false).change()
  }
</script>


<!-- Modal Solve-->
<div class="modal fade" id="modal_solve_popup" tabindex="-1" role="dialog" aria-labelledby="modal_solve_popupLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal_solve_title">Modal Title Text</h4>
      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="modal_solve_body">Modal Body Text</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="solve_cctv_problem()">Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal List IT Store-->
<div class="modal fade" id="listItStore" tabindex="-1" role="dialog" aria-labelledby="listItStoreLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="listItStoreLabel">List IT Store</h4>
      </div>
      <div class="modal-body">
            <table id="list_it_store_table" 
                        class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                </tr>
                            </tfoot>
                        </table>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>