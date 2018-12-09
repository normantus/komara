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
        <h1>Input Kerusakan CCTV</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li>CCTV</li>
            <li class="active">Input Kerusakan CCTV</li>
        </ol>
    </section>
    <!-- //Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Isi halaman -->
                <form id="form_problem_cctv_new" action="#" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="pull-left">
                            <a style="color: #d9534f" type="button" class="btn btn-box-tool" href="<?php echo $menu.''; ?>"><i class="fa fa-arrow-left fa-2x"></i></a>
                        </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-success btn-flat" onclick="test()"><span class="fa fa-floppy-o"></span> Simpan</a></button>
                                <button type="button" class="btn btn-danger btn-flat"><span class="fa fa-ban"></span> Reset</a></button>
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
                                            <!--<li role="presentation"><a href="#detail_kerusakan_cctv" aria-controls="detail_kerusakan_cctv" role="tab" data-toggle="tab" hidden>Detail Kerusakan CCTV</a></li>-->
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="data_toko">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="id" class="col-md-offset-1 col-md-2 control-label">No. Problem</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="id" name="id" value="" >
                                                            </div>
                                                        </div>           
                                                        <div class="form-group">
                                                            <label for="nm" class="col-md-offset-1 col-md-2 control-label" id="nm" name="nm">Tgl Info Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right datepicker" id="nm" name="nm" value="<?php echo $date->format("d-m-Y"); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    function test()
    {
       
       // ajax adding data to database
       $.ajax({
        url : "../cctv_problem/test",
        type: "POST",
        data: $('#form_problem_cctv_new').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               alert("Success menambahkan data");
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          }); 
     }
    
</script>



<!-- Modal List Toko-->
<div class="modal fade" id="listToko" tabindex="-1" role="dialog" aria-labelledby="listTokoLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="listTokoLabel">List Toko</h4>
      </div>
      <div class="modal-body">
            <table class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%" id="list_toko_table">
                            <thead>
                                <tr>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
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