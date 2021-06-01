<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/conexion.php';?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $usuario = $_SESSION['usuario']['ID'];
        $sql = "DELETE FROM entradas WHERE USUARIO_ID=$usuario AND ID=$id";
        $borra = mysqli_query($db,$sql);
    }
    header('Location:index.php');
?>