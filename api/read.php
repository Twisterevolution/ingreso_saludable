<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once './database.php';
    include_once './employees.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Employee($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
   

    $item->getSingleEmployee();
    
    if($item->nombre != null){
        // create array
        $emp_arr = array(
            "id" => $item->id,
            "nombre" => $item->nombre,
            "apellidos" => $item->apellidos,
            "correo" => $item->correo,
            "nom_usuario" => $item->nom_usuario,
            "pass" => $item->pass,
            "rol" => $item->rol,
            "estado" => $item->estado,
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
    else{
        http_response_code(404);
        echo json_encode("usuario no");
    }
?>