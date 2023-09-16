<?php 
 
include_once __DIR__ .'/condb.php';
  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     table, th, td {
        border:1px solid black;
    }
</style>
<body>
    
        <?php 
        $sql = "SELECT * FROM books ";
        $result = mysqli_query($conn,$sql);
        $data = [];
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $data []= array(

           
                'book_id' => $row["book_id"],
                'title' => $row["title"],
                'author_id' => $row["author_id"],
                'publisher_id' => $row["publisher_id"],
                'publication_year' => $row["publication_year"],
                
            );
        }
       
      
         ?>
  
  <table style="width:100%;height: 180px; text-align:center">
        <tr>
            <th>Id Book</th>
            <th>Title</th>
            <th>Id Author</th>
            <th>Id publisher</th>
            <th>Publication Year</th>
        
            <th><a href="them.php">thêm</a></th>
        </tr>
       
        <tr>
            <?php foreach($data as $hihi):  ?>
            <td><?=$hihi['book_id']?> </td>
            <td><?= $hihi['title']?> </td>
            <td><?= $hihi['author_id']?> </td>
            <td><?= $hihi['publisher_id']?> </td>
            <td><?= $hihi['publication_year']?></td>
            <td><a href="xoa?book_id=<?=$hihi['book_id']?>">xóa</a>
            <a href="sua?book_id=<?=$hihi['book_id']?>">sửa</a></td>
        </tr>
          <?php endforeach; ?>  
    </table>


</body>
</html>