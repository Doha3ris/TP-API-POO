<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../model/Employee.php';
include_once '../services/DatabaseConnector.php';

$items = new Employee($database);
$statement = $items->getEmployees();
$itemCount = $statement->rowCount();

echo json_encode($itemCount);

if ($itemCount > 0) {
    $employeeArr = array();
    $employeeArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $e = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "age" => $age,
            "designation" => $designation,
            "hiring_date" => $hiring_date
        );

        $employeeArr["body"][] = $e;
    }

    echo json_encode($employeeArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}