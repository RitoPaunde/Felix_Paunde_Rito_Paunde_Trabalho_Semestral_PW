<?php
//dados de propósito de front-end

define('SITE_URL', 'http://127.0.0.1/trabalhosemestral%201.0/');
define('ABOUT_IMG_PATH', SITE_URL . 'imagens/about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'imagens/Hotel/');

//processo de upload de back-end precisa desses dados

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/TrabalhoSemestral 1.0/Imagens/');
define('ABOUT_FOLDER', 'about/');
define('HOTEL_FOLDER', 'Hotel/');
define('USERS_FOLDER', 'users/');

// SendGrid chave api
define('SENDGRID_API_KEY', "SG.Nq5jkLk5TOO1JJ_WeMMK8g.EwhejpWWWIIRpLifJbFeQxfkLno9gh4SKr8");


function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {

        // utiliza o método echo para imprimir a tag de script e redirecionar a página
        echo "
    <script>window.location.href='index.php';</script>
    ";
        exit;
    }

}

// define a função para redirecionamento
function redicionar($url)
{
    // utiliza o método echo para imprimir a tag de script e redirecionar a página
    echo "
     <script>window.location.href='$url';</script>
     ";
    exit;
}



function alert($type, $msg)
{
    $bs_class = ($type == "sucesso") ? "alert-sucess" : "alert-danger";
    echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
             <strong classe="me-3" >$msg</strong> .
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>

            alert;


}
function actualizarImagem($image, $folder)
{

    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // formato de imagem invalido
    } else if (($image['size'] / (1024 * 1024)) > 2) {
        return 'inv_size'; // tamanho invalido maior de 2mb
    } else {
        $ext = pathinfo($image['nome'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }

}
function deleteImage($image, $folder)
{
    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;

    } else {
        return false;
    }
}

function uploadUserImage($image)
{
    $valid_mine = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mine = $image['type'];

    if (!in_array($img_mine, $valid_mine)) {
        return 'inv_img';
    } else {
        $ext = pathinfo($image['nome'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";

        $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

        if ($ext == 'png' || $ext == 'PNG') {
            $img = imagecreatefrompng($image['tmp_name']);
        } else if ($ext == 'webp' || $ext == 'WEBP') {
            $img = imagecreatefromwebp($image['tmp_name']);
        } else {
            $img = imagecreatefrompng($image['tmp_name']);

        }

        if (imagejpeg($img, $img_path, 75)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }

}

?>