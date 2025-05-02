<?php
    // conexion
    $db = new mysqli("localhost", 
                     "root", 
                     "1234", 
                     "taller_desarrollo");
    // codificador de caracteres
    mysqli_query($db, "SET NAMES 'utf8' ");
    /*if ($db ) {
        echo "Conexión exitosa ";
    } else
        echo "Error";
    */
?>