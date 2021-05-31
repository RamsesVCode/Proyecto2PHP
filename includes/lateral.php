<aside id="sidebar">
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="botones" class="bloque">
            <a href="#" class="boton boton-verde">Crear entradas</a>
            <a href="#" class="boton boton-crimson">Crear categoria</a>
            <a href="#" class="boton boton-naranja">Mis datos</a>
            <a href="#" class="boton boton-rojo">Cerrar sesión</a>
        </div>
    <?php else: ?>
        <div id="login" class="bloque">
            <?php echo mostrarErrores($_SESSION,'error_login'); ?>
            <h3>Identificate</h3>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="text" name="email" autocomplete="off"/>

                <label for="password">Contraseña</label>
                <input type="password" name="password" autocomplete="off"/>

                <input type="submit" name="submit" value="Entrar"/>
            </form>
        </div>

        <div id="register" class="bloque">
            <?php if(isset($_SESSION['conecta'])): ?>
                <div class="alerta alerta-exito"><?=$_SESSION['conecta'];?></div>
            <?php endif; ?>
            <h3>Registrate</h3>

            <!--Mostrar errores-->
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : '';?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellidos') : '';?>
                
                <label for="email">Email</label>
                <input type="text" name="email" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : '';?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'password') : '';?>

                <input type="submit" name="submit" value="Registrar"/>
            </form>
            <?php borrarErrores();?>
        </div>
        <?php endif; ?>
    </aside>