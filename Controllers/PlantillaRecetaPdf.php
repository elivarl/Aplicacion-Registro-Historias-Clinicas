<?php 
require('fpdf/fpdf.php');
class PlantillaRecetaPdf extends FPDF
{
	function encabezadoReceta()
    {
        $this->SetFont('Arial','B',15);
        $this->SetXY(80, 10);
        $this->Cell(60,10,  utf8_decode('Receta Médica'));
        //linea
        $this->Line( 10,  20,  195,  20);

        //DATOS HC
        $this->SetFont('Arial','B',10);
        $this->SetXY(10, 18);
        $this->Cell(40,10,  utf8_decode('INSTRUCCIONES MEDICACIÓN'));
        $this->Ln();
       // $this->Cell(35,10,  utf8_decode('Número HC: '.$numero_hc),1, 0 , 'L' );
        //$this->Cell(55,10,  utf8_decode('Cédula Identidad: '.$cedula),1, 0 , 'L' );
        //$this->Cell(67,10,  utf8_decode('Nombres : '.$nombres),1, 0 , 'L' );
    }
    function cuerpoReceta($receta)
    {
        //informaciòn receta
        $this->SetFont('Arial','B',10);
        $this->SetXY(10, 25);
        $this->Cell(40,10,  utf8_decode('Medicamentos:'));
        $this->SetXY(120, 25);
        $this->Cell(40,10,  utf8_decode('Fecha Consulta: '.$receta[0]['fecha']));        
        $this->Ln();
        $this->SetFont('Arial','',10);     
        $this->MultiCell(150,5,  utf8_decode($receta[0]['medicamentos']));
        $this->Ln();
        $this->SetFont('Arial','B',10);
        $this->Cell(40,10,  utf8_decode('Instrucciones:'));
        $this->Ln();
        $this->SetFont('Arial','',10);
       	$this->MultiCell(150,5,  utf8_decode($receta[0]['indicaciones']) );
    }


}