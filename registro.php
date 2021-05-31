<?php
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        if(!isset($_SESSION)){
            session_start();
        }
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        
        $errores = array();
        //validamos el nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = 'Nombre no valido';
        }
        //validamos los apellidos
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/',$apellidos)){
            $apellidos_validado = true;
        }else{
            $apellidos_validado = false;
            $errores['apellidos'] = 'Apellidos no validos';
        }
        //validamos el email
        if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_validado = false;
        }else{
            $email_validado = false;
            $errores['email'] = 'Email no valido';
        }
        //validamos el password
        if(!empty($password)){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password'] = 'Password no valido';
        }
        //verificamos que no hayan errores
        if(count($errores) == 0){
            //codificamos el password
            $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            $sql = "INSERT INTO usuarios VALUES (null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";
            $guardar = mysqli_query($db,$sql);
            if($guardar){
                $_SESSION['conecta'] = 'El registro de completó con exito';
            }else{
                $_SESSION['errores'] = 'No se pudo realizar el registro';
            }
        }else{
            $_SESSION['errores'] = $errores;
        }
        header('Location:index.php');
    }
?>