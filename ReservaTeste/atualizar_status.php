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

    $query = "SELECT * FROM quartos WHERE id = $quartoId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $reservado = $row['reservado'];

        // Alterar o status do quarto
        $novoStatus = $reservado ? 0 : 1;
        $updateQuery = "UPDATE quartos SET reservado = $novoStatus WHERE id = $quartoId";
        mysqli_query($con, $updateQuery);

        if ($reservado) {
            echo "Quarto marcado como Não Reservado.";
        } else {
            echo "Quarto marcado como Reservado.";
        }
    } else {
        echo "Quarto não encontrado.";
    }
}

mysqli_close($con);
?>