<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Right Control</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="src/css/inicial.css">
    
    <link rel="stylesheet" href="src/css/reset.css">
  </head>
<body>
    
<main>
    <img class="logo" src="src/img/logo.jpg" alt="RIGHT CONTROL" title="RIGHT CONTROL">

    <div class="container">
        <h1 class="container">RIGHT CONTROL</h1>
            <div class="container ">
                <h2 id="textoInicial" class="container"> O melhor estoque online para seu negócio</h2>
                <h2 id="textoInicial2" class="container"> O melhor estoque <br> online para <br>seu negócio</h2>
                

            </div>
    </div>

    <div id="btns" class=" container">
        <a href="login.php"><button id="btnLog"  class=" container btn  ">ENTRAR</button></a>
      
        <a href="cadastro.php"><button id="btnCad"  class=" container btn  ">CADASTRAR-SE</button></a>
       
    </div>

</main>

<footer id="meu-footer" class="container border border-0">
<a href="#exampleModal "  data-bs-toggle="modal" data-bs-target="#exampleModal">
&copy; Saiba mais</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
</footer>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>