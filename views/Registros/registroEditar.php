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
    
    <div class="container mt-5" style="align-items: center;">
        <h2 class="text-center"><?php echo $data['titulo']; ?></h2>


        
            <form id="formulario" name="formulario" method="POST" action="index.php?c=Registros&a=actualizar" autocomplete="off">
                <div class="form-row">
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="placas">Placas</label>
                        <input type="text" class="form-control" id="placas" name="placas" value="<?php echo $data['registro']['placas'] ?>" placeholder="Placas del vehículo" disabled>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="salida">Hora de salida</label>
                        <input type="time" class="form-control" id="salida" name="salida" >
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12 mt-4">
                        <button id="guardar" type="submit" name="guardar" class="btn btn-success btn-block">Enviar</button>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
                </div>
            </form>
       
    </div>
    <!--Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>