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
   <h1 style="text-align:center ;">Sửa sách</h1>
   <?php 
   $book_id = $_GET['book_id'];
   include_once __DIR__ .'/condb.php';
    $sql = " SELECT * FROM books Where book_id = $book_id;   ";
    $result =    mysqli_query($conn,$sql);
    $datadulieucu = [];
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $datadulieucu = array(

       
            'book_id' => $row["book_id"],
            'title' => $row["title"],
            'author_id' => $row["author_id"],
            'publisher_id' => $row["publisher_id"],
            'publication_year' => $row["publication_year"],
            
        );
    }
   
   
   ?>
    <form method="POST" action="">
        <label>Id book</label>
        <input type="text" name="book_id" value="<?=$datadulieucu['book_id'] ?>" ><br>
        <label>Title</label>
        <input type="text" name="title" value="<?=$datadulieucu['title'] ?>" ><br>
        <label>Id Author</label>
        <input type="text" name="author_id" value="<?=$datadulieucu['author_id'] ?>" ><br>
        <label>Id publisher</label>
        <input type="text" name="publisher_id"value="<?=$datadulieucu['publisher_id'] ?>" ><br>
        <label>Publication Year</label>
        <input type="text" name="publication_year"value="<?=$datadulieucu['publication_year'] ?>" ><br>
        <button name="luu">Lưu</button>

    </form>
   <?php 
   if(isset($_POST['luu'])){

    $book_id = $_POST['book_id'];
    $title= $_POST['title'];
    $author_id= $_POST['author_id'];
    $publisher_id = $_POST['publisher_id'];
    $publication_year = $_POST['publication_year'];
    include_once __DIR__ .'/condb.php';
    $sql = " UPDATE books Set book_id = '$book_id',title ='$title',author_id='$author_id',publisher_id='$publisher_id',publication_year='$publication_year'
                WHERE book_id =$book_id;";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index.php"; </script> '  ;   


   }
   
   
   
   ?>
</body>
</html>