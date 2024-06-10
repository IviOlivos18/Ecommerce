
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
        <a href="cart.php">Carrito</a>
    </header>

    <main>
        <section class="register-form">
            <h2>Crear Cuenta</h2>
            <form action="register-process.php" method="POST">
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
