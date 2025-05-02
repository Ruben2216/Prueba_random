
<?php
$db=new mysqli("localhost","root","1234","taller_desarrollo");

mysqli_query($db,"SET NAMES 'utf8'");
if($db){
    echo "Conexión exitosa a la base de datos";
}
else{
    echo "Error de conexión a la base de datos: " . mysqli_connect_error();
}
// Cerrar la conexión al terminar       
$db->close();

