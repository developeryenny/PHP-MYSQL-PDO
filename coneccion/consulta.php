<?php


    try{
        $base= new PDO('mysql:host=localhost; dbname=empresa', 'root', '');
            echo 'conección ok';
    }catch(Exception $e){
        die('Error:'. $e->GetMessage());
    }finally{ //se ejecuta siempre. sirve para vaciar la memoria
        $base=null;
    }

?>
