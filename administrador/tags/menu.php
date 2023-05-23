<?php require('tags/links.php'); ?>

<style>


</style>

<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font ">Painel do administrador</h3>
    <a href="encerrar.php" class="btn btn-light btn-sm">Encerrar</a>

</div>
<div class="col-lg-2  bg-dark border-top border-3 border-secondary " id="painel_controlo_menu">
    <nav class="navbar navbar-expand-lg navbar-dark rounded shadow">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">Painel do administrador</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="adminDropdown">
                <ul class="nav nav-pills flex-column">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="Painel_controle.php">Painel de Controlo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="User_consultas.php">User Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="carousel.php">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="definicoes.php">definições</a>
                    </li>

                </ul>



            </div>

        </div>

    </nav>
</div>