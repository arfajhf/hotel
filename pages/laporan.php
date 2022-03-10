<?php
// require('../fpdf184/fpdf.php');
// $pdf = new FPDF('P', 'mm','Letter');

// $pdf->AddPage();

// $pdf->SetFont('Times','B',16);
// $pdf->Cell(0,7,'HOTEL SERASA',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'Jalan Pantai Kuta, Banjar Pande Mas, Kuta, Badung Regency, Bali 80361',0,1,'C');

// $pdf->Cell(10,7,'',0,1);

// $pdf->SetFont('Times','B',10);

// $pdf->Cell(8,6,'No',1,0,'C');
// $pdf->Cell(20,6,'Nama Kamar',1,0,'C');
// $pdf->Cell(50,6,'Tanggal Chekin',1,0,'C');
// $pdf->Cell(50,6,'Tanggal Chekout',1,0,'C');
// $pdf->Cell(30,6,'Jumlah Pesanan',1,0,'C');
// $pdf->Cell(30,6,'Nama Pemesan',1,0,'C');
// $pdf->Cell(30,6,'Email Pemesan',1,0,'C');
// $pdf->Cell(20,6,'No Hp',1,1,'C');
// $pdf->Cell(20,6,'Nama Tamu',1,1,'C');

// $pdf->SetFont('Times','',10);

// //Membuat Koneksi ke database akademik
// include '../config/config.hotel.php';
// $no=1;
// $jk='';
// //Query untuk mengambil data mahasiswa pada tabel mahasiswa
// $hasil = mysqli_query($conn, "select * from pemesanan order by nama_pemesan asc");
// while ($data = mysqli_fetch_array($hasil)){
//     $id = $data['id_kamar'];
//     $sql = mysqli_query($conn, "SELECT nama_kamar from kamar_hotel where id_kamar = '$id'");
//     $ambil = mysqli_fetch_array($sql);
//     $pdf->Cell(8,6,$no++,1,0);
//     $pdf->Cell(20,6,$ambil['nama_kamar'],1,0);
//     $pdf->Cell(50,6,$data['tanggal_chekin'],1,0);
//     $pdf->Cell(50,6,$data['tanggal_chekout'],1,0);
//     $pdf->Cell(30,6,$data['jumlah_pesan'],1,0);
//     $pdf->Cell(30,6,$data['nama_pemesan'],1,0);
//     $pdf->Cell(30,6,$data['email_pemesan'],1,0);
//     $pdf->Cell(20,6,$data['no_hp'],1,1);
//     $pdf->Cell(20,6,$data['nama_tamu'],1,1);
// }

// $pdf->Output();


require('../fpdf184/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Simple table
function BasicTable($header, $data)
{
	// Header
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		foreach($row as $col)
			$this->Cell(40,6,$col,1);
		$this->Ln();
	}
}

// Better table
function ImprovedTable($header, $data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
