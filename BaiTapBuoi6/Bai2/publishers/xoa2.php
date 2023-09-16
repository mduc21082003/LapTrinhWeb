<?php 
$publisher_id = $_GET['publisher_id'];
include_once __DIR__ .'/condb.php';
$sql = " DELETE FROM publishers Where publisher_id=$publisher_id;   ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index2.php"; </script> '  ;    




?>