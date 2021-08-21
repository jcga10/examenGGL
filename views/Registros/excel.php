<?php 

	$nombre ='registros.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel;charset=iso-8859-15"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:attachment; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
    


	echo utf8_decode("<table border='0'> 
                        
						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>Núm. placa </td> 
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>Tiempo estacionado (min.)</td>
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>Tipo</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>Cantidad a pagar</td>
						</tr>");

                        
                     foreach($data['registros'] AS $registro) {
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

					 echo utf8_decode("<tr>

                        <td>". $registro['placas']."</td>
                        <td>". $completo."</td>
                        <td>". $tipo."</td>
                        <td>". (($registro['hora_salida']!=null) ? (($precio!=null) ? '$'. number_format($precio*($horas+$minutos),2) : ''):'')."</td>
                    </tr>");
				 			
						
				}


			echo "</table>";
?>

			 