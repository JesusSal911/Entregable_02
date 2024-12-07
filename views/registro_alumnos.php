<?php
session_start();
include('../config/serv.php');
if (isset($_SESSION['usuario'])) {
    header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
    <!-- Metadatos básicos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descripción meta (para resultados de búsqueda) -->
    <meta name="description"
        content="JMJBE, Institución Educativa que forma niños y adolescentes con los mejores recursos posibles. Dándoles una calidad de estudio muy avanzada y con un nivel sobresaliente con respecto a las demás instituciones educativas privadas.">

    <!-- Metadatos para SEO y control de motores de búsqueda -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://">
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Metadatos de autor y derechos -->
    <meta name="author" content="Jhoan">
    <meta name="copyright" content="© 2024 JMJBE">
    <!-- Metadatos para dispositivos móviles -->
    <meta name="format-detection" content="telephone=no">

    <!-- Información de la empresa (Schema.org) --> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMJBE - Institución Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="img/">
</head>

<body>
    <div class="container_register">
        <div class="register__form--wrapper">
            <form action="../controlers/enlace_alumno.php" method="POST" name="alumno-form">
                <div class="form__register__head">
                    <h2>Registrar Alumno</h2>
                </div>
                
                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        person
                    </span>
                    <input type="text" name="alum_nom" id="alum_nom" required>
                    <label for="alum_nom">Nombres y Apellidos:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        subtitles
                    </span>
                    <input type="text" name="dni" id="dni" required>
                    <label for="dni">DNI:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        mail
                    </span>
                    <input type="email" name="correo" id="correo" required>
                    <label for="correo">Correo:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        phone
                    </span>
                    <input type="text" name="telefono" id="telefono" required>
                    <label for="telefono">Telefono:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        calendar_month
                    </span>
                    <input type="text" name="edad" id="edad" required>
                    <label for="edad">Edad:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        transgender
                    </span>
                    <input type="text" name="sexo" id="sexo" required>
                    <label for="sexo">Sexo:</label>
                </div>
        
                <button class="register__button" type="submit">Añadir Alumno</button>
        
            </form>
        </div>
    </div>
</body>

</html>

<?php
} else {
    echo '<script>window.location="login.php"; </script>';
}
$profile = $_SESSION['usuario'];
?>