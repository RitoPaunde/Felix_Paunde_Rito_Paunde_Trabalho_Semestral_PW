<?php

require('tags/essencial.php');
adminLogin();



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
                <h3 class="m-4">IMAGENS DO HOTEL</h3>


                <!--IMAGENS DO HOTEL gerais-->
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Imagens</h5>
                            <button type="button" class="btn btn-dark shadow-nome btn-sm" data-bs-toggle="modal"
                                data-bs-target="#carousel-s">
                                <i class="bi bi-plus-circle"></i> Adicionar
                            </button>

                        </div>
                        <div class="row" id="carousel-data">

                        </div>



                    </div>
                </div>

                <!--IMAGENS DE HOTEL detahes-->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Imagem</h5>

                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <div class=" mb-3">
                                            <label class="form-label fw-bold">Foto</label>
                                            <input type="file" name="foto_carousel" id="foto_carousel_inp"
                                                accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none"
                                                required>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="foto_carousel.value=''"
                                        class="btn text-secondary shadow-nome" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Guardar</button>
                                </div>
                                <!-- onclick="adicionar_membro(nome_membro_inp.value,foto_membro_inp.value)"-->
                            </div>
                        </form>

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
    <script src="scripts/carousel.js"></script>
</body>

</html>