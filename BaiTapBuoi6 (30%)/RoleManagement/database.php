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
function getRoles()
{
    global $db;
    try {
        $query = "SELECT role_id, role_name, number_of_employees FROM roles";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

function deleteRole($role_id)
{
    global $db;
    try {
        $query = "DELETE FROM roles WHERE role_id = :role_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function editRole($role_id, $new_role_id, $role_name, $number_of_employees)
{
    global $db;
    try {
        $query = "UPDATE roles 
                  SET role_id = :new_role_id, role_name = :role_name, number_of_employees = :number_of_employees
                  WHERE role_id = :role_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':new_role_id', $new_role_id);
        $stmt->bindParam(':role_name', $role_name);
        $stmt->bindParam(':number_of_employees', $number_of_employees);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getRoleDetails($role_id)
{
    global $db;
    try {
        $query = "SELECT * FROM roles WHERE role_id = :role_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function addRole($role_name, $number_of_employees)
{
    global $db;
    try {
        $query = "INSERT INTO roles (role_name, number_of_employees) 
                  VALUES (:role_name, :number_of_employees)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':role_name', $role_name);
        $stmt->bindParam(':number_of_employees', $number_of_employees);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>