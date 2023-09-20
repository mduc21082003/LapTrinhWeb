<?php
require_once('database.php');
$departments = getDepartments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepartmentManagement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Department Management</h1>
        <table class="table mt-5 mb-5 table-bordered table-hover mx-auto text-center">
            <thead class="table-dark">
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Number of Employees</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department): ?>
                    <tr>
                        <td><?php echo $department['department_id']; ?></td>
                        <td><?php echo $department['department_name']; ?></td>
                        <td><?php echo $department['number_of_employees']; ?></td>
                        <td>
                            <a class="btn btn-primary" href='edit_department.php?id=<?php echo $department['department_id']; ?>'>Edit</a>
                            <a class="btn btn-danger" href='delete_department.php?id=<?php echo $department['department_id']; ?>'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-primary mb-3" href="add_department.php">Add Department</a>
        </div>
    </div>
</body>
</html>

