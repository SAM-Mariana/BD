<?php
include_once 'confi.php';
include_once 'logger.php';
$conn = ulectura();

if ($conn->connect_error) {
    echo "Error de conexión";
} else {
    #cgi no se podra abrir en la consola
    if(php_sapi_name()!=='apache2handler'){
        die("No pudes abrirlo desde la consila");
    }
    $sql = "SELECT * FROM categorias";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Categoria ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
           
        </tr>";

        while ($row = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["categoria_id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>