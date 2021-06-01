<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php $categorias = getCategorias($db);?>
<?php $entrada = getEntrada($db,$_GET['id']);?>
<?php if(empty($categorias) || empty($entrada) || $entrada['USER']!=$_SESSION['usuario']['ID'])
    header('Location:index.php');
?>
<div id="principal">
    <h1>Editar entrada</h1>
    <p>Edita tu entrada "<?=$entrada['TITULO'];?>"</p>
    <form action="guardar-entrada.php?editar=<?=$_GET['id'];?>" method="POST">
        <label for="titulo">Titulo</label><br/>
        <input type="text" name="titulo" value="<?=$entrada['TITULO'];?>" autocomplete="off"><br/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'titulo') : '';?>

        <label for="descripcion">Descripción</label><br/>
        <textarea name="descripcion"><?=$entrada['DESCRIPCION'];?></textarea><br/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'descripcion') : '';?>
            
        <label for="categoria">Categoria</label><br/>
        <select name="categoria">
            <?php while($categoria = mysqli_fetch_assoc($categorias)):?>   
            <option value="<?=$categoria['ID'];?>" <?php if($categoria['NOMBRE']==$entrada['CATEGORIA']) echo 'SELECTED';?>><?=$categoria['NOMBRE'];?></option>
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