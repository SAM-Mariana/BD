<?php
include 'commitusuario.php';
include 'commitproductos.php';
include 'commitmenu.php';
include 'commitactividad.php';
include 'commitcategoria.php';
include 'commitdireccion.php';

/* function ...{
    if(php_sapi_name()!=='cgi'){
        die("No pudes abrirlo desde la consila");
    }

    if(php_sapi_name()!=='cli'||php_sapi_name()
    !=='Apache'){

    }
}*/



registrocommit();
productoscommit();
menucommit();
actividadcommit();
categoriascommit();
Direccioncommit();

?>