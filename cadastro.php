<?php
include_once 'Conexao.php';


// Adicionar um usuario
if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $dtNasc = $_POST['dtNasc'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $confirmaEmail = $_POST['confirmaEmail'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha'];

    // Verificar se todos os campos estão preenchidos
    if(empty($nome) || empty($sobrenome) || empty($dtNasc) || empty($empresa) || empty($email) || empty($senha)){
        echo '<script type="text/javascript">
                window.alert("Preencha todos os campos nescessarios");
                </script>
        
        ';
    }else{ 
        // Verificar se o email ja esta cadastrado no sistema
        $sql = 'SELECT * FROM tab_usuarios WHERE email = :email';
        $query = $bd->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($usuario) > 0){
            echo '<script type="text/javascript">
            window.alert("Email ja cadastrado no sistema");
            </script>
    
                 ';
        }else{
            // Verificar se o usuario é maior de idade
            $dataNascimento = new DateTime($dtNasc);
            $dataAtual = new DateTime();
            $idade = $dataAtual->diff($dataNascimento)->y;
            
            if($idade < 18){
                echo '<script type="text/javascript">
            window.alert("Nescessario ser maior de idade");
            </script>
    
                 ';
            }else{
                $sql = "INSERT INTO tab_usuarios (nome,sobrenome,dtNasc,empresa,email,senha) VALUES (:nome, :sobrenome, :dtNasc, :empresa, :email, :senha)";
        
                // Verificar se as senhas e os email
                if($senha != $confirmaSenha){
                    echo '<script type="text/javascript">
                    window.alert("As senhas não estão iguais");
                    </script>
            
                         ';
                }else{
                    if($email != $confirmaEmail){
                        echo '<script type="text/javascript">
                        window.alert("Os email não conferem !");
                        </script>
                
                             ';
                    }else{
                        try{
                            $query = $bd->prepare($sql);
                            $query->bindValue('nome', $nome, PDO::PARAM_STR);
                            $query->bindValue('sobrenome', $sobrenome, PDO::PARAM_STR);
                            $query->bindValue('dtNasc', $dtNasc);
                            $query->bindValue('empresa',$empresa, pdo::PARAM_STR);
                            $query->bindValue('email', $email, PDO::PARAM_STR);
                            $query->bindValue('senha', hash('sha256', $senha));                                          
                            $query->execute();

                        
                        // Obter o ID do usuário cadastrado
                        $usuarioId = $bd->lastInsertId();

                        // Criar a tabela tab_produtos para o usuário
                        $tabelaProdutos = "tab_produtos_" . $usuarioId;
                        $sql = "CREATE TABLE IF NOT EXISTS $tabelaProdutos (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            nome VARCHAR(100),
                            categoria VARCHAR(100),
                            quantidade INT,
                            preco DECIMAL(10, 2)
                        )";
                        $bd->exec($sql);

                        echo '<script type="text/javascript">window.alert("Usuário cadastrado com sucesso!");</script>';
                    } catch (PDOException $e) {
                        echo 'Erro: ' . $e->getMessage();
                    }
                }
            }
        }
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

    <link rel="stylesheet" href="src/css/cadastro.css">
    
</head>
<body>
 
    <header>
        <img id="logo"  src="src/img/logoTransparente.png" alt="">
    </header>

   

<main>



    <div class="container">
        <form action="" method="post" id="formCad" name="formCad" enctype="multipart/form-data" >
            <h1>Cadastre-se</h1>
            <div class="inputBox ">

                <input type="text" name="nome" id="nome" placeholder="Nome"  > 
              
                <input type="text" name="sobrenome" id="sobrenome"  placeholder="Sobrenome" required>

                <input type="date" name="dtNasc" id="dtNasc" required>

                <input type="text" name="empresa" id="empresa" placeholder="Empresa" required>

            
              
            </div>
            <div class="inputBox">
                <input type="email" name="email" id="email" placeholder="E-mail" required>

                <input type="email" name="confirmaEmail" id="confirmaEmail" placeholder="Confirmar E-mail" required>

                <input type="password" name="senha" id="senha" placeholder="Senha" required>

                <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirma Senha" required>

                
                
            </div>

            <div class="esqueceuSenha">
                <a href="#">Esqueceu sua senha?</a>
            </div>

            <button type="submit"  name="submit" id="submit" class="btn">Cadastrar</button>

            <div class="semCadastro">
                <p>Já possue login? <a href="login.php">Faça seu login</a></p>
            </div>
        </form>

    </div>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
