<?php

    require_once("conector.php");

    session_start();

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
        <a href="cerrarsesion.php">Cerrar sesion</a>
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
                                echo "<li class='product'>";
                                // modificar jfif
                                echo "<img src='./images/".htmlspecialchars($row['Nombre']).".jfif' width='200px' height='200px' name='".htmlspecialchars($row['Nombre'])."'>";
                                echo "<h3>Nombre: ".htmlspecialchars($row['Nombre'])."</h3>";
                                echo "<p>Descripcion: ".htmlspecialchars($row['Descripcion'])."</p>";
                                echo "<p>Inventario:".htmlspecialchars($row['Inventario'])."</p>";
                                echo "<p>Precio: ".htmlspecialchars($row['Precio'])."</p>";
                                echo "<form action='cart.php' method='POST'>";
                                echo "<input type='hidden' name='nombre' value='".htmlspecialchars($row['Nombre'])."'>";
                                echo "<input type='hidden' name='desc' value='".htmlspecialchars($row['Descripcion'])."'>";
                                echo "<input type='hidden' name='precio' value='".htmlspecialchars($row['Precio'])."'>";
                                echo "<input type='hidden' name='cantidad' value='1'>";
                                echo "<button type='submit'>Agregar al carrito</button>";
                                echo "</form>";
                                echo "</li>";
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
        <p>2024</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
