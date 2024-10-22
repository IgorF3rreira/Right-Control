<?php
session_start();
include_once 'Conexao.php';


// Código para poder excluir um produto
$id_produto = isset($_GET['id_produto']) ? $_GET['id_produto'] : null;

$sql = 'DELETE FROM tab_produtos WHERE id_produto = ?';
try {
    $query = $bd->prepare($sql);
    $query->bindParam(1, $id_produto, PDO::PARAM_INT);
    $query->execute();
    header('Location: home.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

