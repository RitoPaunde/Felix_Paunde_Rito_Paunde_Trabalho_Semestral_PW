<?php
// Verifique se a solicitação foi feita através do método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os valores dos campos do formulário
    $titulo_pagina = $_POST['titulo_pagina'];
    $sobre_pagina = $_POST['sobre_pagina'];

    // Verifique se os campos não estão vazios
    if (empty($titulo_pagina) || empty($sobre_pagina)) {
        // Envie uma resposta de erro em formato JSON
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos!']);
        exit;
    }

    // Conecte-se ao banco de dados (substitua as informações de conexão pelos seus próprios valores)
    $db_host = 'localhost';
    $db_name = 'seu_banco_de_dados';
    $db_user = 'seu_usuario';
    $db_pass = 'sua_senha';
    $db = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8mb4", $db_user, $db_pass);

    // Prepare e execute uma consulta SQL para atualizar os dados do registro
    $stmt = $db->prepare("UPDATE sua_tabela SET titulo_pagina = :titulo_pagina, sobre_pagina = :sobre_pagina WHERE id = 1");
    $stmt->bindValue(':titulo_pagina', $titulo_pagina);
    $stmt->bindValue(':sobre_pagina', $sobre_pagina);
    $stmt->execute();

    // Envie uma resposta de sucesso em formato JSON
    echo json_encode(['status' => 'success']);
} else {
    // Envie uma resposta de erro em formato JSON
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido!']);
}