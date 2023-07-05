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
$data = json_decode(file_get_contents("php://input"));

$item->name = $data->name;
$item->email = $data->email;
$item->age = $data->age;
$item->designation = $data->designation;
$item->hiringDate = $data->hiringDate;

if($item->createEmployee()){
    echo 'Employee created successfully.';
} else{
    echo 'Employee could not be created.';
}
?>