<?php

// Arquivo de conexao
include_once 'Conexao.php';

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Right Control</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="src/css/Home.css">
</head>
<body>

<!-- FORMULARIOS -->
<div class="modal fade" id="AdicionarProdutos" tabindex="-1" aria-labelledby="adicionarProduto" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header container">
        <h3 style="color:black; " class="w-100">Adicione um novo produto</h3>
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <form class="form form-grid form-control container " action="" method="post" name="formProd" id="formProd" enctype="multipart/form-data">

            <label for="nome">Nome do produto</label>
            <input class="form-control mb-3" type="text" name="nome" id="nome" placeholder="Digite o nome do produto">

            
            <select class="form-control form-select-sm btn btn-secondary "name="select" id="select">
              <option value="categorias">categorias</option> 
          
            </select>
           
            <label for="qtd">Quantidade</label>
            <input class="form-control" type="number" name="qtd" id="qtd" placeholder="Digite a quantidade do produto">

            <label for="preco">Nome do produto</label>
            <input class="form-control" type="text" cname="preco" id="preco" placeholder="Digite o preço">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<header>

<img src="src/img/logoTransparente.png" width="120px" height="120px" alt="">
    <div class="divTexto">
        <h1>Texto de teste</h1>
        <h3>nome empresa</h3>
    </div>
    <div class="divConta">
        <a class="sobreConta btn btn-secondary" href="">Minha conta</a>
        <a class="logout btn btn-secondary" href="">Sair</a>
    </div>


</header>

<main>
    <h1>SUA PRATELEIRA</h1>


    <div class="container divBotoes">  
        <a class="btn btn-secondary" href="#AdicionarProdutos" data-bs-toggle="modal" data-bs-target="">Adicionar novo produto</a>
        <a class="btn btn-secondary" href="#">Adicionar nova categoria</a>

        <select class=" form-select-sm btn btn-secondary "name="select" id="categoria"><option value="categorias">categorias</option></select>
        <input class="" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquise seu produto">
       
    </div>

    <table class="table resposive table-sm  table-secondary table-hover  ">
  <thead>
    <tr>
      <th scope="col">Id produto</th>
      <th scope="col">Nome</th>
      <th scope="col">Categoria</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Preço</th>
      <th scope="col">Adicionar</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>