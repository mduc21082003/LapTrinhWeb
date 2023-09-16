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
        $sql = "SELECT * FROM publishers ";
        $result = mysqli_query($conn,$sql);
        $data = [];
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $data []= array(

           
                'publisher_id' => $row["publisher_id"],
                'publisher_name' => $row["publisher_name"],
                
                
            );
        }
       
      
         ?>
  
  <table style="width:100%;height: 180px; text-align:center">
        <tr>
            <th>Id Publisher</th>
            <th>Name Publisher</th>
            
        
            <th><a href="them2.php">thêm</a></th>
        </tr>
       
        <tr>
            <?php foreach($data as $hihi):  ?>
            <td><?=$hihi['publisher_id']?> </td>
            <td><?= $hihi['publisher_name']?> </td>
            <td><a href="xoa2?publisher_id=<?=$hihi['publisher_id']?>">xóa</a>
            <a href="sua2?publisher_id=<?=$hihi['publisher_id']?>">sửa</a></td>
        </tr>
          <?php endforeach; ?>  
    </table>


</body>
</html>