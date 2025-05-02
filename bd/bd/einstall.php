<?php
    require_once 'econect.php';

    $sql = "CREATE TABLE IF NOT EXISTS   usuarios (
        usuario_id int(255) auto_increment not null,
        nombre     varchar(50),
        apellidos  varchar(255),
        biografia  text,
        email      varchar(255),
        password   varchar(255),
        role       varchar(20),
        imagen     varchar(255),
        CONSTRAINT pk_users PRIMARY KEY(usuario_id)
    );";
    $create_usuarios_table = mysqli_query($db, $sql);
    if ($create_usuarios_table){
        echo "La tabla se creo correctamente";
    }
    
    $sql = "INSERT INTO usuarios 
            VALUES (NULL, 'Daniel','Romano','Web DEveloper','romano@unach.mx','"
            .sha1("password")."','1', NULL)";
    $insert_usuarios = mysqli_query($db,$sql);

    $sql = "INSERT INTO usuarios 
            VALUES (NULL, 'Hector','Torres','Web DEveloper','hector@unach.mx','"
            .sha1("password")."','1', NULL)";
    $insert_usuarios = mysqli_query($db,$sql); 
    if ($insert_usuarios){
        echo "a La tabla se le insertaron registros";
    }
    
    /*$sql = "UPDATE usuarios
            SET nombre = 'EDICION',
            apellidos = 'EDICION',
           biografia = 'EDICION',
               email = 'EDICION',
            password = 'EDICION',
                role = 'EDICION',
               imagen = 'EDICION' 
        WHERE usuario_id = 3";
    $actualiza_usuarios = mysqli_query($db,$sql); 
    
    if ($actualiza_usuarios){
        echo "a La tabla se le insertaron registros";
    } */  
