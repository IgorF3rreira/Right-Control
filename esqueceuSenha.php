<?php


   include_once 'Conexao.php';

   if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $senhaCrypto = hash('Sha256', $senha);

    // Verificar se os campos estão vazios
    if (empty($email) || empty($senha)) {
        echo '<script type="text/javascript">window.alert("Preencha todos os campos");</script>';
    } else {
        // Verificação para achar o usuario no banco de dados atraves do email
        $sql = 'SELECT * FROM tab_usuarios WHERE email = :email';
        $query = $bd->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $usuarios = $query->fetch(PDO::FETCH_ASSOC);

        if ($usuarios === false) {
            echo '<script type="text/javascript">window.alert("Email não cadastrado");</script>';
        } else {
            // Pegando o id e a senha do usuário que foi encontrado no banco
            $usuarioId = $usuarios['id_usuario'];
            $senhaAtual = $usuarios['senha'];

            // Verifica se a nova senha é igual à atual
            if ($senhaCrypto === $senhaAtual) {
                echo '<script type="text/javascript">window.alert("A nova senha não pode ser igual à atual!");</script>';
            } else {
                $sql = 'UPDATE tab_usuarios SET senha = :senha WHERE id_usuario = :id_usuario';
                $query = $bd->prepare($sql);
                $query->bindParam(':senha', $senhaCrypto);
                $query->bindParam(':id_usuario', $usuarioId);

                if ($query->execute()) {
                    echo '<script type="text/javascript">
                        window.alert("Senha atualizada com sucesso!");
                        setTimeout(function() {
                            window.location.href = "login.php"; 
                        }, 100);
                    </script>';
                } else {
                    echo '<script type="text/javascript">window.alert("Erro ao atualizar a senha.");</script>';
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

    <link rel="stylesheet" href="src/css/login.css">
    
</head>
<body>
 
    <header>
        <img id="logo"  src="src/img/logoTransparente.png" alt="">
    </header>

   

<main>

    <div class="container">
        <form action="" method="post" name="formEsqSenha" id="formEsqSenha">
            <h1>Esqueceu sua senha?</h1>
            <div class="inputBox">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" placeholder=" Nova Senha" required>
                <i class="fa-solid fa-lock"></i>
            </div>

         

            <button type="submit" id="submit" name="submit" class="btn">Alterar Senha</button>

        </form>

    </div>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>