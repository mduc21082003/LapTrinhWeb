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
        $sql = "SELECT * FROM authors ";
        $result = mysqli_query($conn,$sql);
        $data = [];
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $data []= array(

           
                'author_id' => $row["author_id"],
                'author_name' => $row["author_name"],
                
                
            );
        }
       
      
         ?>
  
  <table style="width:100%;height: 180px; text-align:center">
        <tr>
            <th>Id Author</th>
            <th>Name Author</th>
            
        
            <th><a href="them1.php">thêm</a></th>
        </tr>
       
        <tr>
            <?php foreach($data as $hihi):  ?>
            <td><?=$hihi['author_id']?> </td>
            <td><?= $hihi['author_name']?> </td>
            <td><a href="xoa1?author_id=<?=$hihi['author_id']?>">xóa</a>
            <a href="sua1?author_id=<?=$hihi['author_id']?>">sửa</a></td>
        </tr>
          <?php endforeach; ?>  
    </table>


</body>
</html>