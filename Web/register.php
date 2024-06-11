<?php

require_once 'conector.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "Por favor complete todos los campos.";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select ID from usuarios where email = ?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                echo "El email ya está registrado. Por favor, use otro email.";
            } else {
                $stmt->close();

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "insert into usuarios (user, email, password) VALUES (?, ?, ?)";
                $stmt = $mysqli->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("sss", $name, $email, $hashed_password);
                    if ($stmt->execute()) {
                        echo "Registro exitoso. Puede iniciar sesión ahora.";
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "Error al registrar el usuario.";
                    }
                } else {
                    echo "Error en la consulta a la base de datos.";
                }
            }
            $stmt->close();
        } else {
            echo "Error en la consulta a la base de datos.";
        }

        $mysqli->close();
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
        <section class="register-form">
            <h2>Crear Cuenta</h2>
            <form action="register.php" method="POST">
                <label for="name">Nombre Completo:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" class="btn">Registrarse</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Todos los derechos reservados</p>
        <p>2020</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
