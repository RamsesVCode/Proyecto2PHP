<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Crear categoria</h1>
        <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.</p><br/>
        <form action="guardar-categoria.php" method="POST">
            <label for="nombre">Nombre de la categoria</label><br/>
            <input type="text" name="nombre" autocomplete="off">
            <?php if(isset($_SESSION['errores'])): ?>
                <span class="alerta-error"><?=$_SESSION['errores'];?></span>
            <?php endif;?>
            <br/>
            <input type="submit" value="guardar">
        </form>
        <?php borrarErrores();?>
    </div>
    <div class="clearfix"></div>
    </div>
<?php require_once 'includes/pie.php';?>
</body>
</html>