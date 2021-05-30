<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css"/>
    <title>Blog de Video Juegos</title>
</head>
<body>
    <!--Cabecera-->
    <header id="cabecera">
        <!--Logo-->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php">Sobre Mi</a></li>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="contenedor">
    <!--Sidebar-->
    <aside id="sidebar">
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="text" name="email"/>

                <label for="password">Contraseña</label>
                <input type="password" name="password"/>

                <input type="submit" name="submit" value="Entrar"/>
            </form>
        </div>

        <div id="register" class="bloque">
            <h3>Registrate</h3>

            <!--Mostrar errores-->
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"/>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos"/>
                        
                <label for="email">Email</label>
                <input type="text" name="email"/>

                <label for="password">Contraseña</label>
                <input type="password" name="password"/>

                <input type="submit" name="submit" value="Registrar"/>
            </form>
        </div>
    </aside>
    <div id="principal">
            <h1>Ultimas entradas</h1>
    </div><!--Fin principal-->
        <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
    <footer id="pie">
        <p>Desarrollado por Edwin Calle &copy; 2021</p>
    </footer>
</body>
</html>