<?php

include_once 'conexao.php';
session_start();
$id = isset($_GET['id_produto']) ? $_GET['id_produto'] : null;
$sql = 'DELETE FROM tab_produtos  WHERE id_produto = :id_produto';
try{
    $query = $bd->prepare($sql);
    $query->bindParam(':id_produto', $id, PDO::PARAM_INT);
    $query->execute();
    // $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    header('Location: home.php');

}catch(PDOException $e){
    echo $e->getMessage();
}


