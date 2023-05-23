<?php

require('../tags/db_config.php');
require('../tags/essencial.php');
adminLogin();


if (isset($_POST['adicionar_carousel'])) {


    $img_r = actualizarImagem($_FILES['foto'], HOTEL_FOLDER);

    if ($img_r == 'inv_img') {

        echo $img_r;

    } else if ($img_r == 'inv_size') {
        echo $img_r;

    } else if ($img_r == 'upd_failed') {
        echo $img_r;

    } else {
        $q = "INSERT INTO `carousel`(`imagem`) VALUES (?)";
        $values = [$img_r];
        $res = selecionar($q, $values, "s");
        echo $res;

    }

}
if (isset($_POST['get-carousel'])) {
    $res = selecionarTodos('carousel');
    while ($row = mysqli_fetch_assoc($res)) {
        $path = CAROUSEL_IMG_PATH;

        echo <<<data
   <div class="col-md-2 mb-3">
   <div class="card bg-dark text-white">
       <img src="$path$row[imagem]" class="card-img">
       <div class="card-img-overlay text-end">
           <button type="button" onclick ="remov_membros($row[id_team])" class="btn btn-danger btn-sm shadow-nome">
               <i class="bi bi-trash"></i>Delete
           </button>

       </div>
       
   </div>
</div> 
data;
    }
}

if (isset($_POST['remov_carousel'])) {
    $frm_data = filtrar($_POST);
    $values = [$frm_data['remov_imagem']];

    $pre_q = "DELETE FROM `carousel` WHERE `id_carousel`=?";
    $res = selecionar($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);


    if (deleteImage($img['foto'], HOTEL_FOLDER)) {
        $q = "DELETE FROM `carousel` WHERE `id_carousel`=?";

        $res = selecionar($q, $values, 'i');

        echo $res;
    } else {
        echo 0;
    }



}



?>