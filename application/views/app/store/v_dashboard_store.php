<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
  <?php $this->load->view('system/alert'); ?>
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard CCTV <small>CIS</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $problem_cctv[0]->TOTAL; ?></h3>
                <p>Total Problem CCTV</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#recap_report" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $problem_cctv[0]->NEW; ?></h3>
                <p>Problem New</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-videocam"></i>
              </div>
              <a href="#new_problem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $problem_cctv[0]->PROGRESS; ?></h3>
                <p>Problem Progress</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-videocam"></i>
              </div>
              <a href="#progress_problem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $problem_cctv[0]->SOLVE; ?></h3>
                <p>Problem Solve</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-videocam"></i>
              </div>
              <a href="#solve_problem" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->

        <div class="row">
          <div class="col-12">
            <div class="card" id="all_problem">
              <div class="card-header">
                <h3 class="card-title">Recap Problem CCTV All</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="cctv_problem_all_tabel" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th>No. Problem</th>
                        <th>Tanggal Input</th>
                        <th>Kode Toko</th>
                        <th>Nama Toko</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No. Problem</th>
                        <th>Tanggal Input</th>
                        <th>Kode Toko</th>
                        <th>Nama Toko</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.col -->
        </div>
      </div><!-- /.container-fluid --> 
    </section>
    <!-- /.content -->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

      

<script>
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

        $.fn.DataTable.ext.pager.numbers_length = 5;

        var tabel = $('#cctv_problem_all_tabel').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#cctv_problem_all_tabel_filter input')
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
            "iDisplayLength": 10,
            
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('store/problem_all')?>",
                "type": "POST"
            },
            columns: [
                {"data": "NO_PROBLEM"},
                {"data": "INPUT_DATE"},
                {"data": "KD_STORE"},
                {"data": "NAMA_STORE"},
                {"data": "STATUS_PROBLEM"},
                {"data": "ACTION"}
            ],
            order: [[4, 'desc'],[1, 'desc']],            
        });

    });
</script>