<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){
function productoscommit(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
        $pdo -> beginTransaction();
        $pdo -> exec("
        CREATE TABLE Productos(
            ID_P INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Nombre VARCHAR (21) NOT NULL,
            Tipo VARCHAR (21) NOT NULL,
            Cantidad VARCHAR(21) NOT NULL,
            Presio INT NOT NULL
        )");
        $pdo -> commit();
         }catch(Exception $e){
            
       }
    

}
function productosrollback(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");
        $pdo -> beginTransaction();
        $pdo -> exec(" DROP TABLE Productos ");
        $pdo -> commit();
         }catch(Exception $e){

       }
}
}
?>