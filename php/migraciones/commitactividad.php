<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){


function actividadcommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)","root","");
        $pdo -> setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Actividad(
            ID_LO INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            ID_U INT,
            Registro TEXT NOT NULL,
            Fecha TIMESTAMP NOT NULL DEFAULT current_timestamp()
        )");
        $pdo -> commit();
         }catch(Exception $e){
            echo $e;
       }
    

}

            function Actividadrollback(){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)","root","");
                    $pdo -> beginTransaction();
                    $pdo -> exec("DROP TABLE Actividad");
                    $pdo -> commit();
                     }catch(Exception $e){
            
                   }
            }
 }
?>