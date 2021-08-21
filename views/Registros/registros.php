
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title><?php echo $data['titulo']; ?></title>
</head>

<body>
    
    <div class="container mt-5">
        <h2 class="text-center"><?php echo $data['titulo']; ?></h2>
        <div class="row mt-5">

       
            <div class="col-12 mb-5">
                <div class="row">
                    <div class="col-6"></div>
                <div class="col-2 text-right mt-2"> 
                    <a href="index.php?c=Registros&a=descargarExcel" class="btn btn-success"> Exportar excel</a> 
                </div>
                <div class="col-2 text-right mt-2">
                    <a href="index.php?c=Registros&a=descargarpdf" class="btn btn-success"> Exportar pdf</a>
                </div>
                <div class="col-2 text-right mt-2">
                    <a href="index.php?c=Registros&a=new" class="btn btn-success"> + Agregar</a>
                </div>
                </div>
            </div>
        
            
       

            
            
           
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Placas</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Hora Entrada</th>
                            <th scope="col">Hora salida</th>
                            <th scope="col">Minutos</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php foreach($data['registros'] AS $dato){ 
                            //incializamos las variables de tipo y precio 
                            $tipo="";
                            $precio=0;
                            foreach ($data['tipo'] as $type) {
                                if($type['id_tipo']==$dato['fk_tipo']){
                                    $tipo=$type['nombre'];
                                    $precio=$type['cantidad'];
                                }
                            }
                            
                            //transoformamos a formato hora 
                            $horaEntrada=new Datetime($dato['hora_entrada']);
                            $horaSalida=new Datetime($dato['hora_salida']);
                          
                           
                            //Sacamos la diferencia de horas
                            $interval = $horaEntrada->diff($horaSalida);
                            //transformamos horas a minutos
                            $horas= $interval->format('%H')*60;
                            //asignamos los minutos
                            $minutos= $interval->format('%i')
                            ?>
                            <tr>
                                <td><?php echo $dato['id_registro']; ?></td>
                                <td><?php echo $dato['placas']; ?></td>
                                <td><?php echo $tipo ?></td>
                                <td><?php echo strftime("%H:%M ",$horaEntrada->getTimestamp()); ?></td>
                                <td><?php echo ($dato['hora_salida']!=null) ? strftime("%H:%M ",$horaSalida->getTimestamp()): " " ?></td>
                                <td><?php echo ($dato['hora_salida']!=null) ? (($precio!=null) ? $precio*($horas+$minutos) : ""):""  ?> </td>
                                <td><?php echo ($dato['hora_salida']!=null) ? (($precio!=null) ? "$". number_format($precio*($horas+$minutos),2) : ""):"" ?> </td>
                                <td><a href="index.php?c=Registros&a=edit&id=<?php echo $dato['id_registro']; ?>">Editar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>

</html>