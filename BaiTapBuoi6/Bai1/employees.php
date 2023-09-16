<?php

// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect("localhost", "root", "", "employee_db") or die ("Can't not connect to database");
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}
 

// Lấy danh sách
function get_all_employees() {

    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT e.employee_id, e.last_name, e.first_name, d.department_name, r.role_name
    FROM employees e
    LEFT JOIN departments d ON e.department_id = d.department_id
    LEFT JOIN employeeroles r ON e.role_id = r.role_id";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    // Trả kết quả về
    return $result;

}

// Hàm thêm nhân viên
function add_employee($employee_id, $first_name, $last_name)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $employee_id = addslashes($employee_id);
    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
     
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO employees(employee_id, first_name, last_name) VALUES
            ('$employee_id','$first_name','$last_name')
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

// Hàm xóa nhân viên
function delete_employees($employee_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
            DELETE FROM employees
            WHERE id = $employee_id
    ";
     
    // Thực hiện câu truy vấn
    $query = $conn->query($sql);
     
    return $query;
}

// Hàm sửa nhân viên
function edit_employees($first_name, $last_name, $role_name, $department_name, )
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $first_name       = addslashes($first_name);
    $last_name        = addslashes($last_name);
    $role_name   = addslashes($role_name);
    $department_name   = addslashes($department_name);
     
    // Câu truy sửa
    $sql = "
            UPDATE employees SET
            first_name = '$first_name',
            last_name= '$last_name',

    ";
    $sql = "
            UPDATE departments SET
            department_name = '$department_name',
";
    $sql = "
            UPDATE employeeroles SET
            role_name = '$role_name',
";
    // Thực hiện câu truy vấn
    $query = $conn->query($sql);
     
    return $query;
}


// Hàm lấy nhân viên theo ID
function get_employees($employee_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả nhân viên
    $sql = "select * from employees where id = {$employee_id}";
     
    // Thực hiện câu truy vấn
    $query = $conn->query($sql);
     
    // Mảng chứa kết quả
    $result = array();

    // Nếu có kết quả thì đưa vào biến $result
    if ($query->rowCount() > 0){
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $result = $row;
    }

    // Trả kết quả về
    return $result;

}
