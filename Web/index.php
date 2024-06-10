<?php
    $servername = "localhost";
    $username = "root";
    $password = "olivos.ivi18";
    $dbname = "ecommerce";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    $productos = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    $conn->close();
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
        <a href="cart.php">Carrito</a>
    </header>

    <main>
        <section class="hero">
            <img src="./images/carrito-de-compras.png" alt="" srcset="" width="250px" height="250px">
            <h1>Bienvenido a Nuestra Tienda</h1>
            <p>Explora nuestros productos</p>
            <a href="products.html" class="btn">Ver Productos</a>
        </section>

    </main>

    <footer>
        <p>Todos los derechos reservados</p>
        <p>2020</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
