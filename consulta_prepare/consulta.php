<!--https://www.php.net/manual/es/pdostatement.bindparam.php-->
<?php
     $busqueda= $_GET["psearch"];

 try{
        $base= new PDO('mysql:host=localhost; dbname=empresa', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        $sql="select  num_ss, nombre_apellidos, sexo from trabajador where DNI=?";
        $resultado=$base->prepare($sql);
        $resultado->execute(array($busqueda));
         while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        
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
   }catch(Exception $e){
        die('Error:'. $e->GetMessage());
    }finally{ //se ejecuta siempre. sirve para vaciar la memoria
        $base=null;
    }




?>
