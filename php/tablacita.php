<?php
include_once 'confi.php';
include_once 'logger.php';
include_once 'desencritartext.php';


if ($conn->connect_error) {
    echo "Error de conexión";
} else {
    #cgi no se podra abrir en la consola
    if(php_sapi_name()!=='apache2handler'){
        die("No pudes abrirlo desde la consila");
    }
    $sql = "SELECT * FROM cita";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Direccion ID</th>
            <th>Usuario ID</th>
            
        </tr>";

        while ($row = desencriptarTexto($resultados) ->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_C"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>