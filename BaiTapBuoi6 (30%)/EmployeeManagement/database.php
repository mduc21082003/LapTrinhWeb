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

function getEmployees()
{
    global $db;
    try {
        $query = "SELECT e.employee_id, e.full_name, e.date_of_birth, e.gender, e.phone_number, d.department_name, r.role_name
              FROM employees e
              JOIN departments d ON e.department_id = d.department_id
              JOIN roles r ON e.role_id = r.role_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteEmployee($db, $employee_id)
{
    global $db;
    try {
        $query = "DELETE FROM employees WHERE employee_id = :employee_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editEmployee($employee_id, $new_employee_id, $full_name, $date_of_birth, $gender, $phone_number, $department_id, $role_id)
{
    global $db;
    try {
        $query = "UPDATE employees 
                  SET employee_id = :new_employee_id, full_name = :full_name, date_of_birth = :date_of_birth, 
                  gender = :gender, phone_number = :phone_number, department_id = :department_id, role_id = :role_id
                  WHERE employee_id = :employee_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':new_employee_id', $new_employee_id);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getEmployeeDetails($employee_id)
{
    global $db;
    try {
        $query = "SELECT * FROM employees WHERE employee_id = :employee_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function addEmployee($full_name, $date_of_birth, $gender, $phone_number, $department_id, $role_id)
{
    global $db;
    try {
        $query = "INSERT INTO employees (full_name, date_of_birth, gender, phone_number, department_id, role_id) 
                  VALUES (:full_name, :date_of_birth, :gender, :phone_number, :department_id, :role_id)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getDepartments()
{
    global $db;
    try {
        $query = "SELECT department_id, department_name FROM departments";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}


function getRoles()
{
    global $db;
    try {
        $query = "SELECT role_id, role_name FROM roles";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

?>
