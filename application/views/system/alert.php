<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/toastr/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/toastr/toastr.min.css">

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "00",
            "hideDuration": "1000",
            "timeOut": "9000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        <?php if ($this->session->flashdata('success')) {?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('error')) {?>
            toastr.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } else if ($this->session->flashdata('warning')) {?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php } else if ($this->session->flashdata('info')) {?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php }?>


    </script>