<?php
    $date = new DateTime('-1 day');

    //variabel untuk sales
    $bh_total_sales = $budget_harian[0]->NET_SALES;
    $bh_sales_reg = $budget_harian[0]->SLS_REG;
    $bh_sales_ssp = $budget_harian[0]->SLS_SSP;
    $bh_toko_go = $budget_harian[0]->TOKO_GO;
    $bh_jhk_go = $budget_harian[0]->JHK_GO;
    $bh_spd = $budget_harian[0]->SPD;
    $bh_spd_reg = $budget_harian[0]->SPD_REG;
    $bh_std = $budget_harian[0]->STD;
    $bh_std_reg = $budget_harian[0]->STD_REG;
    $bh_apc = $budget_harian[0]->APC;
    $bh_apc_reg = $budget_harian[0]->APC_REG;
    $bh_pgm = $budget_harian[0]->PGM;
    $bh_pgm_reg = $budget_harian[0]->PGM_REG;
    $bh_oos = $budget_harian[0]->OOS;
    $bh_dsi = $budget_harian[0]->DSI;
    $bh_evoucher = $budget_harian[0]->EVOUCHER;
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
            <h3 class="box-title">Report Sales Harian BM <?php echo $date_title; ?></h3>
            <div class="btn-group pull-right">
              <a type="button" class="btn btn-success btn-flat" href="https://web.whatsapp.com" target="_blank">Kirim Ke Whatsapp</a>
              <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Kirim ke Email</a></li>
                <li class="divider"></li>
                <li><a href="#">Download (.xlsx)</a></li>
              </ul>
            </div>
          </div>
          <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th style="width: 10px">NO</th>
              <th style="width: 200px">DESCP</th>
              <th>BUDGET</th>
              <th>ACTUAL</th>
              <th style="width: 100px">ACH</th>
              <th style="width: 100px">TIME FACTOR</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1.</td>
              <td>TOTAL SALES</td>
              <td><?php echo $bh_total_sales; ?></td>
              <td><?php echo $actual_harian_all[0]->NET_SALES; ?></td>
              <td><span class="badge bg-yellow"><?php echo $actual_harian_all[0]->NET_SALES/$bh_total_sales*100;?>%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>TOTAL SALES TK REG</td>
              <td><?php echo $bh_sales_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>TOTAL SALES SSP</td>
              <td><?php echo $bh_sales_ssp; ?></td>
              <td><?php echo $actual_harian_ssp[0]->NET_SALES; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td>OPENING STORE</td>
              <td><?php echo $bh_toko_go; ?></td>
              <td><?php echo '-'; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td>JHK NEW STORE</td>
              <td><?php echo $bh_jhk_go; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>4</td>
              <td>SPD</td>
              <td><?php echo $bh_spd; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>SPD TK REG</td>
              <td><?php echo $bh_spd_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>5</td>
              <td>STD</td>
              <td><?php echo $bh_std; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>STD TK REG</td>
              <td><?php echo $bh_std_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>6</td>
              <td>APC</td>
              <td><?php echo $bh_apc; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>APC TK REG</td>
              <td><?php echo $bh_apc_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>7</td>
              <td>% GM</td>
              <td><?php echo $bh_pgm; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>% TK REG</td>
              <td><?php echo $bh_pgm_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>8</td>
              <td>OOS</td>
              <td><?php echo $bh_oos; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>9</td>
              <td>DSI</td>
              <td><?php echo $bh_dsi; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>10</td>
              <td>E-VOUCHER</td>
              <td><?php echo $bh_evoucher; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
          </tbody>
          </table>   
          </div>
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Report Sales Harian BM 1 s.d <?php echo $date_title; ?></h3>
            <div class="btn-group pull-right">
              <a type="button" class="btn btn-success btn-flat" href="https://web.whatsapp.com" target="_blank">Kirim Ke Whatsapp</a>
              <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Kirim ke Email</a></li>
                <li class="divider"></li>
                <li><a href="#">Download (.xlsx)</a></li>
              </ul>
            </div>
          </div>
          <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th style="width: 10px">NO</th>
              <th style="width: 200px">DESCP</th>
              <th>BUDGET</th>
              <th>ACTUAL</th>
              <th style="width: 100px">ACH</th>
              <th style="width: 100px">TIME FACTOR</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1.</td>
              <td>TOTAL SALES</td>
              <td><?php echo $bh_total_sales; ?></td>
              <td><?php echo $actual_harian_all[0]->NET_SALES; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>TOTAL SALES TK REG</td>
              <td><?php echo $bh_sales_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>TOTAL SALES SSP</td>
              <td><?php echo $bh_sales_ssp; ?></td>
              <td><?php echo $actual_harian_ssp[0]->NET_SALES; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td>OPENING STORE</td>
              <td><?php echo $bh_toko_go; ?></td>
              <td><?php echo '-'; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td>JHK NEW STORE</td>
              <td><?php echo $bh_jhk_go; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>4</td>
              <td>SPD</td>
              <td><?php echo $bh_spd; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>SPD TK REG</td>
              <td><?php echo $bh_spd_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>5</td>
              <td>STD</td>
              <td><?php echo $bh_std; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>STD TK REG</td>
              <td><?php echo $bh_std_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>6</td>
              <td>APC</td>
              <td><?php echo $bh_apc; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>APC TK REG</td>
              <td><?php echo $bh_apc_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>7</td>
              <td>% GM</td>
              <td><?php echo $bh_pgm; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td></td>
              <td>% TK REG</td>
              <td><?php echo $bh_pgm_reg; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>8</td>
              <td>OOS</td>
              <td><?php echo $bh_oos; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>9</td>
              <td>DSI</td>
              <td><?php echo $bh_dsi; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
            <tr>
              <td>10</td>
              <td>E-VOUCHER</td>
              <td><?php echo $bh_evoucher; ?></td>
              <td><?php echo $actual_harian_reg[0]->SLS_REG; ?></td>
              <td><span class="badge bg-yellow">79.04%</span></td>
              <td><span class="badge bg-blue">28.57%</span></td>
            </tr>
          </tbody>
          </table>   
          </div>
        </div>




      </div>
    </div>

</div>

<!--

            <table class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%" id="cari_toko_table">
                <thead>
                    <tr>
                      <th>Kode Toko</th>
                      <th>Nama Toko</th>
                      <th>KOTA</th>
                      <th>view</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                      <th>ASD</th>
                      <th>123 Toko</th>
                      <th>K546OTA</th>
                      <th>vi45645ew</th>
                    </tr>
                    <tr>
                      <th>ASFGSDGSFSo</th>
                      <th>NaASko</th>
                      <th>K2312TA</th>
                      <th>vi123</th>
                    </tr>
                </tbody>   
            </table>
            <?php
            foreach($budget_harian as $row) {
              echo "NET SALES: ".$row->NET_SALES."<br>";
              echo "SALES REG: ".$row->SLS_REG."<br>";
              echo "SALES SSP: ".$row->SLS_SSP."<br>";
              echo "TOKO GO: ".$row->TOKO_GO."<br>";
              echo "JHK GO: ".$row->JHK_GO."<br>";
              echo "SPD: ".$row->SPD."<br>";
              echo "SPD REG: ".$row->SPD_REG."<br>";
              echo "STD: ".$row->STD."<br>";
              echo "STD REG: ".$row->STD_REG."<br>";
              echo "APC: ".$row->APC."<br>";
              echo "APC REG: ".$row->APC_REG."<br>";
              echo "PGM: ".$row->PGM."<br>";
              echo "PGM REG: ".$row->PGM_REG."<br>";
              echo "OOS: ".$row->OOS."<br>";
              echo "DSI: ".$row->DSI."<br>";
              echo "EVOUCHER: ".$row->EVOUCHER."<br>";
            }

            foreach($budget_bulanan as $row) {
                echo "NET SALES: ".$row->NET_SALES."<br>";
                echo "SALES REG: ".$row->SLS_REG."<br>";
                echo "SALES SSP: ".$row->SLS_SSP."<br>";
                echo "TOKO GO: ".$row->TOKO_GO."<br>";
                echo "JHK GO: ".$row->JHK_GO."<br>";
                echo "SPD: ".$row->SPD."<br>";
                echo "SPD REG: ".$row->SPD_REG."<br>";
                echo "STD: ".$row->STD."<br>";
                echo "STD REG: ".$row->STD_REG."<br>";
                echo "APC: ".$row->APC."<br>";
                echo "APC REG: ".$row->APC_REG."<br>";
                echo "PGM: ".$row->PGM."<br>";
                echo "PGM REG: ".$row->PGM_REG."<br>";
                echo "OOS: ".$row->OOS."<br>";
                echo "DSI: ".$row->DSI."<br>";
                echo "EVOUCHER: ".$row->EVOUCHER."<br>";
            }

            foreach($actual_harian_all as $row) {
                echo "NET SALES: ".$row->NET_SALES."<br>";
                echo "SPD: ".$row->SPD."<br>";
                echo "STD: ".$row->STD."<br>";
                echo "APC: ".$row->APC."<br>";
                echo "PGM: ".$row->PGM."<br>";
            }
            ?>
            -->