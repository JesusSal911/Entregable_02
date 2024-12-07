<?php
// Incluir la conexión a la base de datos
include('config/conexion.php');  // Asegúrate de tener este archivo con los detalles de conexión a la base de datos

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Consulta SQL ajustada a los nombres correctos de las columnas en tu base de datos
    $sql = "SELECT * FROM profesores WHERE prof_nom LIKE ? OR prof_apellido LIKE ?";

    // Preparar la consulta SQL con la conexión de MySQLi
    if ($stmt = mysqli_prepare($conex, $sql)) {
        $param = "%" . $query . "%";  // Parámetero de búsqueda con comodín
        mysqli_stmt_bind_param($stmt, "ss", $param, $param);  // Vincula el parámetro para la búsqueda

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Obtener los resultados
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Si hay resultados, los mostramos
            while ($row = mysqli_fetch_assoc($result)) {
                // Imprimir el nombre y el código del profesor
                echo "<div class='search-result'>
                        <span class='search-name'>{$row['prof_nom']} {$row['prof_apellido']}</span>
                        <span class='search-code'>Código: {$row['cod_profesor']}</span>
                      </div>";
            }
        } else {
            // Si no hay resultados, mostramos un mensaje
            echo "<p>No se encontraron resultados.</p>";
        }

        // Cerrar la sentencia preparada
        mysqli_stmt_close($stmt);
    } else {
        // Si la consulta no se preparó correctamente
        echo "<p>Error en la consulta.</p>";
    }
}
?>
