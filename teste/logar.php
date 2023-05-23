<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para verificar o usuário com o email e senha fornecidos
    $sql = "SELECT * FROM user_cred WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Autenticação bem-sucedida
        $_SESSION['email'] = $email;
        $_SESSION['mensagem'] = 'Login realizado com sucesso.';


        header('Location: ../index_login.php');
        exit;
    } else {
        // Autenticação falhou
        $erro = 'Credenciais inválidas. Por favor, tente novamente.';
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
        <h2>Login</h2>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Digite Seu Email</label>
                    <input name="email" type="email" class="form-control shadow-none"
                        value="<?php echo isset($email) ? $email : ''; ?>">
                </div>

                <div class="mb-4">
                    <label class="form-label">Digite uma Senha Valida</label>
                    <input name="senha" type="password" class="form-control shadow-none"
                        value="<?php echo isset($senha) ? $senha : ''; ?>">

                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" class="btn btn-dark shadow-none">Entrar</button>
                    <a href="javascript: void(0) " class=" text-decoration-none">Esqueceu a
                        Senha?</a>

                </div>
                <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais
                    ninguém.

                </div>
            </div>
        </form>
    </div>
</body>

</html>