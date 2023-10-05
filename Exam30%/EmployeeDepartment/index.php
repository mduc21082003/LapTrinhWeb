<?php
require_once('database.php');
$employees = getEmployees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeManagement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center" style="color: darkblue;">Employee Management</h1>
        <table class="table mt-5 mb-5 table-bordered table-hover mx-auto text-center">
            <thead class="table-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Numbers</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?php echo $employee['employee_id']; ?></td>
                        <td><?php echo $employee['full_name']; ?></td>
                        <td><?php echo $employee['date_of_birth']; ?></td>
                        <td><?php echo $employee['gender']; ?></td>
                        <td><?php echo $employee['phone_number']; ?></td>
                        <td><?php echo $employee['department_name']; ?></td>
                        <td><?php echo $employee['role_name']; ?></td>
                        <td>
                            <a class="btn btn-primary" href='edit_employee.php?id=<?php echo $employee['employee_id']; ?>'>Edit</a>
                            <a class="btn btn-danger" href="delete_employee.php?id=<?php echo $employee['employee_id'];  ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-success mb-5 " href="add_employee.php">Add Employee</a>
        </div>
        <div class="text-center">
            <a class="btn btn-link mb-3" href="index.php">Switch to Department Management</a>
        </div>
        <div class="text-center">
            <a class="btn btn-link mb-3" href="add_employee.php">Switch to Role Management</a>
        </div>
    </div>
</body>
</html>
