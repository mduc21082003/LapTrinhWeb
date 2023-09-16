<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        border: 1px solid black;
        width: 180px;
        padding: 20px;
        margin-left: 42%;
    }
  
    input{
        margin-top: 10px;
    }
    button{
        margin-top: 30px; 
    }
</style>
<body>
   <h1 style="text-align:center ;">thêm tác giả</h1>
    <form method="POST" action="">
        <label>Id Author</label>
        <input type="text" name="author_id" id=""><br>
        <label>Name Author</label>
        <input type="text" name="author_name" id=""><br>
        <button name="luu">Lưu</button>

    </form>
    <?php 
    if(isset($_POST['luu']) ){
        $author_id = $_POST['author_id'];
        $author_name = $_POST['author_name'];
      
       
        include_once __DIR__ .'/condb.php';

        $sql = "INSERT INTO authors(author_id,author_name)
                VALUE('$author_id','$author_name');    ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index1.php"; </script> '  ;    

    }
    
    ?>
</body>
</html>