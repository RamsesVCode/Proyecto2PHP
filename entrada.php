<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php if(!isset($_SESSION)) session_start();?> 
<div id="principal">
        <?php $entrada = getEntrada($db,$_GET['id']);?>
        <?php if(!empty($entrada)): ?>    
        <h1><?=$entrada['TITULO'];?></h1>
        <article class="entrada">
            <a href="entrada.php?id=<?= $entrada['ID'];?>">
                <h2><?php echo $entrada['CATEGORIA'];?></h2>
            </a>
            <span class="fecha">
                <?php echo $entrada['FECHA'].' | '.$entrada['NOMBRE']; ?>
            </span>
            <p>
                <?=$entrada['DESCRIPCION'];?>
            </p>
        </article>
        <?php endif; ?>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>