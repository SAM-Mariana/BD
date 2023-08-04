<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){

function Direccioncommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)","root","");
        $pdo -> setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Direccion(
            ID_DI INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            ID_U INT,
            Ciudad TEXT NOT NULL,
            Coloni TEXT NOT NULL,
            Calle TEXT NOT NULL,
            C_P INT NOT NULL,
            Numero INT NOT NULL
        )");
        $pdo -> commit();
         }catch(Exception $e){
            echo $e;
       }
    

}

            function Direccionrollback(){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)","root","");
                    $pdo -> beginTransaction();
                    $pdo -> exec("DROP TABLE Direccion");
                    $pdo -> commit();
                     }catch(Exception $e){
            
                   }
            }
             }
?>