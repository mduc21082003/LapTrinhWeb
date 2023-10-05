<?php
require_once('database.php');

if (isset($_GET['id'])) {
    $role_id = $_GET['id'];
    deleteRole($role_id);
}

header("Location: index.php");
exit();
?>
