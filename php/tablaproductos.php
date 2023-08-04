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
    $sql = "SELECT * FROM productos";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Producto ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Cantidad de piezas</th>
            <th>Presio unitario</th>
        </tr>";

        while ($row = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_P"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Tipo"] . "</td>";
            echo "<td>" . $row["Cantidad"] . "</td>";
            echo "<td>" . $row["Presio"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>