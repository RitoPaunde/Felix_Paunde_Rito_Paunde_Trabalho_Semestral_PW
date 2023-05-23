<!DOCTYPE html>
<html>

<head>
    <title>Quartos Disponíveis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Quartos Disponíveis</h1>
        <div class="row">
            <?php
            $hname = 'localhost';
            $uname = 'root';
            $pass = '';
            $db = 'pw_trabalhosemestral';

            $con = mysqli_connect($hname, $uname, $pass, $db);

            if (!$con) {
                die("Não pode conectar-se à base de dados" . mysqli_connect_error());
            }

            function exibirFoto($id)
            {
                $hname = 'localhost';
                $uname = 'root';
                $pass = '';
                $db = 'pw_trabalhosemestral';

                $con = mysqli_connect($hname, $uname, $pass, $db);

                if (!$con) {
                    die("Não pode conectar-se à base de dados" . mysqli_connect_error());
                }

                $query = "SELECT foto FROM quartos WHERE id = $id";
                $result = mysqli_query($con, $query);

                if ($row = mysqli_fetch_assoc($result)) {
                    return base64_encode($row['foto']);
                }

                mysqli_close($con);
            }

            $query = "SELECT * FROM quartos";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-4 col-md-6 my-3">';
                echo '<div class="card border-0 shadow" style="max-width: 358px; margin: auto;">';
                echo '<img src="data:image/jpeg;base64,' . exibirFoto($row['id']) . '" class="card-img-top">';
                echo '<div class="card-body">';
                echo '<h5>' . $row['nome'] . '</h5>';
                echo '<h6>' . $row['preco'] . '$ por noite</h6>';
                echo '<div class="caracteristicas mb-4">';
                echo '<h6 class="mb-1">Características</h6>';
                echo '<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">' . $row['sofas'] . ' sofás</span>';
                echo '<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">' . $row['banheiro'] . ' Banheiro</span>';
                echo '<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">' . $row['varanda'] . ' Varanda</span>';
                echo '</div>';
                echo '<div class="instalacoes mb-4">';
                echo '<h6 class="mb-1">Instalações</h6>';
                $instalacoes = explode(',', $row['instalacoes']);
                foreach ($instalacoes as $instalacao) {
                    echo '<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">' . trim($instalacao) . '</span>';
                }
                echo '</div>';
                echo '<div class="convidados mb-4">';
                echo '<h6 class="mb-1">Convidados</h6>';
                echo '<span class="badge rounded-pill bg-light text-dark text-wrap">' . $row['adultos'] . ' Adultos</span>';
                echo '<span class="badge rounded-pill bg-light text-dark text-wrap">' . $row['criancas'] . ' Crianças</span>';
                echo '</div>';
                echo '<div class="avaliacoes mb-4">';
                echo '<h6 class="mb-1">Avaliação</h6>';
                echo '<span class="distintivo rounded-pill bg-light">';
                for ($i = 0; $i < $row['avaliacao']; $i++) {
                    echo '<i class="bi bi-star-fill text-warning"></i>';
                }
                echo '</span>';
                echo '</div>';
                echo '<div class="d-flex justify-content-evenly mb-2">';
                echo '<a href="reservar.php?id=' . $row['id'] . '" class="btn btn-sm text-white custom-bg shadow-none">Reservar</a>';
                echo '<a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mais detalhes</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            mysqli_close($con);
            ?>
        </div>
    </div>
</body>

</html>