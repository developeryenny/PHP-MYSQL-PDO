<!--https://www.php.net/manual/es/pdostatement.bindparam.php-->
<?php

    $name=$_POST["name"];
    $edad=$_POST["edad"];
    $genero=$_POST["genero"];
    $idioma=$_POST["idioma"];
    
    $sum_idiomas=0;
    
    for ($i=0;$i<count($idioma);$i++)    
   {     
            $sum_idiomas += (int)$idioma[$i];

          //  echo "<br> Idioma " . $i . ": " . $idioma[$i];
            
         //   echo "<br>" . $sum_idiomas;
    } 

            

    
 try{
        $base= new PDO('mysql:host=localhost; dbname=pacientes', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        //$sql="select nombre_apellidos, edad, sexo, idioma from pacientes where idioma=:idioma and sexo=:genero"; //marcador
        $sql="INSERT INTO PACIENTES (nombre_apellidos, edad, sexo, idioma) values(:p_name, :p_edad, :p_sexo, :p_idioma)"; //marcador
       
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":p_name" =>$name,":p_edad" =>$edad,":p_sexo"=>$genero, ":p_idioma" =>$sum_idiomas ));
        
        $query="SELECT * FROM pacientes  ORDER BY id_paciente DESC LIMIT 0,1";

        $resultadoI=$base->prepare($query);
        $resultadoI->execute();
 while ($registro = $resultadoI->fetch(PDO::FETCH_ASSOC)) {
        echo "registro insertado";
        echo" <div class='container'>
            <br/>
            <div class='row justify-content-center'>
                <div class='col-12 col-md-10 col-lg-8'>
                     <h2 class='display-2'> Datos del Paciente</h2>
                    <form action='insertar.php' method='get'>
                        <div class='form-group'>
                            <label for='exampleFormControlInput1'>Nombre Apellidos</label>
                            <input type='text' name= 'name' class='form-control' id='' placeholder='Nombre y Apellidos' value ='".$registro['nombre_apellidos']."'>
                        </div>
                        <div class='form-group'> 
                            <label for='exampleFormControlInput1'>Edad</label>
                            <input type='number' name='edad' min='18' max='99' class='form-control' id='' placeholder='' value ='".$registro['edad']."' >
                        </div>
                        <div class='form-group'>
                            <label for='exampleFormControlSelect1'>Género</label>
                            <select class='form-control' id='' name='genero' value ='".$registro['sexo']."'>
                              <option> ";echo " '".$registro['sexo']."' </option>           
                           </select>
                           

                        </div>
                        <div class='form-group'>
                            <label for='exampleFormControlSelect2'>Idiomas</label>
                            <select multiple class='form-control' id='exampleFormControlSelect2' name='idioma' value ='".$registro['idioma']."'>
                                <option> ";echo " '".$registro['idioma']."' </option>     
                     
                            </select>
                        </div> 
                        <!--end of col-->
                        
                    </form>
                </div>
                <!--end of col-->
            </div>
        </div> ";
        $resultado->closeCursor();
        $resultadoI->closeCursor();
    }  
   }catch(Exception $e){
        die('Error:'. $e->GetMessage());
    }finally{ //se ejecuta siempre. sirve para vaciar la memoria
        $base=null;
    }



?>
