<?php
session_start();
require_once 'conexao.php';
require_once 'enviar_email.php';



$nome = '';
$fotoPerfil = '';
$email = '';
$telefone = '';

$endereco = '';
$pincode = '';
$dataNascimento = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $fotoPerfil = $_FILES['fperfil']['name'];
    $endereco = $_POST['endereco'];
    $pincode = $_POST['pincode'];
    $dataNascimento = $_POST['data_Nascimento'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf_Senha'];

    // Verifica se as senhas são iguais
    if ($senha !== $confSenha) {
        $erro = 'As senhas não coincidem.';
    } else {
        // Verifica se o usuário já está cadastrado
        $sqlVerificar = "SELECT * FROM user_cred WHERE email = '$email' OR nome = '$nome'";
        $resultVerificar = mysqli_query($con, $sqlVerificar);
        if (mysqli_num_rows($resultVerificar) > 0) {
            $erro = 'Usuário já cadastrado com esses dados.';
        } else {
            // Insere os dados na tabela do banco de dados
            $sql = "INSERT INTO user_cred (nome, email, telefone, fperfil, pincode, endereco, data_Nascimento, senha) VALUES ('$nome', '$email', '$telefone', '$fotoPerfil', '$pincode', '$endereco', '$dataNascimento', '$senha')";
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
            <div class="modal-body">
                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Nota: Os seus dados devem
                    coincidir com o seu documento de identificação (passaporte, carta de condução, etc.) que será
                    necessário durante o check-in</span>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Digite Seu Nome</label>
                            <input name="nome" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Digite Seu Email</label>
                            <input name="email" type="email" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Digite Seu Numero de Telefone</label>
                            <input name="telefone" type="number" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Coloque sua foto</label>
                            <input name="fperfil" type="file" accept=".jpg, .jpeg, .png, .webp"
                                class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-12 ps-0 mb-3 p-0">
                            <label class="form-label">Coloque seu endereco</label>
                            <textarea name="endereco" class="form-control shadow-none" row="1" required></textarea>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Coloque o seu código PIN</label>
                            <input name="pincode" type="number" class="form-control shadow-none">
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Coloque a data de seu aniversario</label>
                            <input name="data_Nascimento" type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Coloque a sua senha</label>
                            <input name="senha" type="password" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Confirme a sua senha</label>
                            <input name="conf_Senha" type="password" class="form-control shadow-none" required>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

</html>