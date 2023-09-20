<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department_name = $_POST['department_name'];
    $number_of_employees = $_POST['number_of_employees'];

    $result = addDepartment($department_name, $number_of_employees);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Thêm phòng ban không thành công.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddDepartment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Department</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" name="department_name" required>
            </div>

            <div class="form-group">
                <label for="number_of_employees">Number of Employees:</label>
                <input type="number" class="form-control" name="number_of_employees" required>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
