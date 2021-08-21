<?php


$pdf=new  PDF_MC_Table("P","mm","Letter");

//? Hoja PORTADA
//$pdf->AddPage();
//$pdf->SetMargins(0,0,0,0);
//$pdf->Image("assets/img/portada.png",0,0,216,280);


//? Cotizacion
$pdf->AddPage();;


$pdf->Ln(8);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,7,"Datos registrados",0,1,"C");
$pdf->Ln(8);


$pdf->SetFont('Arial','',12);

$pdf->SetWidths(Array(45,55,45,45));

//set line Height this is the height of each linew, not rows
$pdf->SetLineHeight(5);
$pdf->Cell(45,8,utf8_decode("Núm. placa"),1,0,"C");
$pdf->Cell(55,8,utf8_decode("Tiempo estacionado (min.)"),1,0,"C");
$pdf->Cell(45,8,utf8_decode("Tipo"),1,0,"C");
$pdf->Cell(45,8,utf8_decode("Cantidad a pagar"),1,1,"C");

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0,0,0);

foreach ($data['registros'] AS $registro) { 
    $tipo="";
    $precio=0;
    foreach ($data['tipo'] as $type) {
        if($type['id_tipo']==$registro['fk_tipo']){
            $tipo=$type['nombre'];
            $precio=$type['cantidad'];
        }
    }
                            
    //transoformamos a formato hora 
    $horaEntrada=new Datetime($registro['hora_entrada']);
    $horaSalida=new Datetime($registro['hora_salida']);
                          
                           
    //Sacamos la diferencia de horas
    $interval = $horaEntrada->diff($horaSalida);
    //transformamos horas a minutos
    $horas= $interval->format('%H')*60;
    //asignamos los minutos
    $minutos= $interval->format('%i');

    $completo= $interval->format('%H horas, %i minutos');
    
   
    $array= array(
        "arr1"=>$registro['placas'],
        "arr2"=>$completo,
        "arr3"=> $tipo,
        "arr4"=> ($registro['hora_salida']!=null) ? (($precio!=null) ? "$". number_format($precio*($horas+$minutos),2) : ""):""
    );
    $pdf->Row(Array(
        $array['arr1'],
        $array['arr2'],
        $array['arr3'],
        $array['arr4']
    ));
}








    $pdf->Output('D',"Registros.pdf");









?>