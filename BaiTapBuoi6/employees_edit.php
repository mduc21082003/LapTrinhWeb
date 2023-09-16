<?php

require './employees.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$employee_id = isset($_GET['employee_id']) ? (int)$_GET['employee_id'] : '';
if ($employee_id) {
    $data = get_employees($employee_id);
}

// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data) {
    header("location: students_list.php");
}

// Nếu người dùng submit form
if (!empty($_POST['edit_employees'])) {
    // Lay data
    $data['first_name']        = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $data['last_name']         = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $data['role_name']    = isset($_POST['role_name']) ? $_POST['role_name'] : '';
    $data['department_name']    = isset($_POST['department_name']) ? $_POST['department_name'] : '';
    $data['employee_id']          = isset($_POST['employee_id']) ? $_POST['employee_id'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['first_name'])) {
        $errors['first_name'] = 'Chưa nhập tên nhân vien';
    }
    if (empty($data['last_name'])) {
        $errors['last_name'] = 'Chưa nhập tên nhân vien';
    }

    if (empty($data['role_name'])) {
        $errors['role_name'] = 'Chưa nhập chức vụ';
    }
    if (empty($data['department_name'])) {
        $errors['department_name'] = 'Chưa nhập phòng ban';
    }


    // Neu ko co loi thi insert
    if (!$errors) {
        edit_employees($data['employee_id'], $data['first_name'], $data['last_name'], $data['role_name'], $data['department_name']);
        // Trở về trang danh sách
        header("location: employees_list.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sửa nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Sửa nhân viên </h1>
    <a href="students_list.php">Trở về</a> <br /> <br />
    <form method="post" action="students_edit.php?id=<?php echo $data['id']; ?>">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
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
                    <input type="submit" name="add_employees" value="Lưu" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>