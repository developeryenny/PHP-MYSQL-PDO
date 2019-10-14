<!--https://www.php.net/manual/es/pdostatement.bindparam.php-->
<?php

    $id_paciente=$_POST["id_paciente"]; 
 try{
        $base= new PDO('mysql:host=localhost; dbname=pacientes', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        $sql="DELETE FROM PACIENTES WHERE id_paciente= :p_id_paciente"; //marcador
       
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":p_id_paciente"=> $id_paciente));
        
        echo "Registro del paciente eliminado";
        $resultado->closeCursor();
    
   }catch(Exception $e){
        die('Error:'. $e->GetMessage());
    }finally{ //se ejecuta siempre. sirve para vaciar la memoria
        $base=null;
    }



?>
