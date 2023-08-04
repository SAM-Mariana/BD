<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){
function llevarcommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Llevar(
            ID_L INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Nombre VARCHAR(21) NOT NULL,
            C_P INT NOT NULL,
            Ciudad VARCHAR(21) NOT NULL,
            Colonia VARCHAR(21) NOT NULL,
            Numero INT NOT NULL,
            Usuario VARCHAR(21) NOT NULL,
            Fecha
            ID_M INT NOT NULL

            
        )");
        $pdo -> commit();
         }catch(Exception $e){
            
       }
    

}

            function menurollback(){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
                    $pdo -> beginTransaction();
                    $pdo -> exec("DROP TABLE Menu");
                    $pdo -> commit();
                     }catch(Exception $e){
            
                   }
            }
 }            
?>