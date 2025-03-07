<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    
    // $host = "sql203.infinityfree.com";
    // $userName = "if0_38456844";
    // $password = "valaGautam#123";
    // $dataBase = "store_data";
    // $connect =  mysqli_connect($host, $userName, $password, $dataBase);
    
    
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        echo json_encode(["message" => "hello get method"]);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data && isset($data['fname'], $data['lname'], $data['email'], $data['query'], $data['message'])) {
            // $insert = "INSERT INTO contact_form_data(first_name, last_name, email, query_type, message) VALUES('$data[fname]','$data[lname]','$data[email]','$data[query]','$data[message]')";
            // mysqli_query($connect , $insert);
            http_response_code(201);
            echo json_encode(["message" => "Data inserted successfully"]);
        } else {
            http_response_code(403);
            echo json_encode(["error" => "Invalid input data"]);
        }
    } else {
        echo json_encode(["message" => "Invalid request method"]);
    }

    
    
?>

