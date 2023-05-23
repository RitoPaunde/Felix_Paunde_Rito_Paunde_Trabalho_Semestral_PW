<?php
session_start();

if (isset($_SESSION['mensagem'])) {
    echo '<div class="alert alert-success">' . $_SESSION['mensagem'] . '</div>';
    unset($_SESSION['mensagem']); // Remove a mensagem da sessão para que não seja exibida novamente na atualização da página
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Menu</h2>
        <!-- Conteúdo do menu -->
    </div>
</body>

</html>