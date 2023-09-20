<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $new_employee_id = $_POST['new_employee_id'];
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $department_id = $_POST['department_id'];
    $role_id = $_POST['role_id'];

    editEmployee($employee_id, $new_employee_id, $full_name, $date_of_birth, $gender, $phone_number, $department_id, $role_id);

    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $employee = getEmployeeDetails($employee_id);

    if ($employee === null) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Employee</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" class="form-control" name="new_employee_id" value="<?php echo $employee['employee_id']; ?>" required>
            </div>

            <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">

            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" value="<?php echo $employee['full_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" value="<?php echo $employee['date_of_birth']; ?>" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Male" <?php echo ($employee['gender'] == 'Male') ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Female" <?php echo ($employee['gender'] == 'Female') ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $employee['phone_number']; ?>" required>
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

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>