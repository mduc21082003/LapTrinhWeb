
<?php
require_once('database.php');

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    deleteEmployee($db, $employee_id);
}

header("Location: index.php");
exit();
?>
