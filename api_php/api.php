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
        $novoUser = [
            "id" => $dados['id'],
            "nome" => $dados['nome'],
            "emai" => $dados['emai']
        ];

        // array_push($usuarios, $novoUser);
        echo json_encode('Usuario inserito com sucesdso!');
        echo json_encode($usuarios);
        break;

    case 'PUT':
        echo "Metodo PUT";
        break;

    case 'DELETE':
        echo "Metodo DELETE";
        break;

    default:
        echo "tipo um 404";
        break;
}
