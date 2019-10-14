<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insertar datos del Paciente </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    </head>
    <body>
        <div class='container'>
            <br/>
            <div class='row justify-content-center'>
                <div class='col-12 col-md-10 col-lg-8'>
                     <h2 class="display-2"> Datos del Paciente</h2>
                    <form action='insertar.php' method='post'>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre Apellidos</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nombre y Apellidos">
                        </div>
                        <div class="form-group"> 
                            <label for="exampleFormControlInput1">Edad</label>
                            <input type="number" name="edad" min="18" max="99" class="form-control" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Género</label>
                            <select class="form-control" id="" name="genero">
                                <option>H</option>
                                <option>M</option>                          
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Idiomas</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2" name="idioma[]">
                                <option value="1">Castellano</option>
                                <option value="2">Inglés</option>
                                <option value="4">Italiano</option>
                            </select>
                        </div>
                        <!--end of col-->
                        <div class='col-auto'>
                            <button class='btn btn-lg btn-success' type='submit'>Guardar</button>
                        </div>
                        <!--end of col-->

                    </form>
                </div>
                <!--end of col-->
            </div>
        </div> 



    </body>
</html> 







