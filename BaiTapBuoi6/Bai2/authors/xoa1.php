<?php 
$author_id = $_GET['author_id'];
include_once __DIR__ .'/condb.php';
$sql = " DELETE FROM authors Where author_id=$author_id;   ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index1.php"; </script> '  ;    




?>