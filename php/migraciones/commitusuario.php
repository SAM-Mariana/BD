<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){
#comit -> enviamos a la base de datos, cambios.
#rollback -> deshacer los cambios del commit
function registrocommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Usuarios(
            ID_U INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Nombre VARCHAR (21) NOT NULL,
            Usuario VARCHAR (21) NOT NULL,
            Correo VARCHAR (21) NOT NULL,
            Contraseña VARCHAR (21) NOT NULL

        )");
        $pdo -> commit();
         }catch(Exception $e){
            
       }
    

}

            function regirtrorollback(){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
                    $pdo -> beginTransaction();
                    $pdo -> exec(" DROP TABLE Usuarios ");
                    $pdo -> commit();
                     }catch(Exception $e){
            
                   }
            }
        }

?>