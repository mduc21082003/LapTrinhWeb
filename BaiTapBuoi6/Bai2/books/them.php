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
   <h1 style="text-align:center ;">thêm sách</h1>
    <form method="POST" action="">
        <label>Id book</label>
        <input type="text" name="book_id" id=""><br>
        <label>Title</label>
        <input type="text" name="title" id=""><br>
        <label>Id Author</label>
        <input type="text" name="author_id" id=""><br>
        <label>Id publisher</label>
        <input type="text" name="publisher_id" id=""><br>
        <label>Publication Year</label>
        <input type="text" name="publication_year" id=""><br>
        <button name="luu">Lưu</button>

    </form>
    <?php 
    if(isset($_POST['luu']) ){
        $book_id = $_POST['book_id'];
        $title = $_POST['title'];
        $author_id = $_POST['author_id'];
        $publisher_id = $_POST['publisher_id'];
        $publication_year = $_POST['publication_year'];
       
        include_once __DIR__ .'/condb.php';

        $sql = "INSERT INTO books(book_id,title,author_id,publisher_id,publication_year)
                VALUE('$book_id','$title','$author_id','$publisher_id','$publication_year');    ";
         mysqli_query($conn,$sql);
         echo '<script>location.href="index.php"; </script> '  ;    

    }
    
    ?>
</body>
</html>