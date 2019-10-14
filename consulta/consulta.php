<?php

    $busqueda= $_GET["psearch"];
    
    require("conec.php");

    $conexion = mysqli_connect($db_host, $db_usuario,$db_pass, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la BBDD". $conexion->connect_errno;
    }
   
    $conexion->set_charset("utf8");
  
    $sql = "select  num_ss, nombre_apellidos, sexo from trabajador where DNI=$busqueda ";
   
    $resultado=$conexion->query($sql);
    if($conexion->errno){
        die($conexion->error);
    }
    
//cuando acceda a un registro que no existe no se ejecuta sera igual a false
//También se puede usar  $fila[0]
    while ($fila = $resultado->fetch_assoc()) {
        
        echo' <div class="container">
            <br/>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <h1 class="display-2"> Datos Trabajador</h1>
                    <form method="get" action="">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Número de Seguridad Social</label>';
                    echo " <input type='text' class='form-control' value='" .$fila['num_ss']."' name= 'num_ss'>
                    </div>";
                    echo'    <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre y apellidos</label>';
                    echo "<input type='text' class='form-control' id='' value='". $fila['nombre_apellidos'] ."' name='nombre_apellidos'>
                        </div>
                        <div class='form-group'> ";
                    echo     '  <label for="exampleFormControlSelect1" >Sexo</label>';
                    echo     " <select class='form-control' id='' ' name='sexo'>";       
                    if($fila['sexo'] == 'H'){
                        echo     " <option>  H </option>";
                        
                    }
                    echo     " <option> " . $fila['sexo'].  "</option>";  
                    echo     '   </select>';
            
                    echo    '</div>';
                    echo "    <div class='col-auto'>
                            <button class='btn btn-lg btn-success' type='submit'>Actualizar</button>
                        </div>";
                        
               echo " </div>
                </form>
            </div>
            <!--end of col-->
        </div>";
    echo '</div> ';
    }  
  
    mysqli_close($conexion);


?>
