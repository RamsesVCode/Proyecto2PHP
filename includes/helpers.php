<?php
    function mostrarErrores($errores,$campo){
        if(isset($errores[$campo])){
            return '<div class="alerta-error">'.$errores[$campo].'</div>';
        }else{
            return '';
        }
    }
    function borrarErrores(){
        if(isset($_SESSION['errores'])){
            unset($_SESSION['errores']);
        }
        if(isset($_SESSION['conecta'])){
            unset($_SESSION['conecta']);
        }
        if(isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
        }
    }
    function getCategorias($db){
        $sql = "SELECT * FROM categorias";
        $categorias = mysqli_query($db,$sql);
        $resultado = '';
        if($categorias && mysqli_num_rows($categorias)>=1){
            $resultado = $categorias;
        }
        return $resultado;
    }
?>