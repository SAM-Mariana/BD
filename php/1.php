<?php
   
    $path = '.env';

    function leerENV($path){
        $contenido = file_get_contents($path);

        #convierte en arreglo
        $lineas = explode("\n", $contenido);

        #guardaremos los valores que tendra la variable lineas
        $ENVdata = [];

        foreach ($lineas as $lineas){
            $lineas = trim($lineas);
                if (empty($lineas) || strpos($lineas, '#') === 0){
                    continue;
                }
                    list($key, $value) = explode("=", $lineas, 2);
                    $ENVdata[$key] = trim($value);
        }
        return $ENVdata;

       }
       $datosdeENV = leerENV(__DIR__.'/.env');
       echo $datosdeENV['n_user_lectura'];
       
       $misVariables = parserEnvFile('../.env');
       

?>