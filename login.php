<?php


   include_once 'Conexao.php';

     if(isset($_POST['submit'])){
        $email = isset($_POST['email']) ? $_POST['email'] :null;     $senha = isset($_POST['senha']) ? $_POST['senha'] :null;     $senhaCrypto = hash('Sha256', $senha);

    // Verificar se os campos estão vazio
    if(empty($email) || empty($senha)  ){
        echo '<script type="text/javascript"> 
            window.alert("Preencha todos os campos");
        </script>';
    }else{
        // Verificação para saber se existe o email e a senha informado nos input

        $sql = 'SELECT * FROM tab_usuarios WHERE email = :email AND senha = :senha';
           $query = $bd->prepare(  $sql );
           $query->bindParam(':email', $email);
           $query->bindParam(':senha', $senhaCrypto);
           $query->execute();
           $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
            
           if(count($usuarios) <= 0){
             echo '<script type="text/javascript"> 
               window.alert("Usuario ou Senha incorretos !!");
                   </script>';
         }else{  //'else para caso ele encontre  as informações passadas, redirecionar para a pagina que só pode ser acessada se estiver logado'
               header('Location: home.php');
                
               //Abrir uma sessão, e nessas sessões  receber as informações de quem esta logado pegando as informações no banco de dados

               $usuario = $usuarios[0];
               session_start();
               $_SESSION['login'] = $login;
            $_SESSION['logado'] = true;
               $_SESSION['id_usuario'] = $usuario['id_usuario'];
               $_SESSION['nome'] = $usuario['nome'];
               $_SESSION['empresa'] = $usuario['empresa'];
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="src/css/login.css">
    
</head>
<body>
 
    <header>
        <img id="logo"  src="src/img/logoTransparente.png" alt="">
    </header>

   

<main>

    <div class="container">
        <form action="" method="post" name="formLog" id="formLog">
            <h1>Login</h1>
            <div class="inputBox">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="esqueceuSenha">
                <a href="esqueceuSenha.php">Esqueceu sua senha?</a>
            </div>

            <button type="submit" id="submit" name="submit" class="btn">Login</button>

            <div class="semCadastro">
                <p>Não tem um cadastro? <a href="cadastro.php">Cadastre-se</a></p>
            </div>
        </form>

    </div>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>