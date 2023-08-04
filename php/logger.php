<?php
#funcion de registros de eventos
//if(php_sapi_name()!=='cli'){die();}
include_once 'confi.php';
$conn = ulectura();

function loggerRegister($conn, $sql){
    #variable del evento texto plano
    $Evento ="Evento: " .$conn ->
    real_escape_string($sql);
    #crear consulta SQL para iniciodesesion
    $sql1 = "INSERT INTO actividad(Registro)
    VALUES ('$Evento')";
    #guardar registros
    if ($conn -> query($sql1) === TRUE){

    }
}
?>