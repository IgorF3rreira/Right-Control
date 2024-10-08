<?php

        define('HOST', 'localhost');
        define('DB_NAME', 'rightControl');
        define('USER', 'root');
        define('PASS', '');

        $dsn = 'mysql:host='.HOST.';dbname='.DB_NAME;
        try{
            $bd = new PDO($dsn,USER ,PASS);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

 ?>