<?php 
require('fpdf/fpdf.php');
class PlantillaHistoricoPdf extends FPDF
{
    function detalleHistoria($numero_hc, $cedula, $nombres)
    {
        $this->SetFont('Arial','B',15);
        $this->SetXY(70, 10);
        $this->Cell(40,10,  utf8_decode('Histórico Consultas'));
        //linea
        $this->Line( 10,  20,  195,  20);

        //DATOS HC
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 18);
        $this->Cell(40,10,  utf8_decode('DATOS HISTORIA CLÍNICA'));
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(35,10,  utf8_decode('Número HC: '.$numero_hc),1, 0 , 'L' );
        $this->Cell(55,10,  utf8_decode('Cédula Identidad: '.$cedula),1, 0 , 'L' );
        $this->Cell(67,10,  utf8_decode('Nombres : '.$nombres),1, 0 , 'L' );

    }

    function detallePersonales($genero, $edad_menarquia,$edad_menopausia, $vida_sexual,$ciclos,$edad_gestacion,$numero_partos,$numero_abortos,$numero_cesareas,$fecha_ultima_menstruacion,$fecha_ultima_menstruacion,$fecha_ultimo_parto,$hijos_vivos,$mp_familiar,$descripcion)
    {
        //DATOS AP
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 40);
        $this->Cell(40,10,  utf8_decode('DATOS ANTECEDENTES PERSONALES'));
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(45,10,  utf8_decode('Edad Menarquía: '.$edad_menarquia),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Edad Menopausia: '.$edad_menopausia),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Vida Sexual Activa : '.$vida_sexual),1, 0 , 'L' );        
        $this->Cell(45,10,  utf8_decode('Ciclos Menstruación : '.$ciclos),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('Edad Gesta: '.$edad_gestacion),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Partos: '.$numero_partos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abortos: '.$numero_abortos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Cesáreas: '.$numero_cesareas),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('F. U. M.: '.$fecha_ultima_menstruacion),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('F. U. P.: '.$fecha_ultimo_parto),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Hijos vivos: '.$hijos_vivos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('M. P. F.: '.$mp_familiar),1, 0 , 'L' );
        $this->Ln();
        $this->MultiCell(190,5,  utf8_decode('Descripción Adicional: '.$descripcion));

    }
    function detalleFamiliares($cardiopatia, $diabetes,$cancer,$enfcardiovasculares,$hipertension,$enfmentales,$tuberculosis,$enfinfecciosas, $malformacion, $otra,$descripcion)
    {
        //DATOS AF
        //DATOS AF
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 100);
        $this->Cell(40,10,  utf8_decode('DATOS ANTECEDENTES FAMILIARES'));

        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(45,10,  utf8_decode('Cardiopatía: '.$cardiopatia),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Diabetes: '.$diabetes),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Cáncer: '.$cancer),1, 0 , 'L' );        
        $this->Cell(45,10,  utf8_decode('Enf. Cardiovasculares: '.$enfcardiovasculares),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('Hipertensión: '.$hipertension),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Enf. Mentales: '.$enfmentales),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Tuberculosis: '.$tuberculosis),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Enf. Infecciosas: '.$enfinfecciosas),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('Malformación: '.$malformacion),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Otra : '.$otra),1, 0 , 'L' );
        $this->Ln();
        $this->MultiCell(190,5,  utf8_decode('Descripción Adicional: '.$descripcion));
        

    }

    function datosConsulta($reporte)
    {
           //DATOS CONSULTAS
        $this->SetFont('Arial','B',13);
        $this->SetXY(80, 170);
        $this->Cell(90,10,  utf8_decode('Informe Consultas'));

        
        foreach($reporte as $fila)
        {
            $this->Ln();
            //DATOS CONSULTAS
            $this->SetFont('Arial','B',9);
            $this->Cell(40,10,  utf8_decode('DATOS NUEVA CONSULTA'));
            $this->SetFont('Arial','',10);
            $this->Ln();
            //datos consulta
            $this->Cell(65,15, utf8_decode("Fecha Consulta: ".$fila['fecha']),1, 0 , 'L' );
            $this->Cell(35,15, utf8_decode("Pulso: ".$fila['pulso']),1, 0 , 'L' );
            $this->Cell(45,15, utf8_decode("Presión Arterial: ".$fila['prearterial']),1, 0 , 'L' );
            $this->Cell(35,15, utf8_decode("Peso: ".$fila['peso']),1, 0 , 'L' );
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Motivo Consulta: '.$fila['enfactual']));
            $this->Ln();
            //final datos consulta
            $this->MultiCell(190,5, utf8_decode("Diagnóstico: ".$fila['diagnostico']));
             $this->Ln();
            $this->MultiCell(190,5, utf8_decode("Prescripción: ".$fila['prescripcion']));
            $this->SetFont('Arial','B',9);
            //organos y sistemas
            $this->Cell(65,15, utf8_decode("ÓRGANOS Y SISTEMAS"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $res = ($fila['sentidos']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Sentidos: ".$res),1, 0 , 'L' );
            $res = ($fila['respiratorio']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Respiratorio: ".$res),1, 0 , 'L' );
            $res = ($fila['cardiovascular']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Cardiovascular: ".$res),1, 0 , 'L' );
            $res = ($fila['nervioso']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Nervioso: ".$res),1, 0 , 'L' );
            $res = ($fila['genital']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Genital: ".$res),1, 0 , 'L' );
            $this->Ln();
            $res = ($fila['digestivo']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Digestivo: ".$res),1, 0 , 'L' );
            $res = ($fila['urinario']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Urinario: ".$res),1, 0 , 'L' );
            $res = ($fila['mesqueletico']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Mesqueletico: ".$res),1, 0 , 'L' );
            $res = ($fila['endocrino']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Endócrino: ".$res),1, 0 , 'L' );
            $res = ($fila['linfatico']==2) ? "No" : "Si" ;
            $this->Cell(35,15, utf8_decode("Linfático: ".$res),1, 0 , 'L' );
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Descripción Adicional: '.$fila['des_s']));
            $this->Ln();
            //datos exámenes físicos
            $this->SetFont('Arial','B',9);
            $this->Cell(65,15, utf8_decode("EXÁMENES FÍSICOS"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->MultiCell(190,5,  utf8_decode('Cabeza: '.$fila['cabeza']));
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Cuello: '.$fila['cuello']));
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Toráx: '.$fila['torax']));
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Abdomen: '.$fila['abdomen']));
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Miembros: '.$fila['miembros']));
            $this->Ln();
            $this->MultiCell(190,5,  utf8_decode('Genitales: '.$fila['genitales']));
            $this->Ln();
            

            //datos exámenes complementarios
            $this->SetFont('Arial','B',9);
            $this->Cell(65,15, utf8_decode("EXÁMENES COMPLEMENTARIOS"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->MultiCell(190,5,  utf8_decode('Descripción: '.$fila['des_ec']));


            
            //receta
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->Cell(65,15, utf8_decode("RECETA"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->MultiCell(190,5, utf8_decode('Medicamentos: '.$fila['medicamentos']));
            $this->Ln();
            $this->MultiCell(190,5, utf8_decode("Indicaciones: ".$fila['indicaciones']));

            $this->Ln();
        }
    }

}