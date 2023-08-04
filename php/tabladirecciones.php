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
    $sql = "SELECT * FROM direccion";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Direccion ID</th>
            <th>Usuario ID</th>
            <th>Ciudad</th>
            <th>Colonia</th>
            <th>Calle</th>
            <th>Codigo Postal</th>
            <th>Numero de casa</th>
        </tr>";

        while ($row = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_DI"] . "</td>";
            echo "<td>" . $row["ID_U"] . "</td>";
            echo "<td>" . $row["Ciudad"] . "</td>";
            echo "<td>" . $row["Coloni"] . "</td>";
            echo "<td>" . $row["Calle"] . "</td>";
            echo "<td>" . $row["C_P"] . "</td>";
            echo "<td>" . $row["Numero"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>