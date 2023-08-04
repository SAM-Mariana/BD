<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){
function actividadcommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)","root","");
        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Actividad(
            ID_LO INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            ID_U INT,
            Registro TEXT,
            Fecha TIMESTAMP()   
        )");
        $pdo -> commit();
         }catch(Exception $e){
            
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