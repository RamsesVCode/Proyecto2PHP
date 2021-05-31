<?php
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        if(!isset($_SESSION))
            session_start();
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        $sql = "SELECT * FROM usuarios WHERE EMAIL = '$email'";
        $login = mysqli_query($db,$sql);
        if($login && mysqli_num_rows($login) == 1){
            $usuario = mysqli_fetch_assoc($login);
            $verify = password_verify($password,$usuario['CONTRASEÑA']);
            if($verify){
                $_SESSION['usuario'] = $usuario;
                if(isset($_SESSION['error_login'])){
                    unset($_SESSION['error_login']);
                }
            }else{
                $_SESSION['error_login'] = 'Login incorrecto';
            }
        }
        else{
            $_SESSION['error_login'] = 'Login incorrecto';
        }
        header('Location:index.php');
    }



?>