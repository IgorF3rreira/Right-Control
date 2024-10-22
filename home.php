<?php
// iniciar sessao de login
session_start();

// Arquivo de conexao
include_once 'Conexao.php';


$erroNenhum = false;

// criando o metodo para fazer a busca no input de pesquisa
$pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] :null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] :null;

// verificar se a varivel esta vazia e se ela estiver vazia iremos buscar tods os dado no banco de dados
if(empty($pesquisa) && empty($categoria)){
  $sql = 'SELECT * FROM tab_produtos';

  try {
    $query = $bd->prepare($sql);
    $query->execute(); 
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e) {
    echo $e->getMessage();
  }
}

//  Fazer a consulta com o parametro que foi colocado no input de pesquisa
else{
  $sql = 'SELECT * FROM tab_produtos WHERE nome LIKE :nome AND categoria LIKE :categoria';
  try {
    $query = $bd->prepare($sql);
    $query->bindValue(':nome','%'. $pesquisa . '%');
    $query->bindValue(':categoria','%'. $categoria . '%');
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultado) <= 0){
      $erroNenhum = true;
  }    } catch(PDOException $e) {
    echo $e->getMessage();
    }
}
    
  
  
  
  
  //  CODIGO PARA PODER ADICIONAR UM PRODUTO NO SEU ESTOQUE
  
  // definir as variaveis e verificar se estão vazias
  if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['qtd'];
    $preco = $_POST['valor'];
  
    if(empty($nome) || empty($categoria) || empty($quantidade) || empty($preco)){
      echo '<script>
      alert("Preencha todos os campos obrigatórios *")
      </script>
  
  ';
  }else{
        $sql = 'INSERT INTO tab_produtos (nome,categoria,quantidade,preco) VALUES (:nome, :categoria,:quantidade, :preco)'; 
        try {
          $query = $bd->prepare($sql);
          $query->bindValue(':nome', $nome, PDO::PARAM_STR);
          $query->bindValue(':categoria', $categoria, PDO::PARAM_STR);
          $query->bindValue(':quantidade', $quantidade,PDO::PARAM_INT);
          $query->bindValue(':preco', $preco) ;
          $query->execute();
          
  
          // Recuperar o ultimo
          $ultimoId = $bd->lastInsertId();
          header('Location: home.php');
  
          
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
  }
  
  // Verifica se o formulário de edição foi enviado
  
  if (isset($_POST['submit'])) {
    $id = $_POST['editarId']; 
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['qtd'];
    $preco = $_POST['valor'];
  
    if(empty($nome) || empty($categoria) || empty($quantidade) || empty($preco)){
        echo '<script>alert("Preencha todos os campos obrigatórios *")</script>';
    } else {
        $sql = 'UPDATE tab_produtos SET nome = :nome, categoria = :categoria, quantidade = :quantidade, preco = :preco WHERE id_produto = :id_produto ';
        try {
            $query = $bd->prepare($sql);
            $query->bindParam(':nome', $nome, PDO::PARAM_STR);
            $query->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            $query->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $query->bindParam(':preco', $preco);
            $query->bindParam(':id_produto', $id);
           
        
            $query->execute();
            header('Location: home.php'); // Redireciona após a edição
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
  }
  
  
  
  ?>
  
  
  
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Right Control</title>
  
        <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <!-- css -->
      <link rel="stylesheet" href="src/css/Home.css">
  
          <!-- font font-awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  </script>
  
  
  
  <!-- MODAL PARA EDITAR MAIS QUANTIDADE AO PRODUTO -->
  <div class="modal fade" id="editarProdutos" tabindex="-1" aria-labelledby="editarProdutos" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header container">
          <h3 style="color:black; " class="w-100">Adicione um novo produto</h3>
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
  
          <form class="form form-grid form-control container " action="" method="post" name="formEdit" id="formEdit" enctype="multipart/form-data">
            
          <input type="hidden" name="editarId" id="editarId">
  
  
              <label for="nome">Nome do produto</label>
              <input class="form-control mb-3" required type="text" name="nome" id="nome" placeholder="Digite o nome do produto" value="">
  
              <label for="nome">Categoria</label>
              <input class="form-control emb-3" required type="text" name="categoria" id="categoria" placeholder="defina uma categoria" value="">
              
             
              <label for="qtd">Quantidade</label>
              <input class="form-control" required type="number" name="qtd" id="qtd" placeholder="Digite a quantidade do produto" value="">
  
              <label for="valor">Preço</label>
              <input class="form-control" required type="text" name="valor" id="valor" placeholder="Digite o preço" value="">
  
          
  
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Adicionar</button>
        </div>
  
        </form>
        </div>
  
      </div>
    </div>
  </div>
  
  
  
  
  
  <!-- MODAL COM FORMULARIO PARA PODER ADICIONAR UM PRODUTO AO ESTOQUE   -->
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
  
  
            <input type="hidden" name="editarId" id="editarId">
  
  
              <label for="nome">Nome do produto</label>
              <input class="form-control mb-3" required type="text" name="nome" id="nome" placeholder="Digite o nome do produto">
  
              <label for="nome">Categoria</label>
              <input class="form-control emb-3" required type="text" name="categoria" id="categoria" placeholder="defina uma categoria">
              
             
              <label for="qtd">Quantidade</label>
              <input class="form-control" required type="number" name="qtd" id="qtd" placeholder="Digite a quantidade do produto">
  
              <label for="valor">Preço</label>
              <input class="form-control" required type="text" name="valor" id="valor" placeholder="Digite o preço">
  
          
  
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Adicionar</button>
        </div>
  
        </form>
        </div>
  
      </div>
    </div>
  </div>
  
  


  <!-- Modal para confirmar se o usuario quer realmente excluir o produto do estoque -->
  <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title text-light" id="TituloModalCentralizado">Excluir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-center">
                Deseja excluir este compromisso?
            </p>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-danger" id="link">Sim</a>
            <button type="button" class="btn btn-secondary" 
                    data-dismiss="modal">Não</button>
        </div>
        </div>
    </div>
    </div>

  
  
  <header>
  
  <img src="src/img/logoTransparente.png" width="120px" height="120px" alt="">
      <div class="divTexto">
  
        
          <h2 style="font-family: sans-serif; text-decoration: underline; "
          >Olá <?php echo $_SESSION['nome']; ?> </h2>
  
  
          <h3 style="font-family: sans-serif; font-weight: bolder;text-shadow: 1px 1px white;background-image: linear-gradient(to right top, #272924, #232521, #20201d, #1c1c1a, #181817); ">
            <?php echo $_SESSION['empresa']; ?> </h3>
      </div>
  
      <div class="divConta">
          <a class="sobreConta btn btn-secondary" href="">Minha conta</a>
          <a class="logout btn btn-secondary" href="">Sair</a>
      </div>
  
  
  </header>
  
  <main>
      <h1>SUA PRATELEIRA</h1>
  
      <form action="" method="post" name="form" id="form">
  
      <div class="container divBotoes">  
          <a class="btn btn-secondary" href="#AdicionarProdutos" data-bs-toggle="modal" data-bs-target="">Adicionar novo produto</a>
  
          <input class="" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquise seu produto">
  
      </form>
      
        <form action="" method="post" name="form" id="form">
  
        <input style=" width: 230px;
      text-align: center;
      border-radius: 15px;
      height: 38px;" class="" type="search" name="categoria" id="categoria" placeholder="Pesquise a categoria">
  
        </form>
  
      </div>
  
        <div style="height:400px;  overflow-y: auto; ">
  
         <table  class="table  table-sm  table-secondary table-hover  " style="text-align: center; height:250px; ">
         <thead>  
           <tr >
              <th  scope="col">Id produto</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
              <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
              <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
             </tr>
          </thead>
        <tbody>
        <?php
        if($query->rowCount() <= 0){
          echo'';
  
        }else{ 
  
          foreach($resultado as $res){
        echo '     <tr> ';
        echo'      <th style="" scope="row">'.$res['id_produto']. '</th> ';
        echo'       <td>' .$res['nome'] .'</td> ';
        echo'       <td>' .$res['categoria'] .'</td> ';
        echo'       <td>' .$res['quantidade'] .'</td> ';
        echo'       <td>R$ ' .$res['preco'] .'</td> ';
  
        echo " <td style=cursor:pointer;> 
        <a href='?id=$res[id_produto]' onclick='abrirModalEditar({$res['id_produto']}, \"{$res['nome']}\", \"{$res['categoria']}\", {$res['quantidade']}, {$res['preco']})' data-bs-toggle='modal' data-bs-target='#editarProdutos'> 
        <i class='fa-solid fa-pen-to-square'></i> 
        </a> </td>";
        
        echo '<td style="cursor:pointer;"> 
        <a href="#excluir" data-bs-toggle="modal" data-bs-target="" onclick="excluir(' . $res['id_produto'] . ')"> 
            <i class="fa-solid fa-trash"></i> 
        </a> 
      </td>';

        echo'     </tr> ';
   
        
          }
        }
      ?>
          </tbody>
          </table>
      </div>
      
      </main>
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <script>
  function abrirModalEditar(id_produto, nome, categoria, quantidade, preco) {
      document.getElementById('nome').value = nome;
      document.getElementById('categoria').value = categoria;
      document.getElementById('qtd').value = quantidade;
      document.getElementById('valor').value = preco;
      document.getElementById('editarId').value = id_produto; // Adicione um campo oculto para o ID
  }
  </script>
  

  
  
  </body>
  </html>
  
   





