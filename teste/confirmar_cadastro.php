<?php
require('administrador/tags/db_config.php');
require('administrador/tags/essencial.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verificar se o email e o token correspondem a um registro não confirmado
    $query = "SELECT * FROM user_cred WHERE email = ? AND token = ? AND confirmado = 0";
    $values = [$email, $token];
    $result = select($query, $values);

    if (mysqli_num_rows($result) > 0) {
        // Atualizar o registro para confirmado
        $updateQuery = "UPDATE user_cred SET confirmado = 1 WHERE email = ? AND token = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $token);
        mysqli_stmt_execute($stmt);

        echo "Cadastro confirmado com sucesso. Agora você pode fazer login.";
    } else {
        echo "Não foi possível confirmar o cadastro. Verifique se o link de confirmação é válido.";
    }
} else {
    echo "Requisição inválida. Verifique se os parâmetros de email e token estão presentes na URL.";
}
?>