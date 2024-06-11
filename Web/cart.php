<?php

    require_once("conector.php");

    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    if (isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['desc']) && isset($_POST['precio'])){
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['desc'];
        $precio = $_POST['precio'];

        $sql = "select Nombre, Inventario from productos where Nombre = ?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $nombre);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stock_actual = $row['Inventario'];

                // Realizar la resta
                $nuevo_stock = $stock_actual - $cantidad;

                // Actualizar el stock en la base de datos
                $update_sql = "update productos set Inventario = ? where Nombre = ?";
                $update_stmt = $mysqli->prepare($update_sql);
                if ($update_stmt) {
                    $update_stmt->bind_param("is", $nuevo_stock, $nombre);
                    if ($update_stmt->execute()) {
                        
                    } else {
                        echo "Error al actualizar el inventario.";
                    }
                } else {
                    echo "Error en la consulta de actualización.";
                }
            } else {
                echo "Producto no encontrado.";
            }
            $stmt->close();
        } else {
            echo "Error en la consulta.";
        }

        $sql = "insert into historial (`Nombre`, `Cantidad`, `Precio`, `Descripcion`) values (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("siis", $nombre, $cantidad, $precio, $descripcion);
            if ($stmt->execute()) {
                
            } else {
                echo "Error al agregar";
            }
        } else {
            echo "Error en la consulta";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/cart.css">
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

    <section class="elecciones">
        <section class="producto-elegido">
            <h1>Productos elegidos:</h1>
            <?php
                $sql = "select * from historial";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        echo "<div class='producto'>";
                        // CAMBIAR EL JFIF
                        echo "<img src='./images/".htmlspecialchars($row['Nombre']).".jfif' width='200px' height='200px' alt='".htmlspecialchars($row['Nombre'])."' class='producto-imagen'>";
                        echo "<section class='information'>";
                        echo "<h4 class='producto-nombre'>".htmlspecialchars($row['Nombre'])."</h4>";
                        echo "<p class='producto-descripcion'>".htmlspecialchars($row['Descripcion']).".</p>";
                        echo "<span class='producto-precio'>$".htmlspecialchars($row['Precio'])."</span>";
                        echo "</section>";
                        echo "</div>";
                    }
                }else{
                    echo "<h3>no existen productos en la base de datos</h3>";
                }
                $mysqli->close();
            ?>
        </section>
    </section>

    <footer>
        <p>Todos los derechos reservados</p>
        <p>2020</p>
    </footer>
    
</body>
</html>