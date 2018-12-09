<?php
    $date = new DateTime('-1 day');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Report BM
      <small>IT Menu</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Report BM</li>
    </ol>
  </section>

<!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!--<h3 class="box-title">Toko Alfamart Bandung 1</h3>-->
          </div>
          <div class="box-body">
            <form class="col-md-4 col-md-offset-4" id="form_report_bm" action="report_bm/generate_report_bm" method="post">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Report:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker_report_bm" name="datepicker_report_bm" value="<?php echo $date->format("d-m-Y"); ?>">
                </div>
                <!-- /.input group -->
              </div>
              <div class="row">
                  <div class="col-xs-12">
                      <button type="submit" class="btn btn-danger btn-block btn-flat">Process</button>
                      <button type="submit" class="btn btn-danger btn-block btn-flat disabled">Processing...</button>
                  </div>
                  <div class="col-xs-12">
                    <div class="progress active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                        <span class="sr-only">50% Complete</span>
                      </div>
                    </div>
                  </div>  
                  <!-- hidden -->
                  <div class="col-xs-12 hidden">
                    <div class="progress active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                        <span class="sr-only">50% Complete</span>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
              </div>
              
            </form> 




            <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">NO</th>
                  <th style="width: 300px">DESCP</th>
                  <th>BUDGET</th>
                  <th>ACTUAL</th>
                  <th style="width: 100px">ACH</th>
                  <th style="width: 100px">TIME FACTOR</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>TOTAL SALES</td>
                  <td>6,631,825,667</td>
                  <td>5,426,490,009</td>
                  <td><span class="badge bg-yellow">79.04%</span></td>
                  <td><span class="badge bg-blue">28.57%</span></td>
                </tr>
              </table> 
          
            
          </div>
        </div>
      </div>
    </div>

</div>
