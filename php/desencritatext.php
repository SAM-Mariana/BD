<?php
function desencriptarTexto($textoencriptado, $key, $iv){
    $cipher = "AES-256-CBC";
    $opciones = OPENSSL_RAM_DATA;
    $desencripotado = openssl_encrypt(
        base64_decode($textoencriptado),
    $cipher, $key, $opciones, $iv);
    return $decrypt;
}
?>