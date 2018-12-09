<?php
class PDF extends FPDF_Protection
{
    //Page header
    function Header()
    {       
        //$this->Image(base_url().'assets/dist/img/user7-12x128.jpg', 10, 25,'20','20','jpeg');
        
        //Header Pages    
        $this->setFont('Arial','B',10);
        $this->setFillColor(255,255,255); 
        $this->cell(0,6,'MP-RUMAH MAKAN',0,1,'C',1);
        
        $this->setFont('Arial','I',8); 
        $this->cell(0,6,'Jl.xxxxxxx xxxxx no.xxx telp. xxxxxx',0,1,'C',1);
        
        //buat garis horizontal
        $this->Ln(6);
        $this->Line(20,$this->GetY(),190,$this->GetY());
        $this->Line(20,$this->GetY(),190,$this->GetY());
        $this->Line(20,$this->GetY(),190,$this->GetY());
        $this->Line(20,$this->GetY(),190,$this->GetY());


        //Judul Table
        $this->Ln(8);
        $this->setFont('Arial','',10);
        $this->cell(0,6,'Laporan Daftar Pegawai',0,1,'C',1); 
        $this->cell(0,6,"Periode : ".date('F Y'),0,1,'C',1);                  
         


        //Header untuk Table       
        $this->Ln(4);
        $this->setFont('Arial','b',9);
        $this->setFillColor(220,220,200);
        //jumlah cell max 195
        $this->cell(8,7,'No.',1,0,'C',1);
        $this->cell(20,7,'NIK',1,0,'C',1);
        $this->cell(40,7,'NAMA',1,0,'C',1);
        $this->cell(50,7,'ALAMAT',1,0,'C',1);
        $this->cell(25,7,'NO. HP',1,0,'C',1);
        $this->cell(30,7,'KOTA',1,0,'C',1);
        $this->cell(30,7,'DEPARTEMEN',1,0,'C',1);
        $this->cell(30,7,'JABATAN',1,0,'C',1);
        $this->cell(30,7,'MULAI KONTRAK',1,0,'C',1);
        $this->cell(30,7,'HABIS KONTRAK',1,0,'C',1);
        $this->cell(30,7,'TGL EXP. KTP',1,1,'C',1);
        //$this->cell(100,6,'Jenis Kelamin',1,1,'C',1);
                
    }
 
    function Content($data)
    {
        $no = 1;
        foreach ($data as $key) {
            $this->setFont('Arial','',8);
            $this->setFillColor(255,255,255);   
            $this->cell(8,6,$no,1,0,'R',1);
            $this->cell(20,6,$key->NIK,1,0,'L',1);
            $this->cell(40,6,$key->NAMA,1,0,'L',1);
            $this->cell(50,6,$key->ALAMAT,1,0,'L',1);
            $this->cell(25,6,$key->HP,1,0,'L',1);
            $this->cell(30,6,$key->KOTA,1,0,'L',1);
            $this->cell(30,6,$key->NAMA_DEPARTEMEN,1,0,'L',1);
            $this->cell(30,6,$key->NAMA_JABATAN,1,0,'L',1);
            $this->cell(30,6,$key->TG_STARTKONTRAK,1,0,'L',1);
            $this->cell(30,6,$key->TG_ENDKONTRAK,1,0,'L',1);
            $this->cell(30,6,$key->EXP_KTP,1,1,'L',1);
            // $this->cell(100,10,$key->ALAMAT,1,1,'L',1);
            
            $no++;
    }            

    }
    function Footer()
    {
        //atur posisi 2 cm dari bawah
        $this->SetY(-20);
        //buat garis horizontal
        $this->Line(20,$this->GetY(),190,$this->GetY());
        //Arial italic 9
        $this->SetFont('Arial','I',7);
        //$this->Cell(0,10,'copyright ridwan software house' . date('Y'),0,0,'L');
        $this->cell(0,10,"Tanggal cetak : " . date('d/m/Y'),0,0,'L');
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'R');
    }
}


$pdf = new PDF('L','mm','A4');
$pdf->SetProtection(array('print'));
$pdf->setMargins(10,10,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output('Report_karyawan_'.date('d_m_Y').'.pdf','I');




//custom size paper 100x150mm
//$pdf = new FPDF('P','mm',array(100,150));