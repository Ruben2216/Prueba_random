<?php
    require_once 'econect.php';
    if (isset($_GET['usua'])) {
        $id = $_GET['usua'];
        $sql = "DELETE FROM usuarios WHERE usuario_id = ". $id; 
        
        $delete = mysqli_query($db, $sql);
        if ($delete ){
            echo "registro borrado";
            header("Location: elistado.php");
        }
    }
    
    