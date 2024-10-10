
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


    <div>  
        <a class="btn btn-secondary" href="#">Adicionar novo produto</a>
        <a class="btn btn-secondary" href="#">Adicionar nova categoria</a>

        <input type="search" name="pesquisa" id="pesquisa" placeholder="Pesquise sua categoria">
        <input type="search" name="pesquisa" id="pesquisa" placeholder="Pesquise seu produto">
       
    </div>

    <table class="table resposive table-sm">
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
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>