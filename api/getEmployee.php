<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../model/Employee.php';
include_once '../services/DatabaseConnector.php';

$item = new Employee($database);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleEmployee();

if ($item->name != null) {

    $newEmployee = array(
        "id" => $item->id,
        "name" => $item->name,
        "email" => $item->email,
        "age" => $item->age,
        "designation" => $item->designation,
        "hiring_date" => $item->hiringDate
    );

    http_response_code(200);
    echo json_encode($newEmployee);
} else {
    http_response_code(404);
    echo json_encode("Something went wrong, employee hasn't been created.");
}
?>