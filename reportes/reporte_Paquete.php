<?php
require "fpdf.php";
class PDF extends FPDF{
  function Header()
{
    // Logo     el 83 define el tama�o el 10 es un tab, el 8 es lineas
    $this->Image('logo_developer.png',10,8,30);
    $this->Image('logo_equipo.png',240,8,30);
}

//Pie de página
function Footer(){
  //Pocisión a 1.5cm del final
  $this->SetY(-15);
  //Fuente Arial itálica 8
  $this->SetFont('Arial','I',8);
  // Número de página
  $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//CREACION DE LA HOJA
//$years=$_GET['years'];
$pdf = new PDF('L', 'mm','Letter');
$pdf->setMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();

//TITULO
$pdf->SetTextColor(0x00,0x00,0x00);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0,5,'DEVELOPER WEB ',0,1,'C');
$pdf->Cell(0,5,'Lista De Paquetes',0,1,'C');


//CADENA DE CONEXION
$con = mysqli_connect("localhost","root","","developer_web2");
//salto de linea por cada registro encontrado en la tabla Ln();
  $pdf->Ln();

  
  //segundo grupo lactantes2
  $pdf->Ln();
  
  //1 indica borde, 0 no hace salto de linea, c es centrado

 
$consulta = "SELECT id_paquete,tipo_paquete,caracteristicas,costo FROM paquetes";
  
$result = mysqli_query($con,$consulta);
$pdf->Ln();
    //aqui agregue las cabeceras de las tablas
    $pdf->SetFont('Arial','b',7);
    $pdf->Cell(10,5, "Id",1,0,'C');
    $pdf->Cell(30,5, utf8_decode("Tipo"),1,0,'C');
    $pdf->Cell(150,5, utf8_decode("Caracteristicas"),1,0,'C');
    $pdf->Cell(30,5, utf8_decode("Costo"),1,0,'C');

while($row = mysqli_fetch_array($result)){ 

    $pdf->Ln();
    $pdf->Cell(10,5, $row[0],1,0,'C');
    $pdf->Cell(30,5, $row[1],1,0,'C');
    $pdf->Cell(150,5, $row[2],1,0,'C');
    $pdf->Cell(30,5, $row[3],1,0,'C');

  
 
 
    $exec=mysqli_query($con,$consulta); 


  
  }  

  mysqli_close($con);
  session_start();

  if(@$_SESSION['validada']==1) {
  $pdf->Output();
  } else
    header('location: ../inicio_sesion.html')
?>