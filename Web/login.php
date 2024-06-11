<?php

    require_once("conector.php");
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $password = "";

        if(empty($_POST['email']) || empty($_POST['password'])){
            echo "Por favor ingresa todos los campos";
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "select * from usuarios where email = ?";
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if (password_verify($password, $row['Password'])) {
                        $_SESSION['user_id'] = $row['ID'];
                        $_SESSION['user_name'] = $row['User'];
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Contraseña incorrecta.";
                    }
                } else {
                    echo "No se encontró una cuenta con ese email.";
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
    <title>Iniciar Sesión</title>
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
        <section class="login-form">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" class="btn">Ingresar</button>
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