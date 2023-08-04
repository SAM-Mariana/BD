<?php
include_once 'logger.php';
include_once 'confi.php';

$conn = uescribir();

if ($conn -> connect_error){

    echo "Error en la conexion";

}else{
  #cgi no se podra abrir en la consola
  if(php_sapi_name()!=='apache2handler'){
    die("No pudes abrirlo desde la consila");
}
    $producto = $_POST ['Producto'];

    $tipo = $_POST ['Tipo'];

    $presio =$_POST ['Presio'];

    $cantidad =$_POST ['Cantidad'];

    $regex = "/[^a-zA-Z0-9]/";

    $producto = preg_replace($regex, " ", $producto);

    $presio = preg_replace($regex, " ", $presio);

    $tipo = preg_replace($regex, " ", $tipo);

    $cantidad = preg_replace($regex, " ", $cantidad);

  $sql = "INSERT INTO Productos (Nombre, Tipo, Cantidad, Presio) VALUES ('$producto', '$tipo', '$cantidad', '$presio')";
  loggerRegistro($conn, $sql);
  if ($conn -> query ($sql)=== TRUE )  {

   # header ("Location: compras.html");

    echo "registro exitosamente";

    # code...

 } else {
     echo "error en tu registro";

    #  header ("location: eror.html");
   $conn -> close();
 }
}
?>