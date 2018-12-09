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
    $menu = base_url().$hak_akses;

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Review Problem CCTV</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li>CCTV</li>
            <li class="active">Review Problem CCTV</li>
        </ol>
    </section>
    <!-- //Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Isi halaman -->
                <form id="form_problem_cctv" class="form-horizontal">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="pull-left">
                            <a style="color: #d9534f" type="button" class="btn btn-box-tool" href="<?php echo base_url('cctv_problem/dashboard');?>"><i class="fa fa-arrow-left fa-2x"></i></a>
                            </div>
                            <?php foreach ($detail_problem as $data) {
                                if ($data->PROBLEM_STATUS == '0') {
                            ?>
                            <div class="pull-right">
                                <a type="button" class="btn btn-warning btn-flat" href="<?php echo base_url('cctv_problem/respon_problem/'); echo $data->NO_PROBLEM;?>"> Respon Problem</a>
                            </div>
                            <?php } ?>
                            <?php
                                if ($data->PROBLEM_STATUS == '1') {
                            ?>
                            <div class="pull-right">
                                <a type="button" class="btn btn-warning btn-flat" href="<?php echo base_url('cctv/cctv_problem/respon_problem/'); echo $data->NO_PROBLEM;?>"> Update Progress</a>
                                <a type="button" class="btn btn-default" href="<?php echo base_url('cctv/cctv_problem/print_problem/'); echo $data->NO_PROBLEM;?>" target="_blank"><i class="fa fa-print"></i> Print BAP</a>
                            </div>
                            <?php } ?>
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
                                            <!--<li role="presentation"><a href="#detail_kerusakan_cctv" aria-controls="detail_kerusakan_cctv" role="tab" data-toggle="tab" hidden>Detail Kerusakan CCTV</a></li>-->
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
                                                                    <input type="text" class="form-control pull-right" id="tgl_pemeriksaan" name="tgl_pemeriksaan" value="<?php echo $data->INSPECT_DATE; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pemeriksaan_it" class="col-md-offset-1 col-md-2 control-label">Keterangan Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="pemeriksaan_it" name="pemeriksaan_it" maxlength="500" readonly><?php echo $data->INSPECT_INFO; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik_pic_it" class="col-md-offset-1 col-md-2 control-label">PIC IT Support</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" id="nik_pic_it" name="nik_pic_it" maxlength="8" value="<?php echo $data->INSPECT_PIC; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-md" id="nama_pic_it" name="nama_pic_it" maxlength="8" value="<?php echo $data->INSPECT_PIC_NAME; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_problem" class="col-md-offset-1 col-md-2 control-label">No. SPK</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="no_spk" name="no_spk" value="<?php echo $data->NO_SPK; ?>" readonly>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="tgl_pemeriksaan" class="col-md-offset-1 col-md-2 control-label" id="tgl_kirim_vendor" name="tgl_kirim_vendor">Tgl Kirim ke Vendor</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right" id="tgl_kirim_vendor" name="tgl_kirim_vendor" value="<?php echo $data->SERVICE_DATE; ?>" readonly>
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
                                                            <label for="dvr" class="col-md-2 control-label">DVR</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-md" id="dvr" name="dvr" maxlength="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adaptor" class="col-md-2 control-label">Adaptor DVR</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="adaptor" name="adaptor" maxlength="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stkak" class="col-md-2 control-label">Stock Akhir</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="stkak" name="stkak" maxlength="8">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bsaw" class="col-md-2 control-label">Barang BS Awal</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="bsaw" name="bsaw" maxlength="8">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bsak" class="col-md-2 control-label">Barang BS Akhir</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="bsak" name="bsak" maxlength="8">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="harga" class="col-md-2 control-label">Harga Modal</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon input-md">Rp</div>
                                                                    <input type="text" class="form-control input-md" id="harga" name="harga" maxlength="13">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rata2" class="col-md-2 control-label">Harga Rata-rata</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon input-md">Rp</div>
                                                                    <input type="text" class="form-control input-md" id="rata2" name="rata2" maxlength="13">
                                                                </div>
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