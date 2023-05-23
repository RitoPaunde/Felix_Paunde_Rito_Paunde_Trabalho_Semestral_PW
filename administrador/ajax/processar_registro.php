<?php
require('../administrador/tags/db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    // ...recupere os outros campos do formulário aqui...

    // Insere os dados na tabela do banco de dados
    $sql = "INSERT INTO user_cred (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    if (mysqli_query($con, $sql)) {
        // Dados inseridos com sucesso

        // Envie o email de confirmação
        $assunto = 'Confirmação de Registro';
        $mensagem = 'Obrigado por se registrar. Clique no link a seguir para confirmar seu registro: http://seusite.com/confirmar_registro.php?email=' . urlencode($email);

        // Use a função mail() ou uma biblioteca de envio de email como PHPMailer para enviar o email

        echo 'Registro concluído com sucesso. Verifique seu email para confirmar o registro.';
    } else {
        echo 'Erro ao processar o registro: ' . mysqli_error($con);
    }
} else {
    echo 'Método de requisição inválido.';
}

mysqli_close($con);
?>