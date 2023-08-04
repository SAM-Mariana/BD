<?php
function parseenfile(spath){
    $
}

function uescribir(){
    $misvariables = parseenvfile('../.env');
    $conn = new mysqli($misvariables[DB_NAME],
                        $misvariables[BD_USERCRITURA],
                        $misvariables[BD_PASSESCRITURA],
                        $misvariables[BD_DATABASENAME]);
    if($conn->connect_error){
        die("error de conexion:" . $conn -> connect_error);
    }   
    return $conn;
}

function ulectura(){
    $misvariables = parseenvfile('../.env');
    $conn = new mysqli($misvariables[DB_NAME],
                        $misvariables[BD_USERLECTURA],
                        $misvariables[BD_PASSLECTURA],
                        $misvariables[BD_DATABASENAME]);
    if($conn->connect_error){
        die("error de conexion:" . $conn -> connect_error);
    }   
    return $conn;
}


