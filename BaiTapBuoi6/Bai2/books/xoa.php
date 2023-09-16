<?php 
$book_id = $_GET['book_id'];
include_once __DIR__ .'/condb.php';
$sql = " DELETE FROM books Where book_id=$book_id;   ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index.php"; </script> '  ;    




?>