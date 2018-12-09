<!doctype html>
<html>
    <head>
        <title>Serverside Datatables Codeigniter - harviacode</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
        </style>        
    </head>
    <body>
        <div class="container">
            <h2>City Country - Harviacode</h2>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                        <?php echo anchor(site_url('world/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                        <?php echo anchor(site_url('world/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>Kode Toko</th>
                      <th>Nama Toko</th>
                      <th>RIT</th>
                      <th>TIPE TOKO</th>
                      <th>TELP</th>
                      <th>TELP 2</th>
                      <th>KOTA</th>
                      <th>TGL BUKA</th>
                      <th>AC</th>
                      <th>AM</th>
                      <th>EMAIL</th>
                      <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>" ></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>" ></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
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
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value.toUpperCase()).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "monitoring_it/cari_toko/json", "type": "POST"},
                    columns: [

                        {"data": "KD_STORE"},
                        {"data": "NAMA_STORE"},
                        {"data": "RIT"},
                        {"data": "TYPE_TOKO"},
                        {"data": "TELPS"},
                        {"data": "TELPD"},
                        {"data": "KOTA"},
                        {"data": "TGL_BUKA"},
                        {"data": "AC"},
                        {"data": "AM"},
                        {"data": "ALAMAT"},
                        {"data": "view"}

                    ],
                    order: [[1, 'asc']],
                    
                });
            });
        </script>
    </body>
</html>

