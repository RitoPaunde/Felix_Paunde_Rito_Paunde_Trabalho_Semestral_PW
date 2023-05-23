<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <?php
    require('tags/links.php');
    ?>
    <style>
        .box:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>



<body class="bg-light">

    <?php
    require('tags/cadastro_login.php');
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Sobre nós</h2>

        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati corporis saepe
            optio porro, quos <br> iure sit
            sequi voluptas, inventore laborum facilis itaque nesciunt. Laboriosam modi asperiores earum sint adipisci
            voluptas!</p>
        <div class="container">
            <div class="row justify-content-between align-items-center ">
                <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2 ">
                    <h3 class="mb-3">Lorem ipsum dolor sit</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, recusandae doloremque? Sit
                        ullam aut sint dolor vitae tempore. Vitae error dicta sint voluptatem ut a? Incidunt vel
                        dignissimos voluptates magnam.</p>


                </div>
                <div class="col-lg-5 col-md-5 order-lg-2 order-md-2 order-1">
                    <img src="imagens/about/about.webp" class="w-100">
                </div>
            </div>
        </div>
        <div class="container mt-5">

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4  text-center box">
                        <img src="imagens/about/hotel.svg" width="70px">
                        <h4 class="mt-3">Mais de 40 Quartos</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="imagens/about/clientes.svg" width="70px">
                        <h4 class="mt-3">Mais de 350 Clientes</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="imagens/about/funcionarios.svg" width="70px">
                        <h4 class="mt-3">Mais de 20 Funcionarios</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="imagens/about/avaliacao.svg" width="70px">
                        <h4 class="mt-3">Mais de 100 Avaliações</h4>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <h3 class="my-5 fw-bold h-font text-center">Equipe de Administradores</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php
                $about_r = selecionarTodos('equipe_admin');
                $path = ABOUT_IMG_PATH;
                while ($row = mysqli_fetch_assoc($about_r)) {
                    echo <<<data
                    
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img  src="$path$row[foto] " class "w-100">
                    <h5 class="mt-3">$row[nome]</h5></div>
                    data;
                }
                ?>
                <!--Imagens dos Administradores-->

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img width="400" height="500" src="imagens/about/admin2.JPG ">
                    <h5 class="mt-3">Felix Paunde</h5>
                </div>


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <?php
    require('tags/rodaPe.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
        var swiper = new Swiper(".mySwiper", {

            spaceBetween: 0,
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