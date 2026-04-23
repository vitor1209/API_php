<?php
header("Content-type: application/json");

$metodo = $_SERVER['REQUEST_METHOD'];

$arquivo = 'usuarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
$usuarios = file_get_contents($arquivo);

switch ($metodo) {
    case 'GET':
        echo $usuarios;
        break;

    case 'POST':

        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])) {
            http_response_code(400);
            echo json_encode(["erro" => "Dados incompletos"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $usuariosList = json_decode($usuarios, true);
        
        $novoUser = [
            "id" => $dados['id'],
            "nome" => $dados['nome'],
            "email" => $dados['email']
        ];

        $usuariosList[] = $novoUser;

        file_put_contents($arquivo, json_encode($usuariosList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo json_encode(["mensagem" => 'Usuario inserido com sucesso', 'usuario' => $usuariosList], JSON_UNESCAPED_UNICODE);
        break;

    default:
        http_response_code(405);

        echo json_encode(["erro" => "Metodo não permitido!"], JSON_UNESCAPED_UNICODE);
        break;
}
