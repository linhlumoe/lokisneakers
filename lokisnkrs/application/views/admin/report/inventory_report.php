
<?php
require('tfpdf.php');

class PDF extends TFPDF
{
// Page header
function Header()
{
	$this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$this->SetFont('DejaVu','',9);
    // Title
    $this->Cell(35,0,'Cửa hàng bán giày chính hãng LokiSneaker',0, 1);
	$this->Cell(155);
	$this->Cell(35,0,'14520472_14520434',0, 1);
    // Line break
    $this->Ln(5);
}

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

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.5);
    $this->SetFont('','');
    // Header
    $w = array(20, 85, 30, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
	$i = 1;
    foreach($data as $row){
		$this->Cell(7);
        $this->Cell($w[0],6,$i,'LR',0,'C',$fill);
        $this->Cell($w[1],6,$row->product_name,'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row->size,'LR',0,'C',$fill);
        $this->Cell($w[3],6,$row->quantity,'LR',0,'C',$fill);
        $this->Ln();
		$i++;
        $fill = !$fill;
    }
    // Closing line
	$this->Cell(7);
    $this->Cell(array_sum($w),0,'','T');
}
}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Trang '.$this->PageNo().'/{nb}',0,0,'C');
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Image(base_url('upload/').'logo.png', 20, 15, 43);
// Arial bold 15
$pdf->SetFont('DejaVu','',13);
// Move to the right
$pdf->Cell(90);
// Title
$pdf->Cell(35,10,'Cộng hoà xã hội chủ nghĩa Việt Nam',0, 1);
$pdf->Cell(100);
$pdf->Cell(35,8,'Độc lập - Tự do - Hạnh phúc',0, 1);
$pdf->Cell(130);
$pdf->SetFont('DejaVu','',11);
$pdf->Cell(30,30,'Ngày '.date('d').' tháng '.date('m').' năm '.date('Y').'',0, 1);

$pdf->SetFont('DejaVu','',20);
$pdf->Cell(65);
$pdf->Cell(0,0,'BÁO CÁO TỒN KHO',0, 1);
$pdf->Ln(10);

// Column headings
$header = array('STT', 'Tên sản phẩm', 'Size', 'Số lượng tồn');
// Data loading
$sql = "select product_name, size, quantity from product join product_detail on product.product_id = product_detail.product_id 
where quantity > 0 order by quantity desc, product_name";
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(7);

$pdf->FancyTable($header,$detail);
$pdf->Ln(10);
$pdf->Cell(103);
$pdf->SetFont('DejaVu','',14);
$pdf->Cell(0,0,'Tổng số lượng tồn: '.number_format($sum).' sản phẩm',0, 1);

$pdf->Ln(10);
$pdf->Output();
?>