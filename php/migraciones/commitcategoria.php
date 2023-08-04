<?php
if(php_sapi_name()!=='cli'||php_sapi_name()
!=='Apache'){



function categoriascommit(){

try{

    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");

        $pdo->setAttribute(

            PDO::ATTR_ERRMODE,

            PDO::ERRMODE_EXCEPTION);




            $pdo -> beginTransaction();

            $pdo -> exec("

            CREATE TABLE categorias (

                categoria_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,

                nombre VARCHAR(255),

                descripcion VARCHAR(255)      

            )");

           

            $pdo ->commit();





    }catch(Exception $e){

        echo $e;




    }




}

function categoriasRollback(){

   # desase cambios del commit

   try{

    $pdo = new PDO("mysql:host=localhost;dbname=md(menu_digital)", "root", "");

    
        $pdo->setAttribute(

            PDO::ATTR_ERRMODE,

            PDO::ERRMODE_EXCEPTION);




            $pdo -> beginTransaction();

            #executar = exec

            #luego haremos un exec de todas las tablas

            $pdo -> exec("DROP TABLE categorias");

           

            $pdo ->commit();

    }catch(Exception $e){

        echo $e;




    }

}
 }
?>