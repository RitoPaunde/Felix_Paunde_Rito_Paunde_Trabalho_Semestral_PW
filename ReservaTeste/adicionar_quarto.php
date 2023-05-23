<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pw_trabalhosemestral';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Não pode conectar-se à base de dados: " . mysqli_connect_error());
}

if (isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['sofas']) && isset($_POST['banheiro']) && isset($_POST['varanda']) && isset($_POST['instalacoes']) && isset($_POST['adultos']) && isset($_POST['criancas']) && isset($_POST['avaliacao'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $sofas = $_POST['sofas'];
    $banheiro = $_POST['banheiro'];
    $varanda = $_POST['varanda'];
    $instalacoes = $_POST['instalacoes'];
    $adultos = $_POST['adultos'];
    $criancas = $_POST['criancas'];
    $avaliacao = $_POST['avaliacao'];


    $insertQuery = "INSERT INTO quartos (nome, descricao, preco, sofas, banheiro, varanda, instalacoes, adultos, criancas, avaliacao) VALUES ('$nome', '$descricao', '$preco', '$sofas', '$banheiro', '$varanda', '$instalacoes', '$adultos', '$criancas', '$avaliacao')";
    mysqli_query($con, $insertQuery);

    echo "Quarto adicionado com sucesso.";
}

mysqli_close($con);
?>