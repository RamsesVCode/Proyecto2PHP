<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
            <h1>Ultimas entradas</h1>
            <article class="entrada">
                <a href="entrada.php?id=<?= $entrada['ID'];?>">
                    <h2>Titulo entrada</h2>
                </a>
                <span class="fecha">
                    categoria | fecha
                </span>
                <p>
                    descripcion
                </p>
             </article>
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