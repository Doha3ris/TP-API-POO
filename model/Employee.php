<?php

class Employee
{

    private $databaseConnection;
    const DATABASE_TABLE = "employee";

    public $id;
    public $name;
    public $email;
    public $age;
    public $designation;
    public $hiringDate;


    public function __construct($database)
    {
        $this->databaseConnection = $database;
    }

    // Get all employees
    public function getEmployees()
    {
        $sqlQuery = "SELECT id, name, email, age, designation, hiring_date FROM " . self::DATABASE_TABLE . "";
        $statement = $this->databaseConnection->prepare($sqlQuery);
        $statement->execute();

        return $statement;
    }

    // Create employee
    public function createEmployee()
    {
        $sqlQuery = "INSERT INTO "
            . self::DATABASE_TABLE
            . "(name, email, age, designation, hiring_date) 
            VALUES (:name, :email, :age, :designation, :hiringDate)";

        $statement = $this->databaseConnection->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->hiringDate = htmlspecialchars(strip_tags($this->hiringDate));

        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":age", $this->age);
        $statement->bindParam(":designation", $this->designation);
        $statement->bindParam(":hiringDate", $this->hiringDate);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    // Get single employee by id
    public function getSingleEmployee()
    {
        $sqlQuery = "SELECT
                        id, 
                        name, 
                        email, 
                        age, 
                        designation, 
                        hiring_date
                      FROM
                        " . self::DATABASE_TABLE . "
                    WHERE 
                       id = ?
                    LIMIT 1";

        $statement = $this->databaseConnection->prepare($sqlQuery);
        $statement->bindParam(1, $this->id);
        $statement->execute();

        $dataRow = $statement->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->age = $dataRow['age'];
        $this->designation = $dataRow['designation'];
        $this->hiringDate = $dataRow['hiring_date'];
    }

    // Update employee selected by id
    public function updateEmployee()
    {
        $sqlQuery = 'UPDATE ' . self::DATABASE_TABLE
            . ' SET name = :name, '
            . 'email = :email, '
            . 'age = :age, '
            . 'designation = :designation, '
            . 'hiring_date = :hiringDate '
            . 'WHERE id = :id';

        $statement = $this->databaseConnection->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->hiringDate = htmlspecialchars(strip_tags($this->hiringDate));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(":id", $this->id);
        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":age", $this->age);
        $statement->bindParam(":designation", $this->designation);
        $statement->bindParam(":hiringDate", $this->hiringDate);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    // Delete employee selected by id
    function deleteEmployee()
    {
        $sqlQuery = "DELETE FROM " . self::DATABASE_TABLE . " WHERE id = ?";
        $statement = $this->databaseConnection->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(1, $this->id);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }
}

?>