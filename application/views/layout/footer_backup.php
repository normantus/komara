<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    $status_login = $this->session->userdata('status_login'); 
    if ($status_login)
        {
?>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Alpha Tester
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#"><!--PT. Sumber Alfaria Trijaya, Tbk -->SAT IT Bandung 1</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Locksreen -->
<div class="modal fade" id="required_pin">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <div class="lockscreen-logo">
                  <a><b>Required</b> PIN</a>
                </div>
                <div class="text-center">
                    <!-- START LOCK SCREEN ITEM -->
                    <div class="lockscreen-image ">
                        <img src="<?php echo base_url().'assets/app/images/avatar/'.$this->session->userdata('photo'); ?>" alt="User Image">
                      </div>
                    <div class="text-center">
                      Enter your PIN to allow your edit permission
                    </div>
                    <div class="lockscreen-item">
                      <!-- lockscreen credentials (contains the form) -->
                      <form id="form_required_pin" action="#" method="post">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" id="pin" name="pin" placeholder="PIN" onkeypress="return validasiAngka(event)">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-danger btn-block btn-flat" id="btnPIN" onclick="validasi()">Submit</button>
                            </div>
                            <!-- /.col -->
                        </div>
                      </form>
                    </div>
                    <!-- /.lockscreen-item -->
                  </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<?php
    }
?>



<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.keyTable.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- bootsrapValidator -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/bootstrapValidator/js/bootstrapValidator.min.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/dist/js/datatables.js"></script>
<!-- PACE -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/PACE/pace.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/bower_components/Chart.js/Chart.js"></script>

<!-- JS Local -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/dist/js/itmenu.js"></script>
<!-- Local : form_validator -->
<script src="<?php echo base_url(); ?>assets/app/themes/AdminLTE/dist/js/form_validator.js"></script>






<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>