<?php

require('tags/essencial.php');


adminLogin();
require('tags/db_config.php');


if (isset($_GET['visto'])) {

    $frm_data = filtrar($_GET);

    if ($frm_data['visto'] == 'all') {
        // $q = "UPDATE `user_consultas` SET `visto`=? ";
        //  $values = [1];


        // if (actualizar($q, $values, 'i')) {
        //      alert('sucess', 'Todos Marcado como lido');
        //  } else {
        //       alert('error', 'Falha na operaçao');
        //   }

    } else {
        $q = "UPDATE `user_consultas` SET `visto`=? WHERE `id_user`=?";
        $values = [1, $frm_data['visto']];


        if (actualizar($q, $values, 'ii')) {
            alert('sucess', 'Marcado como lido');
        } else {
            alert('error', 'Falha na operaçao');
        }
    }
}

if (isset($_GET['del'])) {

    $frm_data = filtrar($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_consultas`";

        //   if (mysqli_query($con,$q)) {
        // alert('sucess', ' Todos Dados apagado');
        //  } else {
        //    alert('error', 'Falha na operaçao');
        // }

    } else {
        $q = "DELETE FROM `user_consultas` WHERE `id_user`=?";
        $values = [$frm_data['del']];


        if (selecionar($q, $values, 'i')) {
            alert('error', ' Falha na operaçao');
        } else {
            alert('sucess', 'Dado apagado');
        }
    }
}

?>



<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do administrador-definicoes</title>
    <?php require('tags/links.php '); ?>
</head>

<body class="bg-light">

    <?php require('tags/menu.php'); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="m-4">USER CONSULTAS</h3>

                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?visto=all" class="btn btn-dark rounded-pill shadow-none btn-sm"><i
                                    class="bi bi-check-all"></i> Marcado todos com
                                lido</a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm"><i
                                    class="bi bi-trash"></i>Apagar todos
                                lido</a>
                        </div>

                        <div class="table-responsive-md " style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">

                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Assunto</th>
                                        <th scope="col" width="30%">Mensagem</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Visualizaçao</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `user_consultas` ORDER BY `id_user` DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $visto = '';
                                        if ($row['visto'] != 1) {
                                            $visto = "<a href ='?visto=$row[id_user]' class='btn btn-sm rounded-pill btn-primary' >Mark as read</a>";
                                        }
                                        $visto .= "<a href ='?del=$row[id_user]' class='btn btn-sm rounded-pill btn-danger mt-2' >Delete</a>";


                                        echo <<<query
                              <tr>

                                       <td>$i</td>
                                      <td>$row[nome]</td>
                                      <td>$row[email]</td>
                                      <td>$row[assunto]</td>
                                      <td>$row[mensagem]</td>
                                      <td>$row[date]</td>
                                      <td>$visto</td>

                              </tr>
                        
                                     
                                      
                              
                                 
                            query;
                                        $i++;
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>






            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>



    <?php require('tags/script.php'); ?>

</body>

</html>