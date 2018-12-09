<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.0.2.1 (Linux)"/>
	<meta name="author" content="EDP"/>
	<meta name="created" content="2018-03-22T08:20:09"/>
	<meta name="changed" content="2018-03-22T08:21:16"/>
	<meta name="KSOProductBuildVer" content="2057-10.1.0.5656"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:medium}
		td,tr,th {border: 1px solid #000000; padding-left: 5px; padding-right: 5px; height: 21}
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<?php foreach ($detail_problem as $bap) { ?>
<table cellspacing="0" border="1" width="700px">
	<tr>
		<td colspan=2><b>Kode Toko / Nama Toko</b></td>
		<td colspan=4><b><?php echo $bap->KD_STORE; ?> / <?php echo $bap->NAMA_STORE; ?></b></td>
	</tr>
	<tr>
		<td colspan=2><b><font size=3>Tanggal pelaporan</b></td>
		<td colspan=4><b><?php echo $bap->INPUT_DATE; ?></b></td>
	</tr>
	<tr>
		<td colspan=2><b>Tanggal instalasi baru</b></td>
		<td colspan=4><b><?php echo $bap->TGL_GO; ?></b></td>
	</tr>
	<tr>
		<td colspan=2><b>Tanggal Service terakhir</b></td>
		<td colspan=4><b></b></td>
	</tr>
	<tr>
		<td rowspan=9 align="center" valign=top width="30px"><b>A</b></td>
		<td colspan=5 ><b>Pelaporan Toko</b></td>
	</tr>
	<tr>
		<td valign=top><b>Laporan kerusakan:</b><br><small>*) dapat dilampiri foto</small></td>
		<td colspan=4 align="justify" valign="middle"><small><?php echo $bap->DAMAGE_INFO; ?></small></td>
	</tr>
	<tr>
		<td colspan="5"><b>Perangkat Rusak:</b></td>
	</tr>
	<tr>
		<td >DVR</td>
		<td align="center" width="50px"></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td >Adaptor</td>
		<td align="center"></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td >Instalasi kabel</td>
		<td align="center"></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td >Kamera</td>
		<td align="center"></td>
		<td colspan="3">Qty: Indoor (  ), Outdor (  )</td>
	</tr>
	<tr>
		<td >HDD</td>
		<td align="center"></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td >LCD</td>
		<td align="center"></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td rowspan=10 align="center" valign="top"><b>B</b></td>
		<td colspan=5><b>Pemeriksaan IT</b></td>
	</tr>
	<tr>
		<td valign=top><b>Detail kerusakan:</b></td>
		<td colspan=4 align="justify" valign="middle"><small><?php echo $bap->INSPECT_INFO; ?></small></td>
	</tr>
	<tr>
		<td colspan=3 rowspan=2 align="left" valign="middle"><b>Perangkat Rusak:</b></td>
		<td colspan=2 align="center"><b>Tindakan Service</b></td>
	</tr>
	<tr>
		<td align="center" width="30px"><b>Ganti</b></td>
		<td align="center" width="120px"><b>Perbaikan</b></td>
	</tr>
	<tr>
		<td >DVR</td>
		<td align="center"></td>
		<td></td>
		<td align="center"></td>
		<td></td>	
	</tr>
	<tr>
		<td >Adaptor</td>
		<td align="center"></td>
		<td></td>
		<td align="center"></td>
		<td></td>
	</tr>
	<tr>
		<td >Instalasi kabel</td>
		<td align="center"></td>
		<td></td>
		<td align="center"></td>
		<td></td>
	</tr>
	<tr>
		<td width="170px">Kamera</td>
		<td align="center" width="30px">V</td>
		<td>Qty: Indoor (  ), Outdor (  )</td>
		<td align="center" width="30px"></td>
		<td></td>
	</tr>
	<tr>
		<td >HDD</td>
		<td align="center"></td>
		<td></td>
		<td align="center"></td>
		<td></td>
	</tr>
	<tr>
		<td >LCD</td>
		<td align="center"></td>
		<td></td>
		<td align="center"></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" valign=top><b>Alasan khusus service </b><br><small>(jika ada)</small></td>
		<td colspan=4 align="justify" valign="middle"><br></td>
	</tr>
	<tr>
		<td colspan=2 align="center">Dibuat oleh,</td>
		<td colspan=2 align="center">Disetujui oleh,</td>
		<td colspan=2 align="center">Diterima</td>
	</tr>
	<tr>
		<td colspan=2 align="center">
			<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/itmenu/assets/app/images/app/ttd-ssi.png'; ?>"/>
		</td>
		<td colspan=2 align="center"></td>
		<td colspan=2 align="center"></td>
	</tr>
	<tr>
		<td colspan=2 height="21" align="center">(IT) SALEH ISMAIL</td>
		<td colspan=2 align="center">(AM) <?php echo $bap->AM_NAMA; ?></td>
		<td colspan=2 align="center">Vendor</td>
		</tr>
</table>
<?php } ?>
<!-- ************************************************************************** -->
</body>

</html>
