<?php
// Incluir el archivo de conexión
include_once('config/conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los parámetros del formulario
    $usuario = $_POST['username'];
    $clave = $_POST['cypher'];

    // Usar una consulta preparada para evitar inyección SQL
    $query = "SELECT cod_usuario, usuario, contraseña FROM usuarios WHERE usuario = ? AND contraseña = ?";
    $stmt = mysqli_prepare($conex, $query);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, 'ss', $usuario, $clave);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Obtener el resultado
    $resultado = mysqli_stmt_get_result($stmt);

    // Verificar si la consulta ha tenido resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Si las credenciales son correctas, iniciar sesión
        session_start();
        $_SESSION['usuario'] = $usuario;
        echo '<script>alert("Credenciales correctas, Bienvenido al sistema");</script>';
        echo '<script>window.location="index.html";</script>';
    } else {
        // Si las credenciales son incorrectas
        echo '<script>alert("Credenciales incorrectas");</script>';
        echo '<script>window.location="login.html";</script>';
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>

