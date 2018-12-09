<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
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
        <h1>Detail Monitor</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li>Master Inventory</li>
            <li>Master Monitor</li>
            <li class="active">Detail Monitor</li>
        </ol>
    </section>
    <!-- //Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Isi halaman -->
                <form class="form-horizontal">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="pull-left">
                            <a style="color: #d9534f" type="button" class="btn btn-box-tool" href="<?php echo $menu.'ms_inv/ms_monitor'; ?>"><i class="fa fa-arrow-left fa-2x"></i></a>
                        </div>
                            <div class="pull-right">
                            <?php
                                if($hak_koreksi == 1)
                                {
                            ?>
                                <a href="<?php echo $menu?>ms_inv/ms_monitor/edit/<?php echo $id; ?>" class="btn btn-warning btn-flat"><span class="glyphicon glyphicon-edit"></span> Edit Data</a>
                            <?php
                                }
                                if($hak_hapus == 1)
                                {
                            ?>
                                <a href="<?php echo $menu?>ms_inv/ms_monitor/delete_record/<?php echo $id; ?>" class="btn btn-danger btn-flat" onClick="return confirm('Data Monitor Akan Dihapus?');"><span class="glyphicon glyphicon-remove"></span> Hapus Data</a>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active"><a href="#detail_monitor" aria-controls="detail_monitor" role="tab" data-toggle="tab">Detail Monitor</a></li>
                                    <li role="presentation"><a href="#foto_monitor" aria-controls="foto_monitor" role="tab" data-toggle="tab">Foto Monitor</a></li>
                                </ul>
                                <?php
                                foreach($data_detail as $row) {
                                ?> 
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="detail_monitor">
                                        <div class="panel panel-default">
                                            <div class="panel-body">                       
                                                <div class="form-group">
                                                    <label for="id_monitor" class="col-sm-offset-1 col-sm-2 control-label">ID Monitor</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control input-sm" id="id_monitor" name="id_monitor" maxlength="7" value="<?php echo $row->ID_MONITOR;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merk" class="col-sm-offset-1 col-sm-2 control-label">Merk</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control input-sm" id="merk" name="merk" maxlength="10" value="<?php echo $row->MERK;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="model" class="col-sm-offset-1 col-sm-2 control-label">Model</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control input-sm" id="model" name="model" maxlength="10" value="<?php echo $row->MODEL;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ukuran" class="col-sm-offset-1 col-sm-2 control-label">Ukuran</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" id="ukuran" name="ukuran" maxlength="5" value="<?php echo $row->UKURAN;?>" readonly>
                                                            <span class="input-group-addon">"</span>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="foto_monitor">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="foto" class="col-sm-offset-1 col-sm-2 control-label">Foto Monitor</label>
                                                <div class="col-sm-6">
                                                    <img class="img-responsive" width="300px" height="200px" src="<?php echo base_url(); ?>/assets/local/images/uploads/monitor/<?php echo $row->FOTO?> ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <!-- /.tab-content -->
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