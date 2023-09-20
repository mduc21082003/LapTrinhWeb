<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department_id = $_POST['department_id'];
    $new_department_id = $_POST['new_department_id'];
    $department_name = $_POST['department_name'];
    $number_of_employees = $_POST['number_of_employees'];

    editDepartment($department_id, $new_department_id, $department_name, $number_of_employees);

    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $department_id = $_GET['id'];
    $department = getDepartmentDetails($department_id);

    if ($department === null) {
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
    <title>Edit Department</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Department</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="department_id">Department ID:</label>
                <input type="text" class="form-control" name="new_department_id" value="<?php echo $department['department_id']; ?>" required>
            </div>

            <input type="hidden" name="department_id" value="<?php echo $department['department_id']; ?>">

            <div class="form-group">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" name="department_name" value="<?php echo $department['department_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="number_of_employees">Number of Employees:</label>
                <input type="number" class="form-control" name="number_of_employees" value="<?php echo $department['number_of_employees']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
