<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Todas las entradas</h1>
        <?php $entradas = getEntradas($db);?>
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