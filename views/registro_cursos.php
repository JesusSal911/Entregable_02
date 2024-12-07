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
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/">
</head>

<body>
    <div class="container_register">
        <div class="register__form--wrapper2">
            <form action="../controlers/enlace_cursos.php" method="POST" name="curso-form">
                <div class="form__register__head">
                    <h2>Registrar Curso</h2>
                </div>
                
                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        bookmark
                    </span>
                    <input type="text" name="cur_nom" id="cur_nom" required>
                    <label for="cur_nom">Nombre del Curso:</label>
                </div>

                <div class="register-box">
                    <span class="icon material-symbols-outlined">
                        school
                    </span>
                    <select name="cod_profesor" class="tecahers_option" id="cod_profesor" required>
                        <option value="">Seleccionar Profesor</option>
                        <?php
                            include("conexion.php");
                            $consulta_profesores = "SELECT cod_profesor, prof_nom FROM profesores";
                            $resultado_profesores = mysqli_query($conex, $consulta_profesores);

                            while ($row = mysqli_fetch_assoc($resultado_profesores)) {
                                echo "<option value='".$row['cod_profesor']."'>".$row['prof_nom']."</option>";
                            }
                        ?>
                    </select>
                    <label for="cod_profesor">Profesor:</label>
                </div>
        
                <button class="register__button" type="submit">Añadir Curso</button>
        
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