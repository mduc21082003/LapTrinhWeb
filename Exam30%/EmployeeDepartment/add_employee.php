<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $department_id = $_POST['department_id'];
    $role_id = $_POST['role_id'];

    $result = addEmployee($full_name, $date_of_birth, $gender, $phone_number, $department_id, $role_id);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Thêm nhân viên không thành công.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Employee</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Male" required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Female" required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" name="phone_number" required>
            </div>

            <div class="form-group">
                <label for="department_id">Department:</label>
                <select class="form-control" name="department_id" required>
                    <?php
                    $departments = getDepartments();

                    foreach ($departments as $department) {
                        echo "<option value='{$department['department_id']}'>{$department['department_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="role_id">Role:</label>
                <select class="form-control" name="role_id" required>
                    <?php
                    $roles = getRoles();

                    foreach ($roles as $role) {
                        echo "<option value='{$role['role_id']}'>{$role['role_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
