<?php
      require_once('../connection.php');
      include_once('PlantillaHistoricoPdf.php');
      $db=Db::getConnect();
      $sql=$db->prepare('SELECT hc.numero,p.cedula,p.nombres,p.apellidos,p.genero, ap.imenarquia,ap.imenopausia,ap.vsexualactiva,ap.ciclos,ap.gesta,ap.partos,ap.abortos,ap.cesareas,ap.fum,ap.fup,ap.hvivos, ap.mpf, ap.descripcion as des_ap, af.cardiopatia, af.diabetes, af.cancer, af.enfcardiovasculares, af.hipertension, af.enfmentales, af.tubercolosis,af.enfinfecciosas,af.malformacion, af.otra, af.descripcion as des_af, c.fecha, c.enfactual, c.diagnostico, c.prescripcion, sv.pulso, sv.prearterial, sv.peso,s.sentidos,s.respiratorio,s.cardiovascular,s.nervioso,s.genital,s.digestivo,s.urinario,s.mesqueletico,s.endocrino,s.linfatico,s.descripcion as des_s, e.cabeza,e.cuello,e.torax, e.abdomen, e.miembros, e.genitales,ec.descripcion as des_ec, r.medicamentos, r.indicaciones
            FROM PACIENTES p, CONSULTAS C, SIGVITALES sv, SISTEMAS s, RECETAS r, EXAFISICOS e, exacomplementarios ec, histoclinicas hc,antpersonales ap, antfamiliares af
            WHERE c.paciente=p.id  
            AND e.fecha=c.fecha
            AND sv.fecha=c.fecha
            AND s.fecha=c.fecha
            AND r.fecha=c.fecha
            AND ec.fecha=c.fecha
            AND hc.paciente=p.id
            AND af.paciente=p.id
            AND ap.paciente=p.id
            AND p.id=:id');
      $sql->bindParam(':id',$_GET['id']);
      $sql->execute();
      $reporte= $sql->fetchAll();
      
      //DATOS HC Y PACIENTE
      $numero_hc=$reporte[0]['numero'];
      $cedula=$reporte[0]['cedula'];
      $nombres=$reporte[0]['nombres'];
      $apellidos=$reporte[0]['apellidos'];
      $genero=$reporte[0]['genero']; 
      $nom_ap=$nombres.' '.$apellidos;

      //DATOS ANTECEDENTES PERSONALES
      $edad_menarquia=$reporte[0]['imenarquia'];
      $edad_menopausia=$reporte[0]['imenopausia'];
      $vida_sexual=$reporte[0]['vsexualactiva'];
      $ciclos=$reporte[0]['ciclos'];
      $edad_gestacion=$reporte[0]['gesta'];
      $numero_partos=$reporte[0]['partos'];
      $numero_abortos=$reporte[0]['abortos'];
      $numero_cesareas=$reporte[0]['cesareas'];
      $fecha_ultima_menstruacion=$reporte[0]['fum'];
      $fecha_ultimo_parto=$reporte[0]['fup'];
      $hijos_vivos=$reporte[0]['hvivos'];
      $mp_familiar=$reporte[0]['mpf'];
      $des_ap=$reporte[0]['des_ap'];

      //DATOS ANTECEDENTES FAMILIARES
      $cardiopatia=$reporte[0]['cardiopatia'];
      $cardiopatia = ($cardiopatia==2) ? "No" : "Si" ;
      $diabetes=$reporte[0]['diabetes'];
      $diabetes = ($diabetes==2) ? "No" : "Si" ;
      $cancer=$reporte[0]['cancer'];
      $cancer = ($cancer==2) ? "No" : "Si" ;
      $enfcardiovasculares=$reporte[0]['enfcardiovasculares'];
      $enfcardiovasculares = ($enfcardiovasculares==2) ? "No" : "Si" ;
      $hipertension=$reporte[0]['hipertension'];
      $hipertension = ($hipertension==2) ? "No" : "Si" ;

      $enfmentales=$reporte[0]['enfmentales'];
      $enfmentales = ($enfmentales==2) ? "No" : "Si" ;
      $tuberculosis=$reporte[0]['tubercolosis'];
      $tuberculosis = ($tuberculosis==2) ? "No" : "Si" ;
      $enfinfecciosas=$reporte[0]['enfinfecciosas'];
      $enfinfecciosas = ($enfinfecciosas==2) ? "No" : "Si" ;  
      $malformacion=$reporte[0]['malformacion'];
      $malformacion = ($malformacion==2) ? "No" : "Si" ; 

      $otra=$reporte[0]['otra'];
      $otra = ($otra==2) ? "No" : "Si" ; 
      $des_af=$reporte[0]['des_af'];

      //pdf
      $pdf = new PlantillaHistoricoPdf();

      $pdf->AddPage();

      //antecedentes personales
      $pdf->detalleHistoria($numero_hc,$cedula, $nom_ap);
     
      $pdf->detallePersonales($genero, $edad_menarquia,$edad_menopausia, $vida_sexual,$ciclos,$edad_gestacion,$numero_partos,$numero_abortos,$numero_cesareas,$fecha_ultima_menstruacion,$fecha_ultima_menstruacion,$fecha_ultimo_parto,$hijos_vivos,$mp_familiar,$des_ap);
      
      $pdf->detalleFamiliares($cardiopatia, $diabetes,$cancer,$enfcardiovasculares,$hipertension,$enfmentales,$tuberculosis,$enfinfecciosas, $malformacion,$otra, $des_af);

      $pdf->datosConsulta($reporte);

      //formato de salida para el nombre del archivo
      $nombre='HISTORICO-HC-'.$numero_hc.'-'.date("Y").'-'.date("m").'-'.date("d");
      $pdf->Output('I',$nombre.'.pdf');
      ob_end_flush(); 
?>