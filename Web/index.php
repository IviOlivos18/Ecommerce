<?php

    require_once("conector.php");

    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <header>
        <a href="index.php">Inicio</a>
        <a href="products.php">Productos</a>
        <a href="login.php">Iniciar Sesión</a>
        <a href="register.php">Registrarse</a>
        <a href="cerrarsesion.php">Cerrar sesion</a>
        <a href="cart.php">Carrito</a>
    </header>

    <main>
        <section class="hero">
            <img src="./images/carrito-de-compras.png" alt="" srcset="" width="250px" height="250px">
            <h1>Bienvenido a Nuestra Tienda</h1>
            <p>Explora nuestros productos</p>
            <a href="products.php" class="btn">Ver Productos</a>
        </section>

    </main>

    <footer>
        <p>Todos los derechos reservados</p>
        <p>2024</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
