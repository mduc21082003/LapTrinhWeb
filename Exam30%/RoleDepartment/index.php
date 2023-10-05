<?php
require_once('database.php');
$roles = getRoles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoleManagement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center" style="color: darkblue;">Role Management</h1>
        <table class="table mt-5 mb-5 table-bordered table-hover mx-auto text-center">
            <thead class="table-dark">
                <tr>
                    <th>Role ID</th>
                    <th>Role Name</th>
                    <th>Number of Employees</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?php echo $role['role_id']; ?></td>
                        <td><?php echo $role['role_name']; ?></td>
                        <td><?php echo $role['number_of_employees']; ?></td>
                        <td>
                            <a class="btn btn-primary" href='edit_role.php?id=<?php echo $role['role_id']; ?>'>Edit</a>
                            <a class="btn btn-danger" href='delete_role.php?id=<?php echo $role['role_id']; ?>' onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-success mb-5" href="add_role.php">Add Role</a>
        </div>
        <div class="text-center">
            <a class="btn btn-link mb-3" href="add_employee.php">Switch to Employee Management</a>
        </div>
        <div class="text-center">
            <a class="btn btn-link mb-3" href="add_employee.php">Switch to Department Management</a>
        </div>
    </div>
</body>
</html>

