<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pw_trabalhosemestral';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Não foi possível conectar-se ao banco de dados: " . mysqli_connect_error());
}
?>