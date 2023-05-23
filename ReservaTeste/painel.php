<!DOCTYPE html>
<html>

<head>
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Painel de Controle</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Quarto</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hname = 'localhost';
                $uname = 'root';
                $pass = '';
                $db = 'pw_trabalhosemestral';

                $con = mysqli_connect($hname, $uname, $pass, $db);

                if (!$con) {
                    die("Não pode conectar-se a base de dados" . mysqli_connect_error());
                }

                $query = "SELECT * FROM quartos";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['reservado'] ? 'Reservado' : 'Não reservado';
                    $action = $row['reservado'] ? 'Marcar como Não Reservado' : 'Marcar como Reservado';

                    echo '<tr>';
                    echo '<td>' . $row['nome'] . '</td>';
                    echo '<td>' . $status . '</td>';
                    echo '<td><a href="atualizar_status.php?id=' . $row['id'] . '">' . $action . '</a></td>';
                    echo '</tr>';
                }

                mysqli_close($con);
                ?>
            </tbody>
        </table>

        <h2>Adicionar Quarto</h2>
        <form method="POST" action="adicionar_quarto.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço por Noite:</label>
                <input type="number" class="form-control" id="preco" name="preco" min="0" required>
            </div>
            <div class="form-group">
                <label for="sofas">Número de Sofás:</label>
                <input type="number" class="form-control" id="sofas" name="sofas" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="banheiro">Número de Banheiros:</label>
                <input type="number" class="form-control" id="banheiro" name="banheiro" min="0" required>
            </div>
            <div class="form-group">
                <label for="varanda">Número de Varandas:</label>
                <input type="number" class="form-control" id="varanda" name="varanda" min="0" required>
            </div>
            <div class="form-group">
                <label for="instalacoes">Instalações:</label>
                <input type="text" class="form-control" id="instalacoes" name="instalacoes" required>
            </div>
            <div class="form-group">
                <label for="adultos">Número de Adultos:</label>
                <input type="number" class="form-control" id="adultos" name="adultos" min="0" max="3" required>
            </div>
            <div class="form-group">
                <label for="criancas">Número de Crianças:</label>
                <input type="number" class="form-control" id="criancas" name="criancas" min="0" max="3" required>
            </div>
            <div class="form-group">
                <label for="avaliacao">Avaliação:</label>
                <input type="number" class="form-control" id="avaliacao" name="avaliacao" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto do Quarto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

    </div>
</body>

</html>