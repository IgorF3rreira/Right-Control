<?php
session_start();
include_once 'Conexao.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit();
}

// Identificar qual é o usuário
$id_usuario = $_SESSION['id_usuario']; // Você pode substituir isso pela sua lógica para obter o ID do usuário
if ($id_usuario === null) {
    echo '<script>alert("ID do usuário não fornecido.");</script>';
    exit();
}

$sql = 'SELECT * FROM tab_usuarios WHERE id_usuario = :id_usuario';
try {
    $query = $bd->prepare($sql);
    $query->execute([':id_usuario' => $id_usuario]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$resultado) {
        echo '<script>alert("Usuário não encontrado.");</script>';
        exit();
    }  
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Código para alterar o usuário
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $senhaAtual = hash('sha256', $_POST['senhaAtual']);
    $senhaNova = !empty($_POST['senhaNova']) ? hash('sha256', $_POST['senhaNova']) : null;

    if (empty($nome) || empty($email) || empty($empresa) || empty($sobrenome)) {
        echo '<script>alert("Necessário preencher todos os campos para alteração");</script>';
    } else {
        if(!empty($senhaAtual) && !empty($senhaNova) ){ //achar o usuario
        $consultaSenha = 'SELECT * FROM tab_usuarios WHERE senha = :senha AND id_usuario = :id_usuario';
        $stmt = $bd->prepare($consultaSenha);
        $stmt->bindParam(':senha', $senhaAtual);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        if (count($registro) == 1) {
            // Atualiza os dados do usuário mudando a senha junto se ele quiser
            $sql = 'UPDATE tab_usuarios SET nome = ?, sobrenome = ?, empresa = ?, email = ?, senha = ? WHERE id_usuario = ?';
            try {
                $query = $bd->prepare($sql);
                $query->execute([$nome, $sobrenome, $empresa, $email, $senhaNova ?? $resultado['senha'], $id_usuario]);
                
                // Redirecionar para a página de login
                session_destroy();
                echo '<script type="text/javascript">
                window.alert("Suas informações foram atualizadas com sucesso !!");
                setTimeout(function() {
                    window.location.href = "login.php"; 
                }, 100);
            </script>';
                exit();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo '<script>alert("Senha atual incorreta.");</script>';
        }
    }else{
        $consultaUsu = 'SELECT * FROM tab_usuarios WHERE  id_usuario = :id_usuario';
        $stmt = $bd->prepare($consultaUsu);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    // Atualiza os dados do usuário para quando ele nao mudar a senha
        if (count($registro) == 1) {
            // Atualiza os dados do usuário
            $sql = 'UPDATE tab_usuarios SET nome = ?, sobrenome = ?, empresa = ?, email = ?WHERE id_usuario = ?';
            try {
                $query = $bd->prepare($sql);
                $query->execute([$nome, $sobrenome, $empresa, $email, $id_usuario]);
                
                // Redirecionar para a página de login
                session_destroy();
                echo '<script type="text/javascript">
                window.alert("Suas informações foram atualizadas com sucesso !!");
                setTimeout(function() {
                    window.location.href = "login.php"; 
                }, 100);
            </script>';
                exit();
            } catch (PDOException $e) {
                echo $e->getMessage();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/cadastro.css">
</head>
<body>
    <header>
        <img id="logo" src="src/img/logoTransparente.png" alt="">
    </header>
    <main>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formEdit" name="formEdit" enctype="multipart/form-data">
                <h1>Minha Conta</h1>
                <div class="inputBox ">
                    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($resultado['nome']); ?>" required>
                    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo htmlspecialchars($resultado['sobrenome']); ?>" required>
                    <input type="text" name="empresa" id="empresa" value="<?php echo htmlspecialchars($resultado['empresa']); ?>" required>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($resultado['email']); ?>" required>
                    <input type="password" name="senhaAtual" id="senhaAtual" placeholder="Senha Atual" >
                    <input type="password" name="senhaNova" id="senhaNova" placeholder="Nova Senha">
                </div>

                <div class="esqueceuSenha">
   
            </div>

                </di>
                <button type="submit" name="submit" id="submit" class="btn">Alterar</button>
                <div class="semCadastro">
                    <a class="btn" href="home.php"><i class="fa-solid fa-angle-left"></i>Voltar</a>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
