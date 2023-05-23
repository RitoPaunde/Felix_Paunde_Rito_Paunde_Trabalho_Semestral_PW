<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pw_trabalhosemestral';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Não pode conectar-se à base de dados: " . mysqli_connect_error());
}

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$sofas = $_POST['sofas'];
$banheiro = $_POST['banheiro'];
$varanda = $_POST['varanda'];
$instalacoes = $_POST['instalacoes'];
$adultos = $_POST['adultos'];
$criancas = $_POST['criancas'];
$avaliacao = $_POST['avaliacao'];

$query = "INSERT INTO quartos (nome, preco, sofas, banheiro, varanda, instalacoes, adultos, criancas, avaliacao) VALUES ('$nome', '$preco', '$sofas', '$banheiro', '$varanda', '$instalacoes', '$adultos', '$criancas', '$avaliacao')";

if (mysqli_query($con, $query)) {
    echo "Quarto adicionado com sucesso!";
} else {
    echo "Erro ao adicionar o quarto: " . mysqli_error($con);
}

mysqli_close($con);
?>