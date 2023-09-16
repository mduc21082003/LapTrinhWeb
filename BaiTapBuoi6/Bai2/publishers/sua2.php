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
   $publisher_id = $_GET['publisher_id'];
   include_once __DIR__ .'/condb.php';
    $sql = " SELECT * FROM publishers Where publisher_id = $publisher_id;   ";
    $result =    mysqli_query($conn,$sql);
    $datadulieucu = [];
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $datadulieucu = array(

       
            'publisher_id' => $row["publisher_id"],
            'publisher_name' => $row["publisher_name"],
            
            
        );
    }
   
   
   ?>
   
<form method="POST" action="">
        <label>Id Publisher</label>
        <input type="text" name="publisher_id" value="<?=$datadulieucu['publisher_id'] ?>" id=""><br>
        <label>Name Publisher</label>
        <input type="text" name="publisher_name"value="<?=$datadulieucu['publisher_name'] ?>"  id=""><br>
        <button name="luu">Lưu</button>

    </form>
   <?php 
   if(isset($_POST['luu'])){

    $publisher_id = $_POST['publisher_id'];
    $publisher_name= $_POST['publisher_name'];
    
    include_once __DIR__ .'/condb.php';
    $sql = " UPDATE publishers Set publisher_id = '$publisher_id',publisher_name ='$publisher_name'
                WHERE publisher_id =$publisher_id;";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index2.php"; </script> '  ;   


   }
   
   
   
   ?>
</body>
</html>