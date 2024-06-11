<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'olivos.ivi18');
define('DB_NAME', 'ecommerce');
 
/* Intentando conectarse a la base de datos */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Checando coneccion
if($mysqli === false){
    die("ERROR: No es posible conectarce. " . $mysqli->connect_error);
}
?>