<?php require './employees.php';
 
// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_employees($id);
}
 
// Trở về trang danh sách
header("location: employees_list.php");
