<?php
require('../administrador/tags/db_config.php');
require('../administrador/tags/essencial.php');
require('../tags/sendgrid/sendgrid-php.php');

function enviar_Mail($mail, $nome, $token)
{
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("ritopaunde@.com", "Paunde");
    $email->setSubject("Link da conta de verificacao");

    $email->addTo($mail, $nome);


    $email->addContent("text/html", "

    Clique no link para confirmar seu email: <br>
    <a href='" . SITE_URL . "email_confirm.php?email=$mail&token=$token" . "'>
    Clique aqui
    </a>
    ");
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

    try {
        $sendgrid->send($email);
        return 1;
    } catch (Exception $e) {
        return 0;
    }



}

if (isset($_POST['cadastrar'])) {
    $data = filtrar($_POST);

    //intruduzir a senha e confirmar

    if ($data['senha'] != $data['conf_Senha']) {
        echo 'senha_conf';
        exit;
    }

    //verificar se user existe

    $user_exist = selecionar("SELECT * FROM `user_cred` WHERE `email`= ? AND `telefone`=? LIMIT 1", [$data['email'], $data['telefone']], "ss");
    if (mysqli_num_rows($user_exist) != 0) {
        $user_exist_fetch = mysqli_fetch_assoc($user_exist);
        echo ($user_exist_fetch['email'] == $data['email']) ? 'email_pronto' : 'telefone_pronto';
        exit;

    }
    //carregar a image don user para o servidor

    $img = uploadUserImage($_FILES['fperfil']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    }
    if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }



    //enviar link de confirmacao para o email do usuario
    $token = bin2hex(random_bytes(16));

    if (!enviar_Mail($data['email'], $data['nome'], $token)) {
        echo 'mail_falhou';
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
    $query = "INSERT INTO `user_cred`( `nome`, `email`, `endereco`, `telefone`, `pincode`, `data_Nascimento`, 
         `fperfil`, `senha`, `token`, ) VALUES (?,?,?,?,?,?,?,?,?)";
    $values = [$data['nome'], $data['email'], $data['endereco'], $data['telefone'], $data['pincode'], $data['data_Nascimento'], $img, $enc_pass, $token];

    if (inserir($query, $values, 'sssssssss')) {
        echo 1;
    } else {
        echo 'ins_falhou';
    }
}
?>