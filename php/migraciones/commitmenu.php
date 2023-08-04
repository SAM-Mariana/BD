<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){
function menucommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Menu(
            ID_M INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Pizza VARCHAR (21) ,
            Ingredientes_Ex TEXT ,
            Ingredientes_In TEXT
            
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