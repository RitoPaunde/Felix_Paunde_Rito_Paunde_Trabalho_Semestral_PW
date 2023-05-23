<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho semestral</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php
    require('tags/links.php');
    ?>
    <style>
        .disponibilidade-form {
            margin-top: -50px;
            position: relative;
            z-index: 2;
        }

        @media screen and(max-width:575px) {
            .disponibilidade-form {
                margin-top: 25px;
                padding: 0 35px;

            }

        }
    </style>
</head>

<body class="bg-light">

    <?php
    require('tags/cadastro.php');
    ?>

    <!--imagens do hotel no centro da pagina -->
    <div class="container-fluid px-lg-4 mt-4 ">


        <!-- Animacao das imagens centrais ou que eestao do meio da pagina -->
        <div class="swiper swiper-container">

            <div class="swiper-wrapper">
                <?php
                $res = selecionarTodos('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;

                    echo <<<data
           
            <div class="swiper-slide">
            <img src=" $path$row[imagem]" class="w-100 d-block"></div>
    
 data;
                }
                ?>


                <div class="swiper-slide">
                    <img src="imagens/Hotel/2.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/3.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/4.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/5.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/6.png" class="w-100 d-block">
                </div>

                <div class="swiper-slide">
                    <img src="imagens/Hotel/7.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/8.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/9.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/Hotel/10.png" class="w-100 d-block">
                </div>
            </div>

        </div>

    </div>

    <!--formulário de disponibilidade-->
    <div class="container disponibilidade-form">
        <div class="row">
            <div class="col-lg-l2 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Verifcar a disponibilidade dos Quartos</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500;">Adultos</label>
                            <select class="form-select shadow-none">

                                <option value="1">Um</option>
                                <option value="2">Dois</option>
                                <option value="3">Tres</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500;">Criancas</label>
                            <select class="form-select shadow-none">

                                <option value="1">Uma</option>
                                <option value="2">Duas</option>
                                <option value="3">Tres</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submeter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Quartos-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Quartos</h2>
    <div class="container">
        <div class="row">
            <!--Quarto1-->
            <div class="col-lg-4 col-md-6 my-3">
                <!-- Cartões-->
                <div class="card border-0 shadow" style="max-width: 358px; margin: auto;">
                    <img src="imagens/Quartos/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Quarto Simples</h5>
                        <h6>100$ por noite</h6>
                        <div class="caracteristicas mb-4">
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
                        <div class="inslacoes mb-4 ">
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

                        <div class="convidados mb-4">
                            <h6 class="mb-1">Convidados</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                        </div>
                        <div class="avaliacoes mb-4">
                            <h6 class="mb-1">Avaliação</h6>
                            <span class="distintivo rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>

                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserve</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mais detalhes</a>

                        </div>


                    </div>
                </div>
            </div>
            <!--Quarto2-->
            <div class="col-lg-4 col-md-6 my-3">
                <!-- Cartões-->
                <div class="card border-0 shadow" style="max-width: 358px; margin: auto;">
                    <img src="imagens/Quartos/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Quarto Simples</h5>
                        <h6>100$ por noite</h6>
                        <div class="caracteristicas mb-4">
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
                        <div class="inslacoes mb-4 ">
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
                        <div class="convidados mb-4">
                            <h6 class="mb-1">Convidados</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                        </div>
                        <div class="avaliacoes mb-4">
                            <h6 class="mb-1">Avaliação</h6>
                            <span class="distintivo rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>

                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserve</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mais detalhes</a>

                        </div>


                    </div>
                </div>
            </div>
            <!--Quarto3-->
            <div class="col-lg-4 col-md-6 my-3">
                <!-- Cartões-->
                <div class="card border-0 shadow" style="max-width: 358px; margin: auto;">
                    <img src="imagens/Quartos/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Quarto Simples</h5>
                        <h6>100$ por noite</h6>
                        <div class="caracteristicas mb-4">
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
                        <div class="instalacoes mb-4 ">
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

                        <div class="convidados mb-4">
                            <h6 class="mb-1">Convidados</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adultos</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">4 Crianças</span>

                        </div>

                        <div class="avaliacoes mb-4">
                            <h6 class="mb-1">Avaliação</h6>
                            <span class="distintivo rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>

                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserve</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mais detalhes</a>

                        </div>


                    </div>
                </div>
            </div>


            <div class="col-lg-12 text-center nt-5">
                <a href="#" class="btn btn-sn btn-outline-dark rounded-0 fw-bold shadow-none">Outros Quartos >>></a>
            </div>
        </div>
    </div>
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Outras instalações</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Imagens/icons/wifi.svg" width="80px">
                <h5 class="mb-3">WIFI</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Imagens/icons/ac1.svg" width="80px">
                <h5 class="mb-3">AC</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Imagens/icons/tv.svg" width="80px">
                <h5 class="mb-3">TV</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Imagens/icons/spar.svg" width="80px">
                <h5 class="mb-3">SPAR</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sn btn-outline-dark rounded-0 fw-bold shadow-none">Outros instalações >>></a>

            </div>
        </div>
    </div>

    <!--Comentarios-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Comentarios</h2>
    <div class="container mt-5 ">
        <div class="swiper swiper-comentarios">
            <div class="swiper-wrapper mb-5">
                <!--comentario 1-->
                <div class="swiper-slide bg-white p-4">
                    <div class="perfil d-flex align-items-center m-3">
                        <img src="Imagens/icons/ac1.svg" width="30px">
                        <h6 class="m-0 ms-2">Rondom user1</h6>

                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia quam corporis sed libero
                        eligendi
                        velit maiores nesciunt quod, molestiae exercitationem maxime quasi iure quo fugiat aperiam
                        voluptatum dolores vel hic.</p>
                    <div class="avaliacoes">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>
                <!--comentario 2-->
                <div class="swiper-slide bg-white p-4">
                    <div class="perfil d-flex align-items-center m-3">
                        <img src="Imagens/icons/ac1.svg" width="30px">
                        <h6 class="m-0 ms-2">Rondom user1</h6>

                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia quam corporis sed libero
                        eligendi
                        velit maiores nesciunt quod, molestiae exercitationem maxime quasi iure quo fugiat aperiam
                        voluptatum dolores vel hic.</p>
                    <div class="avaliacoes">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>
                <!--comentario 3-->
                <div class="swiper-slide bg-white p-4">
                    <div class="perfil d-flex align-items-center m-3">
                        <img src="Imagens/icons/ac1.svg" width="30px">
                        <h6 class="m-0 ms-2">Rondom user1</h6>

                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia quam corporis sed libero
                        eligendi
                        velit maiores nesciunt quod, molestiae exercitationem maxime quasi iure quo fugiat aperiam
                        voluptatum dolores vel hic.</p>
                    <div class="avaliacoes">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sn btn-outline-dark rounded-0 fw-bold shadow-none">Encontre-nos
                >>></a>

        </div>
    </div>

    <!--Nossos contactos-->


    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contacte-Nos</h2>
    <div class="container">
        <div class="row">
            <!--Localizacao do google maps-->
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe height="320px" class="w-100 rounded" src="<?php echo $contact_r['iframe'] ?>"
                    loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <!--Numeros para contacto-->
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Ligue-nos</h5>
                    <a href="tel: +<?php echo $contact_r['telefone1'] ?>"
                        class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
                        +
                        <?php echo $contact_r['telefone1'] ?>
                    </a>
                    <br>
                    <?php
                    if ($contact_r['telefone2'] != '') {
                        echo <<<data
                        <a href="tel: +$contact_r[telefone2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +$contact_r[telefone2]</a>
                        
                        data;
                    }
                    ?>


                </div>
                <!--Redes sociais-->
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Siga-nos</h5>
                    <?php
                    echo <<<data
                    <a href="$contact_r[fecebook]" class="d-inline-block mb-3 ">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i> Facebook </span> </a>
               
                    data;
                    ?>


                    <a href="<?php echo $contact_r['instagram'] ?>" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram

                        </span>
                    </a>


                </div>


            </div>
        </div>



    </div>

    <!--Rodape-->
    <?php
    require('tags/rodaPe.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var deslize = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,

            autoplay: {
                delay: 3500,
                disableOnInteraction: false,

            }


        });

        var swiper = new Swiper(".swiper-comentarios", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                1024: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 1,
                },
                320: {
                    slidesPerView: 1,
                },
            }
        });
    </script>

</body>

</html>