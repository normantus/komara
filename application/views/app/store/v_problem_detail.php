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
    $menu = base_url();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Problem <small>CIS</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $menu; ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Problem</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" class="btn btn-danger btn-sm" >Back</button>
                        </div>
                        <div class="card-tools">
                            
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Problem Timeline</h3>
                            </div>    
                            <div class="card-body">
                                <ul class="timeline" id="timeline" cellspacing="0">
                                    <li class="li complete">
                                        <div class="timestamp">
                                        <span class="author">Store Staff</span>
                                        <span class="date">21-Nov-2018<span>
                                        <span class="time">09:34<span>
                                        </div>
                                        <div class="status">
                                        <h4>Problem Created</h4>
                                        </div>
                                    </li>
                                    <li class="li complete">
                                        <div class="timestamp">
                                        <span class="author">Operator</span>
                                        <span class="date">21-Nov-2018 11:21<span>
                                        </div>
                                        <div class="status">
                                        <h4>Eskalasi Ke Store Support</h4>
                                        </div>
                                    </li>
                                    <li class="li complete">
                                        <div class="timestamp">
                                        <span class="author">Store Support</span>
                                        <span class="date">21-Nov-2018 15:14<span>
                                        </div>
                                        <div class="status">
                                        <h4> Problem Updated </h4>
                                        </div>
                                    </li>
                                    <li class="li">
                                        <div class="timestamp">
                                        <span class="author">PAM Admin</span>
                                        <span class="date">TBD<span>
                                        </div>
                                        <div class="status">
                                        <h4> Shift Completed </h4>
                                        </div>
                                    </li>
                                </ul>     
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <div class="card-header">
                                <h3 class="card-title">Problem Detail</h3>
                            </div>     
                        <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#data_toko" data-toggle="tab">Data Toko</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data_kerusakan" data-toggle="tab">Data Kerusakan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data_pengecekan_it" data-toggle="tab">Data Pengecekan IT</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <?php foreach ($detail_problem as $data) { ?>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="data_toko">     
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">No. Problem</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="no_problem" name="no_problem" value="<?php echo $data->NO_PROBLEM;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Kode Toko</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="kode_toko" name="kode_toko" value="<?php echo $data->KD_STORE;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Nama Toko</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="nama_toko" name="nama_toko" value="<?php echo $data->NAMA_STORE;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Alamat</span>
                                            <div class="col-md-6">
                                                <textarea type="text" class="form-control form-control-sm" id="alamat" name="alamat" rows="4" readonly><?php echo $data->ALAMAT;?></textarea>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Status</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="status" name="status" value="<?php echo $data->STATUS;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Telp Toko</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="telp" name="telp" value="<?php echo $data->TELP;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Jarak</span>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" id="jarak" name="jarak" value="<?php echo $data->JARAK;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Tanggal GO</span>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" id="tgl_go" name="tgl_go" value="<?php echo $data->TGL_GO;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Area Manager</span>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="am_nik" name="am_nik" value="<?php echo $data->AM_NIK;?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm" id="am_nama" name="am_nama" value="<?php echo $data->AM_NAMA;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Area Coordinator</span>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="ac_nik" name="ac_nik" value="<?php echo $data->AC_NIK;?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm" id="ac_nama" name="ac_nama" value="<?php echo $data->AC_NAMA;?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="data_kerusakan">
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Tgl Info kerusakan</span>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" id="tgl_info_kerusakan" name="tgl_info_kerusakan" value="<?php echo $data->DAMAGE_DATE;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="col-md-3 control-label input-group-text input-group-text-label">Info Kerusakan</span>
                                            <div class="col-md-6">
                                                <textarea type="text" class="form-control form-control-sm" id="info_kerusakan" name="info_kerusakan" rows="4" readonly><?php echo $data->DAMAGE_INFO;?></textarea>
                                            </div>
                                        </div>    
                                    </div>
                                    
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="data_pengecekan_it">
                                        <div class="input-group mb-3">
                                            <div class="col-md-3 input-group-prepend">
                                                <span class="input-group-text input-group-text-label">Tgl Pemeriksaan</span>
                                            </div>      
                                            <div class="col-md-6">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="tgl_pemeriksaan" name="tgl_pemeriksaan" value="<?php echo $data->INSPECT_DATE; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->    
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid --> 
    </section>




























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