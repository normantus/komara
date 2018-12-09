
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

    //cari toko
    var t = $("#cari_toko").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#cari_toko_filter input')
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
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {"url": "cari_toko/json_data_toko", "type": "POST"},
        columns: [

            {
                "Name": 'id_test',
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {"data": "KD_STORE"},
            {"data": "NAMA_STORE"},
            {"data": "TELPS"},
            {"data": "TELPD"},
            {"data": "ALAMAT"},
            {"data": "AC"},
            {"data": "AM"},
            {"data": "KOTA"},
            {"data": "TGL_BUKA"},
            {"data": "RIT"},
            {"data": "TYPE_TOKO"},
            {"data": "view"}

        ],
        order: [[1, 'asc']],
    });

       

    //cek koneksi toko
    var t = $("#cek_koneksi_toko").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#cek_koneksi_toko_filter input')
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
        responsive: true,
        order: [[0, 'asc']],
    });

    //report_bm
    var t = $("#report_bm").dataTable({
        
    });

        
    


});

function edit_email(id)
    {
      $('#form_update_email')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "cari_toko/ajax_detail_toko/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
         
          $('[name="kd_store"]').val(data.KD_STORE);
          $('[name="nama_store"]').val(data.NAMA_STORE);
          $('[name="email"]').val(data.ALAMAT);
          
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Update Email Toko '+data.KD_STORE); // Set title to Bootstrap modal title
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

