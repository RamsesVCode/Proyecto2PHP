<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
            <h1>Ultimas entradas</h1>
            <?php $entradas = getEntradas($db,4);?>
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



        <div id="ver-todas">
            <a href="entradas.php">Ver todas las entradas</a>
        </div>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once 'includes/pie.php';?>
</body>
</html>