<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
    <h1>Mis datos</h1>
    <?php if(isset($_SESSION['conecta'])): ?>
        <div class="alerta alerta-exito"><?=$_SESSION['conecta'];?></div>
    <?php endif;?>
    <form action="actualizar-usuario.php?id=<?=$_SESSION['usuario']['ID'];?>" method="POST">
        <label for="nombre">Nombre</label><br/>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['NOMBRE'];?>" autocomplete="off"/><br/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : '';?>

        <label for="apellidos">Apellidos</label><br/>
        <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['APELLIDOS'];?>" autocomplete="off"/><br/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellidos') : '';?>
                
        <label for="email">Email</label><br/>
        <input type="text" name="email" value="<?=$_SESSION['usuario']['EMAIL'];?>" autocomplete="off"/><br/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : '';?>
        <input type="submit" value="Actualizar"/>
    </form>
    <?php borrarErrores();?>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>