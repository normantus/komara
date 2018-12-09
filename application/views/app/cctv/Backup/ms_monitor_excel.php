<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=karyawan_". date('dmY').".xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet('Karyawan');

$header =& $workbook->add_format();
$header->set_color('black'); // set warna huruf
$header->set_border_color('black'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil

$worksheet1->write_string(0,0,'No.',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,5); // Set lebar kolom
$worksheet1->write_string(0,1,'NIK',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,25); // Set lebar kolom 
$worksheet1->write_string(0,2,'Nama lengkap',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,40); // Set lebar kolom
$worksheet1->write_string(0,3,'Alamat',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,70); // Set lebar kolom
$worksheet1->write_string(0,4,'Departemen',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,20); // Set lebar kolom
$worksheet1->write_string(0,5,'Jabatan',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,20); // Set lebar kolom

$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$no=1;
$row = 1;
foreach ($data as $key) {
    $worksheet1->write_string($row,0,  $no++ ,$content);
    $worksheet1->write_string($row,1,  $key->NIK ,$content);
    $worksheet1->write_string($row,2,  $key->NAMA ,$content);
    $worksheet1->write_string($row,3,  $key->ALAMAT ,$content);
    $worksheet1->write_string($row,4,  $key->NAMA_DEPARTEMEN ,$content);
    $worksheet1->write_string($row,5,  $key->NAMA_JABATAN ,$content);
    $row++;
}

$workbook->close();