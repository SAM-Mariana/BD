<?php
// Función para encriptar los datos
function encriptar($cadena, $clave) {
    $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $texto_encriptado = openssl_encrypt($cadena, 'aes-256-cbc', $clave, 0, $iv);
    return base64_encode($iv . $texto_encriptado);
}

// Función para desencriptar los datos
function desencriptar($cadena_encriptada, $clave) {
    $datos_decodificados = base64_decode($cadena_encriptada);
    $iv = substr($datos_decodificados, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $texto_desencriptado = openssl_decrypt(substr($datos_decodificados, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', $clave, 0, $iv);
    return $texto_desencriptado;
}

// Datos a encriptar
$datos_originales = "Hola, estos son datos sensibles!";
$clave_encriptacion = "mi_clave_secreta"; // Debes mantener esta clave de forma segura

// Encriptar los datos
$datos_encriptados = encriptar($datos_originales, $clave_encriptacion);

// Imprimir datos encriptados
echo "Datos encriptados: " . $datos_encriptados . "<br>";

// Desencriptar los datos
$datos_desencriptados = desencriptar($datos_encriptados, $clave_encriptacion);

// Imprimir datos desencriptados
echo "Datos desencriptados: " . $datos_desencriptados . "<br>";
?>