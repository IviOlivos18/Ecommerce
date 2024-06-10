<?php

    require_once("conector.php");
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <a href="index.php">Inicio</a>
        <a href="products.php">Productos</a>
        <a href="login.php">Iniciar Sesión</a>
        <a href="register.php">Registrarse</a>
        <a href="cart.php">Carrito</a>
    </header>

    <main>
        <section class="product-list">
            <section class="products">
                <h2>Productos</h2>
                <ul>
                    <?php foreach ($productos as $producto): ?>
                        <li>
                            <h3><?php echo $producto['nombre']; ?></h3>
                            <p><?php echo $producto['descripcion']; ?></p>
                            <p>Precio: <?php echo $producto['precio']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </section>
    </main>

    <footer>
        <p>Todos los derechos reservados</p>
        <p>2020</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
