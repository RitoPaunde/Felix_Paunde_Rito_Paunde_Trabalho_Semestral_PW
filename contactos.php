<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>


    <?php
    require('tags/links.php');
    ?>

</head>


<body class="bg-light">

    <?php
    require('tags/menu.php');
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contacte-nos</h2>

        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati corporis saepe
            optio porro, quos <br> iure sit
            sequi voluptas, inventore laborum facilis itaque nesciunt. Laboriosam modi asperiores earum sint adipisci
            voluptas!</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe height="320px" class="w-100 rounded mb-4" src="<?php echo $contact_r['iframe'] ?>"
                        loading="lazy"></iframe>

                    <h5>Endereço</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank " class="d--inline-block">
                        <i class="bi bi-geo-alt-fill"></i>
                        <?php echo $contact_r['endereco'] ?>

                    </a>
                    <h5 class="mt-4">Ligue-nos</h5>


                    <?php
                    echo <<<data
                    <a href="tel: +$contact_r[telefone1] "
                    class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
                    + $contact_r[telefone1]</a>
                    data;
                    ?>
                    <br>
                    <?php
                    echo <<<data
                    <a href="tel: +$contact_r[telefone2] "
                    class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
                    + $contact_r[telefone2]</a>
                    data;
                    ?>

                    <h5 class="mt-4">
                        <h5>Email</h5>

                        <i class="bi bi-envelope-at-fill"></i> <a href="mailto: <?php echo $contact_r['email'] ?>"
                            class="d-inline-block mb-2">
                            <?php echo $contact_r['email'] ?></a>
                    </h5>
                    <h5 class="mt-4">Siga-nos</h5>
                    <?php
                    if ($contact_r['fecebook'] != '') {
                        echo <<<data
                        <a href="$contact_r[fecebook]" class="d-inline-block fs-5 me-2  text-decoration-none text-dark"> <i class="bi bi-facebook me-1"></i></a>

                     data;
                    }

                    ?>



                    <a href="<?php echo $contact_r['instagram'] ?>"
                        class="d-inline-block fs-5 me-2 text-decoration-none text-dark ">
                        <i class="bi bi-instagram me-1"></i>
                    </a>

                </div>
            </div>
            <div class=" col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Nos envie uma mensagem</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Digite Seu Nome</label>
                            <input name="nome" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Digite Seu Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Digite o Assunto</label>
                            <input name="assunto" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Digite Sua Mensagem</label>
                            <textarea name="mensagem" required class="form-control shadow-none" rows="5"
                                style="resize: none;"></textarea>

                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3">Enviar</button>




                    </form>

                </div>
            </div>




        </div>
    </div>

    <?php
    if (isset($_POST['send'])) {
        $frm_data = filtrar($_POST);

        $q = "INSERT INTO `user_consultas`( `nome`, `email`, `assunto`, `mensagem`) VALUES (?,?,?,?)";
        $values = [$frm_data['nome'], $frm_data['email'], $frm_data['assunto'], $frm_data['mensagem']];

        $res = inserir($q, $values, 'ssss');
        if ($res == 1) {
            alert('sucess', 'mensagem enviada');

        } else {
            alert('error', 'falha na conexao! tente novamente');

        }

    }

    ?>


    <!--Rodape-->
    <?php
    require('tags/rodaPe.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>

</body >

</html >