<?php
require('../tags/sendgrid/sendgrid-php.php');

function enviarEmailConfirmacao($email, $linkConfirmacao)
{
    $emailObj = new \SendGrid\Mail\Mail();
    $emailObj->setFrom("ritopaunde@gmail.com", "Rito");
    $emailObj->setSubject("Confirmação de Cadastro");
    $emailObj->addTo($email);
    $emailObj->addContent(
        "text/html",
        "<p>Obrigado por se cadastrar! Clique no link a seguir para confirmar seu cadastro: <a href='$linkConfirmacao'>Confirmar Cadastro</a></p>"
    );

    $sendgridApiKey = 'SUA_CHAVE_DE_API_DO_SENDGRID'; // Substitua 'SUA_CHAVE_DE_API_DO_SENDGRID' pela sua chave de API do SendGrid
    $sendgrid = new \SendGrid($sendgridApiKey);
    try {
        $response = $sendgrid->send($emailObj);
        return true;
    } catch (Exception $e) {
        return false;
    }
}


?>