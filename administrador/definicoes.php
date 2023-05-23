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
                <h3 class="m-4">Definições</h3>
                <!--Definicoes gerais-->
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Definições Gerais</h5>
                            <button type="button" class="btn btn-dark shadow-nome btn-sm" data-bs-toggle="modal"
                                data-bs-target="#defi_geral-s">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>

                        <h5 class="card-title mb-1 fw-bold">Titulo da Pagina</h5>
                        <p class="card-text " id="titulo_pagina"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Sobre nos</h6>
                        <p class="card-text" id="sobre_pagina"></p>

                    </div>
                </div>

                <!-- Definicoes gerais detalhes-->
                <div class="modal fade" id="defi_geral-s" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="geral_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Definições Gerais</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Titulo da Pagina</label>
                                        <input type="text" name="titulo_pagina" id="titulo_pagina_inp"
                                            class="form-control shadow-none" required>

                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label fw-bold">Sobre nos</label>

                                        <textarea name="sobre_pagina" id="sobre_pagina_inp"
                                            class="form-control shadow-none" row="6" required></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        onclick="titulo_pagina.value= general_data.titulo_pagina, sobre_pagina.value= general_data.sobre_pagina"
                                        class="btn text-secondary shadow-nome" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="guardar" id="guardar"
                                        onclick="upd_geral(titulo_pagina_inp.value, sobre_pagina_inp.value);"
                                        class="btn custom-bg text-white shadow-none">Guardar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


                <!--Encerrar Definicoes gerais-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0"> Encerrar</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_encerrar(this.value)" class="form-check-input" type="checkbox"
                                        id="encerrar-toggle">
                                </form>


                            </div>

                        </div>


                        <p class="card-text">
                            Nenhum cliente pode reservar um quarto de hotel, quando o modo de Encerrado está ativado
                        </p>

                    </div>
                </div>
                <!--contactos Definicoes gerais-->
                <div class="card border-0 shadow-sm mb-4 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0"> Contactos Definições </h5>
                            <button type="button" class="btn btn-dark shadow-nome btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contactos-s">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Endereço</h6>
                                    <p class="card-text" id="endereco"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Maps</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle  fw-bold">Telefone</h6>
                                    <p class="card-text mb-1" mb-1><i class="bi bi-telephone-fill"> </i>
                                        <span id="t1"></span>
                                    </p>
                                </div>
                                <div class="mb-4">

                                    <p class="card-text"><i class="bi bi-telephone-fill"> </i>
                                        <span id="t2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle  fw-bold">Redes Sociais</h6>
                                    <p class="card-text mb-1" mb-1><i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>



                                    <p class="card-text"><i class="bi bi-instagram me-1"></i>
                                        <span id="insta"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle  fw-bold">iframe</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

                <!--Contactos detalhes-->
                <div class="modal fade" id="contactos-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contactos_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Definições Contactos</h5>


                                    <div class="modal-body">
                                        <div class="container-fluid p-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Endereço</label>
                                                        <input type="text" name="endereco" id="endereco_inp"
                                                            class="form-control shadow-none" required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Google Map link</label>
                                                        <input type="text" name="gmap" id="gmap_inp"
                                                            class="form-control shadow-none" required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Telefone(Com o codigo do seu
                                                            pais)</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="bi bi-telephone-fill">
                                                                </i></span>
                                                            <input type="number" name="t1" id="t1_inp"
                                                                class="form-control shadow-nome">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="bi bi-telephone-fill">
                                                                </i></span>
                                                            <input type="number" name="t2" id="t2_inp"
                                                                class="form-control shadow-nome">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" id="email_inp"
                                                                class="form-control shadow-none" required>

                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Redes sociasis</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="bi bi-facebook ">
                                                                </i></span>
                                                            <input type="text" name="fb" id="fb_inp"
                                                                class="form-control shadow-nome">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="bi bi-instagram">
                                                                </i></span>
                                                            <input type="text" name="insta" id="insta_inp"
                                                                class="form-control shadow-nome">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">iFrame</label>
                                                            <input type="text" name="iframe" id="iframe_inp"
                                                                class="form-control shadow-none" required>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" onclick="contactos_inp(contactos_data)"
                                            class="btn text-secondary shadow-nome"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" id="guardar"
                                            onclick="upd_contactos(endereco_inp.value, gmap_inp.value, t1_inp.value, t2_inp.value, email_inp.value, fb_inp.value, insta_inp.value, iframe_inp.value);"
                                            class="btn custom-bg text-white shadow-none">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <!--Definicoes Equipe_administradores gerais-->
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Administradores Definições</h5>
                            <button type="button" class="btn btn-dark shadow-nome btn-sm" data-bs-toggle="modal"
                                data-bs-target="#defi_administradores-s">
                                <i class="bi bi-plus-circle"></i> Adicionar
                            </button>

                        </div>
                        <div class="row" id="defi_administradores-data">
                            <div class="col-md-2 mb-3">
                                <div class="card bg-dark text-white">
                                    <img src="../imagens/about/IMG_17352.jpg" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button" class="btn btn-danger btn-sm shadow-nome">
                                            <i class="bi bi-trash"></i>Delete
                                        </button>

                                    </div>
                                    <p class="card-text text-center pc-3 py-2">Felix paunde</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <!--Definicoes Equipe_administrador detahes-->
                <div class="modal fade" id="defi_administradores-s" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="administradores_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Administrador</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" name="nome_membro" id="nome_membro_inp"
                                            class="form-control shadow-none" required>

                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label fw-bold">Foto</label>
                                        <input type="file" name="foto_membro" id="foto_membro_inp"
                                            accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none"
                                            required>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="nome_membro.value='', foto_membro.value=''"
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
    <script src="scripts/definicoes.js"></script>
</body>

</html>