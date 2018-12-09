//ajax pace loading
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.pace').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })

//fungsi falidasi input angka
function validasiAngka(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$.fn.datepicker.defaults.format = "dd-mm-yyyy";
$.fn.datepicker.defaults.weekStart = 1;
$(function () {
    //Date picker
    $('#datepicker_report_bm').datepicker({
        autoclose: true,
        todayHighlight: true,
        daysOfWeekHighlighted: 0
    });
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        daysOfWeekHighlighted: 0
    });
});
