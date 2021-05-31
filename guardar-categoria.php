<?php
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        session_start();
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        //array de error categoria
        $error=''; 
        //validacion de nombre de categoria
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $error='Nombre no valido';
        }
        //verificamos
        if(empty($error)){
            $sql = "INSERT INTO categorias VALUES (null,'$nombre')";
            $categoria = mysqli_query($db,$sql);
            header('Location:index.php');
        }else{
            $_SESSION['errores']=$error;
            header('Location:crear-categoria.php');
        }
    }


?>