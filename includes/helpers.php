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
    function getEntradas($db, $limit=null,$id=null){
        $sql = "SELECT e.*,c.NOMBRE FROM ENTRADAS e
        JOIN CATEGORIAS c ON e.CATEGORIA_ID=c.ID";
        if($id != null){
            $sql .= " WHERE CATEGORIA_ID = $id";
        }
        $sql .= " ORDER BY e.FECHA DESC";
        if($limit != null){
            $sql .= " LIMIT $limit";
        }
        $entradas = '';
        $query = mysqli_query($db,$sql);
        if($query && mysqli_num_rows($query)>0){
            $entradas = $query;
        }
        return $entradas;
    }
    function getCategoria($db,$id){
        $sql = "SELECT * FROM categorias WHERE ID = $id";
        $categoria = mysqli_query($db,$sql);
        $resultado = '';
        if($categoria && mysqli_num_rows($categoria)>0){
            $resultado = mysqli_fetch_assoc($categoria);
        }
        return $resultado;
    }
?>