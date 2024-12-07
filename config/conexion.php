<?php
// Establece la conexión a la base de datos
$conex = mysqli_connect('localhost', 'root', '', 'db_academia');

if (!$conex) {
    die('Conexión fallida: ' . mysqli_connect_error());
}
?>
