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
   <h1 style="text-align:center ;">Sửa </h1>
   <?php 
   $author_id = $_GET['author_id'];
   include_once __DIR__ .'/condb.php';
    $sql = " SELECT * FROM authors Where author_id = $author_id;   ";
    $result =    mysqli_query($conn,$sql);
    $datadulieucu = [];
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $datadulieucu = array(

       
            'author_id' => $row["author_id"],
            'author_name' => $row["author_name"],
            
            
        );
    }
   
   
   ?>
   
<form method="POST" action="">
        <label>Id Author</label>
        <input type="text" name="author_id" value="<?=$datadulieucu['author_id'] ?>" id=""><br>
        <label>Name Author</label>
        <input type="text" name="author_name"value="<?=$datadulieucu['author_name'] ?>"  id=""><br>
        <button name="luu">Lưu</button>

    </form>
   <?php 
   if(isset($_POST['luu'])){

    $author_id = $_POST['author_id'];
    $author_name= $_POST['author_name'];
    
    include_once __DIR__ .'/condb.php';
    $sql = " UPDATE authors Set author_id = '$author_id',author_name ='$author_name'
                WHERE author_id =$author_id;";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index1.php"; </script> '  ;   


   }
   
   
   
   ?>
</body>
</html>