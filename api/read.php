<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    include_once "../../config/Database.php";
    include_once "../../models/User.php";

    $database = new Database();
    $db = $database->connect();

    $user = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $user->username = $data->username;
    $user->password = $data->password;

    if($user->read()) {
        echo json_encode(
            array("message" => "Log in successful");
        )
    }
    else {
        echo json_encode(
            array("message" => "Log in failed");
        )
    }