<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php $categorias = getCategorias($db);?>
<?php if(empty($categorias))
    header('Location:index.php');
?>
    <div id="principal">
        <h1>Agregar una entrada</h1>
        <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.</p><br/>
        <form action="guardar-entrada.php" method="POST">
            <label for="titulo">Titulo</label><br/>
            <input type="text" name="titulo" autocomplete="off"><br/>
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'titulo') : '';?>

            <label for="descripcion">Descripción</label><br/>
            <textarea name="descripcion"></textarea><br/>
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'descripcion') : '';?>
            
            <label for="categoria">Categoria</label><br/>
            <select name="categoria">
                <option disabled selected>Seleccionar</option>
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>   
                <option value="<?=$categoria['ID'];?>"><?=$categoria['NOMBRE'];?></option>
                <?php endwhile;?>
            </select>
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'categoria') : '';?>
            <input type="submit" value="Guardar">
        </form>
        <?php borrarErrores(); ?>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>