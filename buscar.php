<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<div id="principal">
    <?php if(isset($_POST)):?>
        <h1>Resultado para "<?=$_POST['busqueda']?>"</h1>
        <?php $entradas = getEntradas($db,null,null,$_POST['busqueda']);?>
        <?php if(!empty($entradas)): ?>    
        <?php while($entrada = mysqli_fetch_assoc($entradas)): ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['ID'];?>">
                <h2><?=$entrada['TITULO'];?></h2>
            </a>
            <span class="fecha">
                <?php echo $entrada['NOMBRE'].' | '.$entrada['FECHA']; ?>
            </span>
            <p>
                <?=substr($entrada['DESCRIPCION'],0,100).'...';?>
            </p>
            </article>
        <?php endwhile; ?>
        <?php else:?>
        <div class="alerta-error">No hay resultados</div>
        <?php endif;?>
    <?php endif;?>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>