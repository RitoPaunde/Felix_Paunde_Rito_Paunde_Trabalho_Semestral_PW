<?php

require('../tags/db_config.php');
require('../tags/essencial.php');
adminLogin();

////////////////////////////////////
//frontend purpose data
/*
define('SITE_URL', 'http://127.0.0.1/trabalhosemestral%201.0/');
define('ABOUT_IMG_PATH', SITE_URL . 'imagens/about/');

//backend upload procss needs this data

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/TrabalhoSemestral 1.0/Imagens/');
define('ABOUT_FOLDER', 'about/');

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





///////////////////////
*/


if (isset($_POST['get_geral'])) {

    $q = "SELECT * FROM definicoes WHERE id_pagina=?  ";
    $values = [1];
    $res = selecionar($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;

}
if (isset($_POST['upd_geral'])) {
    $frm_data = filtrar($_POST);

    $q = "UPDATE `definicoes` SET `titulo_pagina`=? ,`sobre_pagina`=? WHERE`id_pagina`=?";

    $values = [$frm_data['titulo_pagina'], $frm_data['sobre_pagina'], 1];

    $res = actualizar($q, $values, "ssi");

    echo $res;

}

if (isset($_POST['upd_encerrar'])) {
    $frm_data = ($_POST['upd_encerrar'] == 0) ? 1 : 0;

    $q = "UPDATE `definicoes` SET `encerrar`=?  WHERE`id_pagina`=?";

    $values = [$frm_data, 1];

    $res = actualizar($q, $values, "ii");

    echo $res;

}

if (isset($_POST['get_contactos'])) {

    $q = "SELECT * FROM contactos WHERE id_contactos=?  ";
    $values = [1];
    $res = selecionar($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;

}

if (isset($_POST['upd_contactos'])) {
    $frm_data = filtrar($_POST);



    $q = "UPDATE `contactos` SET `endereco`=?,`gmap`=?,`telefone1`=?,`telefone2`=?,`email`=?,`fecebook`=?,`instagram`=?,`iframe`=? WHERE `id_contactos`=?";

    $values = [$frm_data['endereco'], $frm_data['gmap'], $frm_data['t1'], $frm_data['t2'], $frm_data['email'], $frm_data['fb'], $frm_data['insta'], $frm_data['iframe'], 1];

    $res = actualizar($q, $values, "ssssssssi");

    echo $res;

}
if (isset($_POST['adicionar_membro'])) {

    $frm_data = filtrar($_POST);
    $img_r = actualizarImagem($_FILES['foto'], ABOUT_FOLDER);

    if ($img_r == 'inv_img') {

        echo $img_r;

    } else if ($img_r == 'inv_size') {
        echo $img_r;

    } else if ($img_r == 'upd_failed') {
        echo $img_r;

    } else {
        $q = "INSERT INTO `equipe_admin`( `nome`, `foto`) VALUES (?,?)";
        $values = [$frm_data['nome_membro'], $img_r];
        $res = selecionar($q, $values, "ss");
        echo $res;

    }

}
if (isset($_POST['get-membros'])) {
    $res = selecionarTodos('equipe_admin');
    while ($row = mysqli_fetch_assoc($res)) {
        $path = ABOUT_IMG_PATH;

        echo <<<data
   <div class="col-md-2 mb-3">
   <div class="card bg-dark text-white">
       <img src="$path$row[foto]" class="card-img">
       <div class="card-img-overlay text-end">
           <button type="button" onclick ="remov_membros($row[id_team])" class="btn btn-danger btn-sm shadow-nome">
               <i class="bi bi-trash"></i>Delete
           </button>

       </div>
       <p class="card-text text-center pc-3 py-2">$row</p>
   </div>
</div> 
data;
    }
}

if (isset($_POST['remov_membros'])) {
    $frm_data = filtrar($_POST);
    $values = [$frm_data['remov_membros']];

    $pre_q = "DELETE FROM `equipe_admin` WHERE `id_team`=?";
    $res = selecionar($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);


    if (deleteImage($img['foto'], ABOUT_FOLDER)) {
        $q = "DELETE FROM `equipe_admin` WHERE `id_team`=";

        $res = selecionar($q, $values, 'i');

        echo $res;
    } else {
        echo 0;
    }



}



?>