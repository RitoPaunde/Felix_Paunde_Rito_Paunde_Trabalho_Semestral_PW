<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pw_trabalhosemestral';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Não pode conectar-se a base de dados" . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $quartoId = $_GET['id'];

    $query = "SELECT * FROM quartos WHERE id = $quartoId AND reservado = 0";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE quartos SET reservado = 1 WHERE id = $quartoId";
        mysqli_query($con, $updateQuery);

        echo "Quarto reservado com sucesso!";
    } else {
        echo "Desculpe, o quarto selecionado já está reservado.";
    }
}

mysqli_close($con);
?>