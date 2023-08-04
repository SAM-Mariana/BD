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
    $sql = "SELECT * FROM usuarios";
    $resultados = $conn->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<center>";
        echo "
        <tr>
            <th>Usuarios ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Contraseña</th>
        </tr>";

        while ($row = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_U"] . "</td>";
            echo "<td>" . $row["Usuario"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "<td>" . $row["Contraseña"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    }
}
?>