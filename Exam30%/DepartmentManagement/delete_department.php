<?php
require_once('database.php');

if (isset($_GET['id'])) {
    $department_id = $_GET['id'];
    deleteDepartment($department_id);
}

header("Location: index.php");
exit();
?>
