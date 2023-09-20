<?php
$host = 'localhost';
$dbname = 'management';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
function getDepartments()
{
    global $db;
    try {
        $query = "SELECT department_id, department_name, number_of_employees FROM departments";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

function deleteDepartment($department_id)
{
    global $db;
    try {
        $query = "DELETE FROM departments WHERE department_id = :department_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editDepartment($department_id, $new_department_id, $department_name, $number_of_employees)
{
    global $db;

    try {
        $query = "UPDATE departments 
                  SET department_id = :new_department_id, department_name = :department_name, number_of_employees = :number_of_employees
                  WHERE department_id = :department_id";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':new_department_id', $new_department_id);
        $stmt->bindParam(':department_name', $department_name);
        $stmt->bindParam(':number_of_employees', $number_of_employees);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getDepartmentDetails($department_id)
{
    global $db;

    try {
        $query = "SELECT * FROM departments WHERE department_id = :department_id";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function addDepartment($department_name, $number_of_employees)
{
    global $db;

    try {
        $query = "INSERT INTO departments (department_name, number_of_employees) 
                  VALUES (:department_name, :number_of_employees)";
                  
        $stmt = $db->prepare($query);
        $stmt->bindParam(':department_name', $department_name);
        $stmt->bindParam(':number_of_employees', $number_of_employees);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}



?>