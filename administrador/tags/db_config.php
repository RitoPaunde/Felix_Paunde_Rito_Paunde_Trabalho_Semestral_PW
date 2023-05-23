<?php


$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pw_trabalhosemestral';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Não pode conectar-se a base de dados" . mysqli_connect_error());
}



function selecionarTodos($table)
{
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * FROM $table");
    return $res;
}


function filtrar($data)
{
    // Percorre cada elemento do array $data
    foreach ($data as $key => $value) {


        // Remove espaços em branco no início e fim da string
        $data[$key] = trim($value);
        // Remove barras invertidas adicionadas por addslashes()
        $data[$key] = stripslashes($value);
        // Converte caracteres especiais em entidades HTML
        $data[$key] = htmlspecialchars($value);
        // Remove tags HTML e PHP da string
        $data[$key] = strip_tags($value);

    }
    // Retorna o array $data com os valores filtrados
    return $data;

}


/**
 * Executa uma instrução SELECT na base de dados usando prepared statements
 *
 * @param string $sql a instrução SQL a ser executada
 * @param array $values um array contendo os valores dos parâmetros da instrução SQL
 * @param string $datatypes uma string contendo os tipos de dados dos parâmetros da instrução SQL
 * @return mixed o resultado da instrução SELECT, ou false em caso de erro
 */




function select($query, $values = [], $types = '')
{
    global $con;

    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . mysqli_error($con);
        return false;
    }

    if (!empty($values)) {
        mysqli_stmt_bind_param($stmt, $types, ...$values);
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        echo "Erro ao executar a consulta: " . mysqli_error($con);
        return false;
    }

    mysqli_stmt_close($stmt);

    return $result;
}

function selecionar($sql, $values, $datatypes)
{
    // Conecta a base de dados usando a variável global $con
    $con = $GLOBALS['con'];

    // Prepara a instrução SQL usando mysqli_prepare()


    if ($stmt = mysqli_prepare($con, $sql)) {
        // Define os valores dos parâmetros da instrução SQL usando mysqli_stmt_bind_param()
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        // Executa a instrução SQL usando mysqli_stmt_execute()
        if (mysqli_stmt_execute($stmt)) {
            // Obtém o resultado da instrução SQL usando mysqli_stmt_get_result()
            $res = mysqli_stmt_get_result($stmt);
            // Fecha a instrução preparada usando mysqli_stmt_close()
            mysqli_stmt_close($stmt);
            // Retorna o resultado da instrução SQL
            return $res;
        } else {
            // Fecha a instrução preparada e interrompe o script com die() em caso de falha na execução
            mysqli_stmt_close($stmt);
            die("A Query nao pode ser executada - selecionar");
        }
    } else {
        // Interrompe o script com die() em caso de falha na preparação da instrução SQL
        die("A Query nao pode ser preparada - selecionar");
    }


}


function actualizar($sql, $values, $datatypes)
{

    $con = $GLOBALS['con'];

    if ($stmt = mysqli_prepare($con, $sql)) {

        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        if (mysqli_stmt_execute($stmt)) {

            $res = mysqli_stmt_affected_rows($stmt);

            mysqli_stmt_close($stmt);

            return $res;
        } else {

            mysqli_stmt_close($stmt);
            die("A Query nao pode ser executada - actualizar");
        }
    } else {

        die("A Query nao pode ser preparada - actualizar");
    }


}


function inserir($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("A Query nao pode ser executada -   Inserir");
        }
    } else {
        die("A Query nao pode ser preparada - Inserir");
    }
}


/*
function delete($sql, $values, $datatypes)
{

    $con = $GLOBALS['con'];

    if ($stmt = mysqli_prepare($con, $sql)) {

        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        if (mysqli_stmt_execute($stmt)) {

            $res = mysqli_stmt_affected_rows($stmt);

            mysqli_stmt_close($stmt);

            return $res;
        } else {

            mysqli_stmt_close($stmt);
            die("A Query nao pode ser executada - delete");
        }
    } else {

        die("A Query nao pode ser preparada - delete");
    }


}


*/
function delete($con, $sql, $values, $datatypes)
{
    // Verificar se a conexão com o banco de dados está estabelecida
    if (!$con) {
        throw new Exception("Não foi possível conectar ao banco de dados.");
    }

    // Preparar a consulta SQL
    if (!($stmt = mysqli_prepare($con, $sql))) {
        throw new Exception("Não foi possível preparar a consulta.");
    }

    // Vincular os valores e tipos de dados à consulta preparada
    if (!mysqli_stmt_bind_param($stmt, $datatypes, ...$values)) {
        throw new Exception("Não foi possível vincular os valores à consulta.");
    }

    // Executar a consulta preparada
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Não foi possível executar a consulta.");
    }

    // Obter o número de linhas afetadas pela consulta
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    // Fechar a consulta preparada
    mysqli_stmt_close($stmt);

    // Retornar o número de linhas afetadas
    return $affected_rows;
}

// Função para executar consultas preparadas
function executar($query, $values)
{

    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'pw_trabalhosemestral';

    $conn = mysqli_connect($hname, $uname, $pass, $db);

    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . mysqli_error($conn));
    }

    // Vincula os valores aos parâmetros da consulta preparada
    if (!mysqli_stmt_bind_param($stmt, str_repeat("s", count($values)), ...$values)) {
        die("Erro ao vincular os valores: " . mysqli_stmt_error($stmt));
    }

    // Executa a consulta
    if (!mysqli_stmt_execute($stmt)) {
        die("Erro ao executar a consulta: " . mysqli_stmt_error($stmt));
    }

    // Fecha a declaração e a conexão com o banco de dados
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return true;
}



?>