<?php
require('administrador/tags/db_config.php');
require('administrador/tags/essencial.php');
//require('teste/confirmar_cadastro.php'); // Arquivo confirmar-cadastro.php

$contact_q = "SELECT * FROM `contactos` WHERE `id_contactos`=? ";
$values = [1];
$contact_r = mysqli_fetch_assoc(selecionar($contact_q, $values, 'i'));

// Função para enviar o email de confirmação
function enviarEmailConfirmacao($email, $token)
{
    // Configure os detalhes de autenticação do SendGrid
    $apiKey = 'SEU_API_KEY_DO_SENDGRID';

    // Crie o objeto de envio de email do SendGrid
    $emailObj = new \SendGrid\Mail\Mail();
    $emailObj->setFrom("seu-email@dominio.com", "Seu Nome");
    $emailObj->setSubject("Confirmação de Cadastro");
    $emailObj->addTo($email, "Destinatário");

    // Crie o link de confirmação com o token
    $link = "https://seusite.com/confirmar-cadastro.php?email=" . urlencode($email) . "&token=" . urlencode($token);

    // Corpo do email
    $emailObj->addContent(
        "text/html",
        "Olá,<br><br>Para confirmar seu cadastro, clique no link abaixo:<br><br><a href='$link'>Confirmar Cadastro</a>"
    );

    // Crie o objeto SendGrid
    $sendgrid = new \SendGrid($apiKey);

    // Envie o email usando o SendGrid
    try {
        $response = $sendgrid->send($emailObj);
        return true; // Email enviado com sucesso
    } catch (\Exception $e) {
        return false; // Falha ao enviar o email
    }
}

// Verificar se o formulário de registro foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $fotoPerfil = $_FILES['fperfil']['name'];
    $endereco = $_POST['endereco'];
    $pincode = $_POST['pincode'];
    $dataNascimento = $_POST['data_Nascimento'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf_Senha'];

    // Verificar se as senhas coincidem
    if ($senha != $confSenha) {
        echo "As senhas não coincidem.";
    } else {
        // Verificar se o nome já existe no banco de dados
        $nomeExistenteQuery = "SELECT * FROM user_cred WHERE nome = ?";
        $nomeExistenteValues = [$nome];
        $nomeExistenteResult = select($nomeExistenteQuery, $nomeExistenteValues);
        if (mysqli_num_rows($nomeExistenteResult) > 0) {
            echo "O nome informado já existe. Por favor, escolha outro nome.";
            return;
        }

        // Verificar se o email já existe no banco de dados
        $emailExistenteQuery = "SELECT * FROM user_cred WHERE email = ?";
        $emailExistenteValues = [$email];
        $emailExistenteResult = select($emailExistenteQuery, $emailExistenteValues);
        if (mysqli_num_rows($emailExistenteResult) > 0) {
            echo "O email informado já está em uso. Por favor, escolha outro email.";
            return;
        }

        // Gerar um token único para o email de confirmação
        $token = uniqid();

        // Mover a foto para o diretório do website
        $destinoFoto = "C:/xampp/xampp/htdocs/TrabalhoSemestral 1.0/Imagens/users/" . $fotoPerfil;

        move_uploaded_file($_FILES['fperfil']['tmp_name'], $destinoFoto);

        // Inserir os dados na tabela 'user_cred'
        $query = "INSERT INTO user_cred (nome, email, telefone, foto_perfil, endereco, pincode, data_nascimento, senha, token, confirmado) VALUES ('$nome', '$email', '$telefone', '$destinoFoto', '$endereco', '$pincode', '$dataNascimento', '$senha', '$token', 0)";
        mysqli_query($con, $query);

        // Enviar o email de confirmação
        if (enviarEmailConfirmacao($email, $token)) {
            echo "Cadastro realizado com sucesso. Verifique seu email para confirmar o cadastro.";
        } else {
            echo "Erro ao enviar o email de confirmação. Por favor, tente novamente.";
        }
    }
}
?>


<!--Menu-->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm stiky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font " href="index.php">HOTEL PAUNDE</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <!--me -2 serve para como espacamneto entre os links-->
                    <a class="nav-link active me-2" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="quartos.php">Quartos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="instalacoes.php">Instalações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="#">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="sobre.php">Sobre nós</a>
                </li>

            </ul>

            <div class="d-flex">

                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    <i class="bi bi-person-circle fs-3 me-2"></i> Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal"
                    data-bs-target="#RegistrarModal">
                    <i class="bi bi-person-fill-add fs-3 me-2 "></i> Registrar
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Modelo de login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center " id="staticBackdropLabel">
                        <i class="bi bi-person-badge-fill fs-3 me-2"></i> Login do Usuario
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none"><a href="teste/logar.php"
                                style="text-decoration: none; color: inherit;">Logar</a></button>


                    </div>





                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modelo de para registrar usuario -->
<div class="modal fade" id="RegistrarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="registro_form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center " id="staticBackdropLabel">
                        <i class="bi bi-person-fill-add fs-3 me-2"></i> Registrar o Usuario
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Nota: Os seus dados
                        devem coincidir com o seu documento de identificação (passaporte, carta de
                        condução, etc.) que será necessário durante o check-in
                    </span>
                    <div class="container-fluid">


                    </div>
                </div>
                <div class="text-center my-1">
                    <button type="submit" class="btn-dark shadow-none"> <a href="teste/cada.php"
                            style="text-decoration: none; color: inherit;">Registar</a>
                    </button>
                </div>



            </form>

        </div>

    </div>


</div>
</div>
</div>