<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
  $result_login = $this->session->flashdata('result_login');
  $logo = base_url().'assets\app\images\app\logo_koperasi.png';
  
  ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <center><img src="<?php echo $logo; ?>" width="150" class="img-responsive" alt="Logo Koperasi"></center>    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Aplikasi Koperasi </br>Mekar Mandiri Sejahtera</p>
    <form id="form_login" action="loginMe" method="post">
                <div class="form-group has-feedback">
                    <input type="input" class="form-control form-control-sm" id="username" name="username" placeholder="NIK" onkeypress="return validasiAngka(event)">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block btn-sm">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  </br>
  <!-- /.login-box-body -->
  <?php
    if ($result_login) {
        ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Ooppsss!</h4>
            <?php echo $result_login; ?>
          </div> 
  <?php } ?>
</div>
<!-- /.login-box -->
