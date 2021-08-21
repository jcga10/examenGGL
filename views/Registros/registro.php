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


        
            <form id="formulario" name="formulario" method="POST" action="index.php?c=Registros&a=save" autocomplete="off">
                <div class="form-row">
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="placas">Placas</label>
                        <input type="text" class="form-control" id="placas" name="placas" placeholder="Placas del vehículo">
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="tipo">Tipo de vehículo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="" selected disabled hidden>Selecciona el tipo</option>
                            <?php foreach($data['tipo'] AS $tipo){ ?>
                                <option value="<?php echo $tipo['id_tipo'] ?>"><?php echo $tipo['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="entrada">Hora de entrada</label>
                        <input type="time" class="form-control" id="entrada" name="entrada" >
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="form-group col-md-8 col-sm-12 mt-4">
                        <button id="guardar" type="submit" name="guardar" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </div>
            </form>
       
    </div>
    <!--Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>