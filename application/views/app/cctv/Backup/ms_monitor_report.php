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
        <h1>Katalog Karyawan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li>Data Master</li>
            <li>Karyawan</li>
            <li class="active">Katalog</li>
        </ol>
    </section>
    <!-- //Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Isi halaman -->
                <div href="#" class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><i class="fa fa-print"></i></h3>
                            <p><h4><strong>Katalog Karyawan</strong></h4></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="JavaScript:newPopup('<?php echo $menu?>/data_master/karyawan/report_karyawan');" class="small-box-footer">
                            <h4>Cetak</h4>
                        </a>
                    </div>
                </div>
                <!-- /.Isi halaman -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- open windows fullscreen -->
<script type="text/javascript">
// Popup window code
function newPopup(url) {
    popupWindow = window.open(
        url,'popUpWindow','fullscreen=yes,left=10,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no');
    popupWindow.moveTo(0,0);
    popupWindow.resizeTo(window.screen.width, window.screen.height);
}
</script>