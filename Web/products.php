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
                    <?php
                        $sql = "select * from productos";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()){
                                echo "<li>";
                                echo "<h3>".htmlspecialchars($row['Nombre'])."</h3>";
                                echo "<p>".htmlspecialchars($row['Descripcion'])."</p>";
                                echo "<p>".htmlspecialchars($row['Inventario'])."</p>";
                                echo "<p>".htmlspecialchars($row['Precio'])."</p>";
                            }
                        }else{
                            echo "<h3>no existen productos en la base de datos</h3>";
                        }
                        $mysqli->close();
                    ?>
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
