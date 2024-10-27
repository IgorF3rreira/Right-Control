<?php

session_start();
    if(isset($_SESSION['logado'])){

        //DESTRÓI A SESSÃO
        session_destroy();
        header('location: login.php');
    }

?>