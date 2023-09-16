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
   <h1 style="text-align:center ;">thêm </h1>
    <form method="POST" action="">
        <label>Id Publisher</label>
        <input type="text" name="publisher_id" id=""><br>
        <label>Name Publisher</label>
        <input type="text" name="publisher_name" id=""><br>
        <button name="luu">Lưu</button>

    </form>
    <?php 
    if(isset($_POST['luu']) ){
        $publisher_id = $_POST['publisher_id'];
        $publisher_name = $_POST['publisher_name'];
      
       
        include_once __DIR__ .'/condb.php';

        $sql = "INSERT INTO publishers(publisher_id,publisher_name)
                VALUE('$publisher_id','$publisher_name');    ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index2.php"; </script> '  ;    

    }
    
    ?>
</body>
</html>