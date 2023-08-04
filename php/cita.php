<?php
include_once 'confi.php';
include_once 'encriptartext.php';
include_once 'logger.php';

$conn = uescribir();
if($conn -> connect_error){

    echo"ERROR DE LA CONEXION";

}else{
#cgi no se podra abrir en la consola
if(php_sapi_name()!=='apache2handler'){
    die("No pudes abrirlo desde la consila");
}
#"echo "conexion exitosa";
$nombre =encriptar($_POST ['NOMBRE']);
$apellido =encriptar($_POST ['APELLIDO']);
$telefono =encriptar($_POST ['TELEFONO']);
$colonia =encriptar($_POST ['COLONIA']);
$direccion =encriptar($_POST ['DIRECCION']);
$servicios =encriptar($_POST ['categoria']);
$correo =encriptar($_POST ['CORRE']);
$cita =encriptar($_POST ['CITA']);
$fecha =encriptar($_POST ['HOY']);
$personal =encriptar($_POST ['QUIEN']);

$regex = "/[^a-zA-Z0-9@._]/";

$nombre = preg_replace($regex, "", $nombre);
$apellido = preg_replace($regex, "", $apellido);
$telefono = preg_replace($regex, "", $telefono);
$colonia = preg_replace($regex, "", $colonia);
$direccion = preg_replace($regex, "", $direccion);
$servicios = preg_replace($regex, "", $servicios);
$correo = preg_replace($regex, "", $correo);
$cita = preg_replace($regex, "", $cita);
$fecha = preg_replace($regex, "", $fecha);
$personal = preg_replace($regex, "", $personal);




$sql = "INSERT INTO cita (nombre, apellido, telefono, colonia, direccion, servicio, correo, cita, fecha, personal) VALUES ('$nombre', '$apellido', '$telefono', '$colonia', '$direccion', '$servicios', '$correo', '$cita', '$fecha', '$personal')";
loggerRegister($conn, $sql);
if ($conn -> query ($sql)=== TRUE )  {

echo "error en tu registro";

header ("location: ../html/index.html");

# code...

}else{
header ("Location: ../html/registro.html");

echo "registro exitosamente";



}

}
?>