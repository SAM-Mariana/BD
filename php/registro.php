<?php
include_once 'encriptar.php';
include_once 'logger.php';
include_once 'confi.php';

$conn =uescribir();

if ($conn -> connect_error){

    echo "Error en la conexion";

}else{

  #cgi no se podra abrir en la consola
    if(php_sapi_name()!=='apache2handler'){
        die("No pudes abrirlo desde la consila");
    }
    #"echo "conexion exitosa";

    $user = $_POST ['Usuario'];

    $nombre = $_POST ['Nombre'];

    $correo =$_POST ['Correo'];

    $contraseña =encriptar($_POST ['Contraseña']);

    $regex = "/[^a-zA-Z0-9@._]/";

    $nombre = preg_replace($regex, "", $nombre);

    $correo = preg_replace($regex, "", $correo);

    $contraseña = preg_replace($regex, "", $contraseña);

    $user = preg_replace($regex, "", $user);

  $sql = "INSERT INTO usuarios (Nombre, Usuario, Correo, Contraseña) VALUES ('$nombre', '$user', '$correo', '$contraseña')";
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