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
    $kd_store = $this->session->userdata('kd_store');
    $menu = base_url();

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Input Kerusakan CCTV</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
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
                                <button type="button" class="btn btn-success btn-flat" onclick="save_cctv_problem()"><span class="fa fa-floppy-o"></span> Simpan</a></button>
                                <button type="reset" class="btn btn-danger btn-flat"><span class="fa fa-ban"></span> Reset</a></button>
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
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="data_toko">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="no_problem" class="col-md-offset-1 col-md-2 control-label">No. Problem</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="no_problem" name="no_problem" readonly>
                                                            </div>
                                                        </div>           
                                                        <div class="form-group">
                                                            <label for="kode_toko" class="col-md-offset-1 col-md-2 control-label">Kode Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="kode_toko" name="kode_toko" maxlength="4" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_toko" class="col-md-offset-1 col-md-2 control-label">Nama Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="nama_toko" name="nama_toko" maxlength="20" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat" class="col-md-offset-1 col-md-2 control-label">Alamat</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="alamat" name="alamat" rows="4" maxlength="500" value="" readonly></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status" class="col-md-offset-1 col-md-2 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="status" name="status" maxlength="7" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telp" class="col-md-offset-1 col-md-2 control-label">Telp Toko</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="telp" name="telp" maxlength="12" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jarak" class="col-md-offset-1 col-md-2 control-label">Jarak</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="jarak" name="jarak" maxlength="7" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_go" class="col-md-offset-1 col-md-2 control-label">Tanggal GO</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control input-md" id="tgl_go" name="tgl_go" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="am_nik" class="col-md-offset-1 col-md-2 control-label">Area Manager</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control input-md" id="am_nik" name="am_nik" maxlength="50" value="" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-md" id="am_nama" name="am_nama" maxlength="50" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ac_nik" class="col-md-offset-1 col-md-2 control-label">Area Coord.</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control input-md" id="ac_nik" name="ac_nik" maxlength="50" value="" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-md" id="ac_nama" name="ac_nama" maxlength="50" value="" readonly>
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
                                                                    <input type="text" class="form-control pull-right datepicker" id="tgl_info_kerusakan" name="tgl_info_kerusakan" value="<?php echo $date->format("d-m-Y"); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="info_kerusakan" class="col-md-offset-1 col-md-2 control-label">Info Kerusakan</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" class="form-control input-md" id="info_kerusakan" name="info_kerusakan" maxlength="500" onkeyup="uppercase(this)"></textarea>
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
        $.ajax({
        url : "<?php echo site_url('api/faktur/get')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="no_problem"]').val(data.FAKTUR);
            //$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Form Update Email Toko '+data.KD_STORE); // Set title to Bootstrap modal title  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Terjadi kesalahan saat ambil faktur');
        }
        });
    });

    $(document).ready(function() {
        $.ajax({
        url : "<?php echo site_url('api/store/detail/'.$kd_store)?>",
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
    });

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
                "url": "<?php echo site_url('api/store/list')?>",
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

    } );

    $(document).on('click', '.pilih_toko', function (e) {
        var id = $(this).attr('data-kd-toko');
        document.getElementById("kode_toko").value = id;
        get_detail_toko(id);
        $('#listToko').modal('hide');
    });

    function jquery_get_detail_toko(e) {
    if (e.keyCode == 13) {
        var id = document.getElementById("kode_toko").value
        get_detail_toko(id);
        }
    }

    function get_detail_toko(id) {
    //$('#form_update_email')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
        url : "<?php echo site_url('api/store/detail/')?>" + id,
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

    function uppercase(element){
        element.value = element.value.toUpperCase();
    }

    function save_cctv_problem()
    {
        var base_url = "<?php echo base_url();?>";
       // ajax adding data to database
        $.ajax({
        url: "<?php echo site_url('api/problem/save')?>",
        type: "POST",
        data: $('#form_problem_cctv_new').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               //document.getElementById("form_problem_cctv_new").reset();
               //$('#form_problem_cctv_new').reset(); // reset form on modals
               //confirm('Berhasil menambahkan problem CCTV');
               //location.reload();
               location.replace(base_url + 'dashboard'); // belum berhasil redirect ke dashboard
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
                swal({
                    title: 'Ooppsss!',   
                    text: 'Gagal Menyimpan Data Problem CCTV. Hubungi Administrator!',   
                    type: 'error',     
                    confirmButtonText: 'Ok',     
                    closeOnConfirm: false
                });
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