<?php 
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        if(!isset($_SESSION)){
            session_start();
        }
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        
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
        //verificamos que no hayan errores
        if(count($errores) == 0){
            $sql = "UPDATE usuarios SET NOMBRE = '$nombre', APELLIDOS='$apellidos',EMAIL='$email' WHERE ID=".$_GET['id'];
            $guardar = mysqli_query($db,$sql);
            if($guardar){
                $_SESSION['conecta'] = 'La cuenta se actualizó con exito';
                $_SESSION['usuario']['NOMBRE']=$nombre;
                $_SESSION['usuario']['APELLIDOS']=$apellidos;
                $_SESSION['usuario']['EMAIL']=$email;
            }else{
                $_SESSION['errores'] = 'No se pudo actualizar la cuenta';
            }
        }else{
            $_SESSION['errores'] = $errores;
        }
        header('Location:mis-datos.php');
    }
?>