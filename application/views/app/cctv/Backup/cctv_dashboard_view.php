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

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard CCTV
        <small>IT Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard CCTV</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
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
          <div class="small-box bg-red">
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
          <div class="small-box bg-yellow">
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
          <div class="small-box bg-green">
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

      <div class="row hidden" id="recap_report" >
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row" id="new_problem">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recap Problem CCTV New</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="cctv_problem_new_tabel" 
                    class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
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
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" id="progress_problem">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recap Problem CCTV Progress</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="cctv_problem_progress_tabel" 
                    class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No. Problem</th>
                                <th>Tanggal Input</th>
                                <th>SPK</th>
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
                                <th>SPK</th>
                                <th>Kode Toko</th>
                                <th>Nama Toko</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" id="solve_problem">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recap Problem CCTV Solve</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="cctv_problem_solve_tabel" 
                    class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No. Problem</th>
                                <th>Tanggal Input</th>
                                <th>SPK</th>
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
                                <th>SPK</th>
                                <th>Kode Toko</th>
                                <th>Nama Toko</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

        $.fn.DataTable.ext.pager.numbers_length = 3;

        var tabel = $('#cctv_problem_new_tabel').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#cctv_problem_new_tabel_filter input')
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
                "url": "<?php echo site_url('cctv/cctv_problem/ajax_list_problem_cctv_new')?>",
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
            order: [[0, 'asc']],            
        });

        var tabel = $('#cctv_problem_progress_tabel').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#cctv_problem_progress_tabel_filter input')
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
                "url": "<?php echo site_url('cctv/cctv_problem/ajax_list_problem_cctv_progress')?>",
                "type": "POST"
            },
            columns: [
                {"data": "NO_PROBLEM"},
                {"data": "INPUT_DATE"},
                {"data": "NO_SPK"},
                {"data": "KD_STORE"},
                {"data": "NAMA_STORE"},
                {"data": "STATUS_PROBLEM"},
                {"data": "ACTION"}
            ],
            order: [[0, 'asc']],            
        });

        var tabel = $('#cctv_problem_solve_tabel').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#cctv_problem_solve_tabel_filter input')
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
                "url": "<?php echo site_url('cctv/cctv_problem/ajax_list_problem_cctv_solve')?>",
                "type": "POST"
            },
            columns: [
                {"data": "NO_PROBLEM"},
                {"data": "INPUT_DATE"},
                {"data": "NO_SPK"},
                {"data": "KD_STORE"},
                {"data": "NAMA_STORE"},
                {"data": "STATUS_PROBLEM"},
                {"data": "ACTION"}
            ],
            order: [[0, 'asc']],            
        });

    });
</script>