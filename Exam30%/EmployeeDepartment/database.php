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
        $queryGetDepartmentId = "SELECT department_id FROM employees WHERE employee_id = :employee_id";
        $stmtGetDepartmentId = $db->prepare($queryGetDepartmentId);
        $stmtGetDepartmentId->bindParam(':employee_id', $employee_id);
        $stmtGetDepartmentId->execute();
        $result = $stmtGetDepartmentId->fetch();
        $department_id = $result['department_id'];

        $queryGetRoleId = "SELECT role_id FROM employees WHERE employee_id = :employee_id";
        $stmtGetRoleId = $db->prepare($queryGetRoleId);
        $stmtGetRoleId->bindParam(':employee_id', $employee_id);
        $stmtGetRoleId->execute();
        $result = $stmtGetRoleId->fetch();
        $role_id = $result['role_id'];

        $queryDelete = "DELETE FROM employees WHERE employee_id = :employee_id";
        $stmtDelete = $db->prepare($queryDelete);
        $stmtDelete->bindParam(':employee_id', $employee_id);
        $stmtDelete->execute();

        $updateQuery = "UPDATE departments SET number_of_employees = number_of_employees - 1 WHERE department_id = :department_id";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':department_id', $department_id);
        $updateStmt->execute();

        $updateRoleQuery = "UPDATE roles SET number_of_employees = number_of_employees - 1 WHERE role_id = :role_id";
        $updateRoleStmt = $db->prepare($updateRoleQuery);
        $updateRoleStmt->bindParam(':role_id', $role_id);
        $updateRoleStmt->execute();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editEmployee($employee_id, $new_employee_id, $full_name, $date_of_birth, $gender, $phone_number, $new_department_id, $new_role_id)
{
    global $db;
    try {
        $db->beginTransaction();

        $queryGetOldInfo = "SELECT department_id, role_id FROM employees WHERE employee_id = :employee_id";
        $stmtGetOldInfo = $db->prepare($queryGetOldInfo);
        $stmtGetOldInfo->bindParam(':employee_id', $employee_id);
        $stmtGetOldInfo->execute();
        $oldInfo = $stmtGetOldInfo->fetch();

        $queryUpdateEmployee = "UPDATE employees 
                                SET employee_id = :new_employee_id, full_name = :full_name, date_of_birth = :date_of_birth, 
                                gender = :gender, phone_number = :phone_number, department_id = :new_department_id, role_id = :new_role_id
                                WHERE employee_id = :employee_id";
        $stmtUpdateEmployee = $db->prepare($queryUpdateEmployee);
        $stmtUpdateEmployee->bindParam(':employee_id', $employee_id);
        $stmtUpdateEmployee->bindParam(':new_employee_id', $new_employee_id);
        $stmtUpdateEmployee->bindParam(':full_name', $full_name);
        $stmtUpdateEmployee->bindParam(':date_of_birth', $date_of_birth);
        $stmtUpdateEmployee->bindParam(':gender', $gender);
        $stmtUpdateEmployee->bindParam(':phone_number', $phone_number);
        $stmtUpdateEmployee->bindParam(':new_department_id', $new_department_id);
        $stmtUpdateEmployee->bindParam(':new_role_id', $new_role_id);
        $stmtUpdateEmployee->execute();

        if ($new_department_id != $oldInfo['department_id']) {
            $queryDecrementOldDepartment = "UPDATE departments SET number_of_employees = number_of_employees - 1 WHERE department_id = :old_department_id";
            $stmtDecrementOldDepartment = $db->prepare($queryDecrementOldDepartment);
            $stmtDecrementOldDepartment->bindParam(':old_department_id', $oldInfo['department_id']);
            $stmtDecrementOldDepartment->execute();

            $queryIncrementNewDepartment = "UPDATE departments SET number_of_employees = number_of_employees + 1 WHERE department_id = :new_department_id";
            $stmtIncrementNewDepartment = $db->prepare($queryIncrementNewDepartment);
            $stmtIncrementNewDepartment->bindParam(':new_department_id', $new_department_id);
            $stmtIncrementNewDepartment->execute();
        }

        if ($new_role_id != $oldInfo['role_id']) {
            $queryDecrementOldRole = "UPDATE roles SET number_of_employees = number_of_employees - 1 WHERE role_id = :old_role_id";
            $stmtDecrementOldRole = $db->prepare($queryDecrementOldRole);
            $stmtDecrementOldRole->bindParam(':old_role_id', $oldInfo['role_id']);
            $stmtDecrementOldRole->execute();

            $queryIncrementNewRole = "UPDATE roles SET number_of_employees = number_of_employees + 1 WHERE role_id = :new_role_id";
            $stmtIncrementNewRole = $db->prepare($queryIncrementNewRole);
            $stmtIncrementNewRole->bindParam(':new_role_id', $new_role_id);
            $stmtIncrementNewRole->execute();
        }

        $db->commit();

        return true;
    } catch (PDOException $e) {
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        return false;
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
        $db->beginTransaction();

        $insertQuery = "INSERT INTO employees (full_name, date_of_birth, gender, phone_number, department_id, role_id) 
                  VALUES (:full_name, :date_of_birth, :gender, :phone_number, :department_id, :role_id)";
        $insertStmt = $db->prepare($insertQuery);
        $insertStmt->bindParam(':full_name', $full_name);
        $insertStmt->bindParam(':date_of_birth', $date_of_birth);
        $insertStmt->bindParam(':gender', $gender);
        $insertStmt->bindParam(':phone_number', $phone_number);
        $insertStmt->bindParam(':department_id', $department_id);
        $insertStmt->bindParam(':role_id', $role_id);
        $insertStmt->execute();

        $updateDepartmentQuery = "UPDATE departments SET number_of_employees = number_of_employees WHERE department_id = :department_id";
        $updateDepartmentStmt = $db->prepare($updateDepartmentQuery);
        $updateDepartmentStmt->bindParam(':department_id', $department_id);
        $updateDepartmentStmt->execute();

        $updateRoleQuery = "UPDATE roles SET number_of_employees = number_of_employees + 1 WHERE role_id = :role_id";
        $updateRoleStmt = $db->prepare($updateRoleQuery);
        $updateRoleStmt->bindParam(':role_id', $role_id);
        $updateRoleStmt->execute();

        $db->commit();

        return true;
    } catch (PDOException $e) {
        $db->rollBack();
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
