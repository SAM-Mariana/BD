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
    $sql = "SELECT * FROM actividad";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Actividad ID</th>
            <th>Usuario ID</th>
            <th>Registro</th>
            <th>Fecha</th>
        </tr>";

        while ($row = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_LO"] . "</td>";
            echo "<td>" . $row["ID_U"] . "</td>";
            echo "<td>" . $row["Registro"] . "</td>";
            echo "<td>" . $row["Fecha"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>