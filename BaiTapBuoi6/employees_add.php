<?php

require './employees.php';

// Nếu người dùng submit form
if (!empty($_POST['add_employees'])) {

    $data['first_name']         = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $data['last_name']    = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $data['department_name']    = isset($_POST['department_name']) ? $_POST['department_name'] : '';
    $data['role_name']    = isset($_POST['role_name']) ? $_POST['role_name'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['first_name'])) {
        $errors['first_name'] = 'Chưa nhập tên nhân viên';
    }
    if (empty($data['last_name'])) {
        $errors['last_name'] = 'Chưa nhập tên nhân viên';
    }
    if (empty($data['department_name'])) {
        $errors['department_name'] = 'Chưa nhập tên phòng ban';
    }
    if (empty($data['role_name'])) {
        $errors['role_name'] = 'Chưa nhập tên chức vụ';
    }

    // Neu ko co loi thi insert
    if (!$errors) {
        add_employee($data['first_name'], $data['last_name'], $data['department_name'], $data['role_name']);
        // Trở về trang danh sách
        header("location: employees_list.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add employees</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <br>
    <h1 style="text-align: center;">Add employees</h1>
    <br>
    <form method="post" action="employees_add.php">
        <table class="table table-bordered border-black" style="width: 50%;margin-left: auto;
    margin-right: auto;">
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="name" value="<?php echo !empty($data['first_name']) ? $data['first_name'] : ''; ?>" />
                    <?php if (!empty($errors['first_name'])) echo $errors['first_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="name" value="<?php echo !empty($data['last_name']) ? $data['last_name'] : ''; ?>" />
                    <?php if (!empty($errors['last_name'])) echo $errors['last_name']; ?>
                </td>
            </tr>
            <tr>
            <tr>
                <td>Role</td>
                <td>
                    <div class='form-group'>
                        <label for='role_id'>Role:</label>
                        <select id='role_id' name='role_id'>
                            <option selected disabled value=""></option>
                            <option value='1'>Manager</option>
                            <option value='2'>Employee</option>
                            <option value='3'>Intern</option>
                            <option value='4'>Analyst</option>
                            <option value='5'>Director</option>
                        </select>
                    </div>

                    <?php if (!empty($errors['role_name'])) echo $errors['role_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <div class='form-group'>
                        <label for='department_id'>Department:</label>
                        <select id='department_id' name='department_id'>
                            <option selected disabled value=""></option>
                            <option value='1'>HR</option>
                            <option value='2'>Marketing</option>
                            <option value='3'>IT</option>
                            <option value='4'>Finance</option>
                            <option value='5'>Operations</option>
                        </select>
                    </div>

                    <?php if (!empty($errors['department_name'])) echo $errors['department_name']; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add_employee" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    <div style="text-align: center;">
        <a href="employees_list.php">Return list employees</a>
    </div>
</body>

</html>