<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_id = $_POST['role_id'];
    $new_role_id = $_POST['new_role_id'];
    $role_name = $_POST['role_name'];
    $number_of_employees = $_POST['number_of_employees'];

    editRole($role_id, $new_role_id, $role_name, $number_of_employees);

    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $role_id = $_GET['id'];
    $role = getRoleDetails($role_id);

    if ($role === null) {
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
    <title>Edit Role</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Role</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="role_id">Role ID:</label>
                <input type="text" class="form-control" name="new_role_id" value="<?php echo $role['role_id']; ?>" required>
            </div>

            <input type="hidden" name="role_id" value="<?php echo $role['role_id']; ?>">

            <div class="form-group">
                <label for="role_name">Role Name:</label>
                <input type="text" class="form-control" name="role_name" value="<?php echo $role['role_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="number_of_employees">Number of Employees:</label>
                <input type="number" class="form-control" name="number_of_employees" value="<?php echo $role['number_of_employees']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
