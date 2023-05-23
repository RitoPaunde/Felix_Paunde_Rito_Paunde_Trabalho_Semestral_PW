<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>


    <?php
    require('tags/links.php');
    ?>

</head>


<body class="bg-light">

    <?php
    require('tags/cadastro_login.php');
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Quartos</h2>

        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati corporis saepe
            optio porro, quos <br> iure sit
            sequi voluptas, inventore laborum facilis itaque nesciunt. Laboriosam modi asperiores earum sint adipisci
            voluptas!</p>
    </div>
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Escolher o tipo</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-6 ">
                                <h5 class="mb-3" style="font-size: 18px;">Verificar a disponibilidade</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>

                            <div class="border bg-light p-3 rounded mb-6 mt-3 ">
                                <h5 class="mb-3" style="font-size: 18px;">instalações</h5>
                                <div class="mb-2">

                                    <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3">
                                    <label class="form-check-label" for="f1">Primeira instalação</label>
                                </div>
                                <div class="mb-2">

                                    <input type="checkbox" id="f2" class="form-check-input shadow-none mb-3">
                                    <label class="form-check-label" for="f2">Segunda instalação</label>
                                </div>
                                <div class="mb-2">

                                    <input type="checkbox" id="f3" class="form-check-input shadow-none mb-3">
                                    <label class="form-check-label" for="f3">Terceira instalação</label>
                                </div>


                            </div>

                            <div class="border bg-light p-3 rounded mb-6 mt-3 ">
                                <h5 class="mb-3" style="font-size: 18px;">Convidados</h5>
                                <div class="d-flex">

                                    <div class="me-2">
                                        <label class="form-label">Adultos</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label">Crianças</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-8 col-md-12 px-4">
                <div class="card mb-3 border-0 shadow">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                            <img src="imagens/Quartos/2.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Quarto Simples</h5>
                            <div class="caracteristicas mb-1">
                                <h6 class="mb-1">Caracteristicas</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 sofas
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Banheiro
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Varanda
                                </span>


                            </div>

                            <div class="inslacoes mb-3 ">
                                <h6 class="mb-1">Instalações</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    TV
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    AC
                                </span>


                            </div>

                            <div class="convidados ">
                                <h6 class="mb-1">Convidados</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                            </div>
                        </div>

                        <div class="col-md-4 mt-lg-0 mt-md-0 mt-4 text-align-center">
                            <h6>100$ por noite</h6>
                            <div class="d-flex md-2 ">

                                <a href="#"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none me-2 md-2">Reserve</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border-0 shadow">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                            <img src="imagens/Quartos/2.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Quarto Simples</h5>
                            <div class="caracteristicas mb-1">
                                <h6 class="mb-1">Caracteristicas</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 sofas
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Banheiro
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Varanda
                                </span>


                            </div>

                            <div class="inslacoes mb-3 ">
                                <h6 class="mb-1">Instalações</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    TV
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    AC
                                </span>


                            </div>

                            <div class="convidados ">
                                <h6 class="mb-1">Convidados</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                            </div>
                        </div>

                        <div class="col-md-4 text-align-center">
                            <h6>100$ por noite</h6>
                            <div class="d-flex md-2 ">

                                <a href="#"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none me-2 md-2">Reserve</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border-0 shadow">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                            <img src="imagens/Quartos/2.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Quarto Simples</h5>
                            <div class="caracteristicas mb-1">
                                <h6 class="mb-1">Caracteristicas</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 sofas
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Banheiro
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Varanda
                                </span>


                            </div>

                            <div class="inslacoes mb-3 ">
                                <h6 class="mb-1">Instalações</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    TV
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    AC
                                </span>


                            </div>

                            <div class="convidados ">
                                <h6 class="mb-1">Convidados</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                            </div>
                        </div>

                        <div class="col-md-4 text-align-center">
                            <h6>100$ por noite</h6>
                            <div class="d-flex md-2 ">

                                <a href="#"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none me-2 md-2">Reserve</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php
        require('tags/rodaPe.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</body>

</html>