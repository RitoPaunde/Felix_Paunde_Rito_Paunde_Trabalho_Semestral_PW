<?php
require('tags/essencial.php');
require('tags/db_config.php');

session_start();

if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {

    redicionar('Painel_Controle.php');

}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Administrador</title>
    <?php
    require('tags/links.php');
    ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

        }
    </style>
</head>

<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden  ">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Login do Administrador</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="nome_admin" required type="text" class="form-control shadow-none text-center"
                        placeholder="Nome do administrador">
                </div>

                <div class="mb-4">
                    <input name="password_admin" required type="password" class="form-control shadow-none text-center"
                        placeholder="Senha do admin">

                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Entrar</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        // Verifica se o formulário com o campo de nome "login" foi enviado
        // Se o formulário foi enviado, o código dentro deste bloco será executado
    
        // Chama a função filtrar() para limpar os dados recebidos por meio do POST
        $frm_data = filtrar($_POST);

        // Define a query SQL para buscar na tabela 'administrador' o usuário e senha informados no formulário
        $query = "SELECT * FROM administrador WHERE Admin_Nome =? AND Admin_Password =?";
        $values = [$frm_data['nome_admin'], $frm_data['password_admin']];

        // Executa a query definida acima e guarda o resultado em $res
        $res = selecionar($query, $values, "ss");

        // Verifica se foi encontrado exatamente um registro na tabela 'administrador'
        if ($res->num_rows == 1) {
            // Se sim, recupera os dados do registro encontrado em $row
            $row = mysqli_fetch_assoc($res);

            // Define duas variáveis de sessão: adminLogin (para indicar que o usuário está logado) e adminId (para armazenar o ID do usuário)
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['Admin_Id'];

            // Redireciona para a página Painel_controle.php
            redicionar('Painel_controle.php');
        } else {
            // Se não, exibe uma mensagem de erro
            alert('error', 'Falha na autenticação - Credenciais inválidas!');
        }
    }


    ?>

</body>

</html>