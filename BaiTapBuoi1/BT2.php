<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
        width: 400px;
        border: 1px solid black;
        border-collapse: collapse;
    }   
    .stt {
        width: 20%;
    }
    .ts, .nds {
        width: 40%;
    }
    td.sttn {
        text-align: center;
    }
</style>
<body>
    <table>
        <tr>
            <th class = "stt">STT</th>
            <th class= "ts">Tên sách</th>
            <th class= "nds">Nội dung sách</th>
        </tr>
        <?php
            for($i = 1; $i <=100; $i++){
                $tenSach = "Tensach" . $i;
                $noiDungSach = "Noidung" . $i;
                echo "<tr>";
                echo "<td class = 'sttn'>$i</td>";
                echo "<td>$tenSach</td>";
                echo "<td>$noiDungSach</td>";
                echo "</tr>";
            } 
        ?>
    </table>
</body>
</html>