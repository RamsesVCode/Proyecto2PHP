<?php 
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        if(!isset($_SESSION))
            session_start();
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
        //array de errores
        $errores = array();
        //validamos el titulo
        if(empty($titulo) || is_numeric($titulo)){
            $errores['titulo'] = 'Titulo no valido';
        }
        //validamos el texto
        if(empty($descripcion)){
            $errores['descripcion'] = 'Descripcion vacia';
        }
        //validamos la categoria
        if(empty($categoria)){
            $errores['categoria']='Error en la categoria';
        }
        //Verificamos
        if(count($errores)==0){
            $usuario_id = $_SESSION['usuario']['ID'];
            if(!isset($_GET['editar'])){
                $sql = "INSERT INTO entradas VALUES(null,$usuario_id,$categoria,'$titulo','$descripcion',CURDATE())";
            }else{
                $sql = "UPDATE entradas SET TITULO = '$titulo', DESCRIPCION = '$descripcion',CATEGORIA_ID=$categoria,FECHA=CURDATE() WHERE ID=".$_GET['editar'];
            }
            $guardar = mysqli_query($db,$sql);
            if($sql){
                header('Location:index.php');
            }else{
                echo 'fatality';
            }
        }else{
            $_SESSION['errores'] = $errores;
            header('Location:crear-entradas.php');
        }
    }



?>