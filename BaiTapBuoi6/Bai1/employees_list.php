<?php

require './employees.php';
$employees = get_all_employees();
disconnect_db();

?>

<!DOCTYPE html>
<html>

<head>
    <title>List employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <br>
    <h1 style="text-align: center;">List employees</h1><br>
    <table class="table" style="border: 1px solid; width: 50%;margin-left: auto;
    margin-right: auto;">
        <thead class="table-dark">
            <tr style="border: 1px solid;">
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Department</th>
                <th>Role</th>
                <th>Function</th>
            </tr>
        </thead>
        <?php foreach ($employees as $item) { ?>
            <tr>
                <td><?php echo $item['employee_id']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['department_name']; ?></td>
                <td><?php echo $item['role_name']; ?></td>

                <td>
                    <form method="post" action="employees_delete.php">
                        <input onclick="window.location = 'employees_edit.php?employee_id=<?php echo $item['employee_id']; ?>'" type="button" value="Modify" />
                        <input type="hidden" name="employee_id" value="<?php echo $item['employee_id']; ?>" />
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <div style="text-align: center;">
        <a href="employees_add.php">Add employees</a>
    </div>

</body>

</html>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>