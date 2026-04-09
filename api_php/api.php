<?php
    header("Content-type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    // echo $metodo

    switch ($metodo) {
        case 'GET':
            echo "Metodo GET";
            break;

        case 'POST':
            echo "Metodo POST"; 
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

    // $usuarios = [
    //     ["id" => 1,"nome" => "lopes", "emai" => "lopes@teste.com"],
    //     ["id" => 2,"nome" => "fulano", "emai" => "fulano@teste.com"]
    // ];

    // $json = json_encode($usuarios);

    // echo $json;
?>