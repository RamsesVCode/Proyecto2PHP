<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php $categoria = getCategoria($db,$_GET['id']);?>
<?php if(!isset($categoria['ID']))
    header('Location:index.php');
?>
<div id="principal">
        <h1>Entradas de <?=$categoria['NOMBRE'];?></h1>
        <?php $entradas = getEntradas($db, null, $_GET['id']);?>
        <?php if(!empty($entradas)): ?>    
        <?php while($entrada = mysqli_fetch_assoc($entradas)): ?>
        <article class="entrada">
            <a href="entrada.php?id=<?= $entrada['ID'];?>">
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
        <?php endif; ?>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>