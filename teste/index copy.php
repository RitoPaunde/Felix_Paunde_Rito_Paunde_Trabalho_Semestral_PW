<?php
require_once 'conexao.php';
require_once 'enviar_email.php';

$nome = '';
$foto = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $foto = $_FILES['foto']['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // Verifica se as senhas são iguais
    if ($senha !== $confirmarSenha) {
        $erro = 'As senhas não coincidem.';
    } else {

        // Verifica se o usuário já está cadastrado
        $sqlVerificar = "SELECT * FROM teste WHERE senha = '$senha' AND email = '$email'";
        $resultVerificar = mysqli_query($con, $sqlVerificar);
        if (mysqli_num_rows($resultVerificar) > 0) {
            $erro = 'Usuário já cadastrado com esses dados.';
        } else {
            // Insere os dados na tabela do banco de dados
            $sql = "INSERT INTO teste (nome, foto, email, senha) VALUES ('$nome', '$foto', '$email', '$senha')";
            if (mysqli_query($con, $sql)) {
                // Dados inseridos com sucesso

                // Envia o email de confirmação
                $linkConfirmacao = 'http://localhost/trabalhosemestral%201.0/teste/confirmar_cadastro.php?email=' . urlencode($email);
                if (enviarEmailConfirmacao($email, $linkConfirmacao)) {
                    session_start();
                    $_SESSION['mensagem'] = 'Cadastro realizado com sucesso. Verifique seu email para confirmar o cadastro.';
                    header('Location: menu.php');
                    exit;
                } else {
                    $erro = 'Erro ao enviar o email de confirmação.';
                }
            } else {
                $erro = 'Erro ao cadastrar os dados: ' . mysqli_error($con);
            }
        }
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mini Sistema de Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-4">
        <h2>Cadastro</h2>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $nome; ?>">
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto" accept=".jpg, .jpeg, .png, .webp"
                    required value="<?php echo $foto; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

</html>