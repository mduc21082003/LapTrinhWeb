<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{ 
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
    }
    
    .title {
        font-size: 50px;
        text-align: center;
        margin: 50px;
        color: red;
    }

    body {
        background-color: bisque;
    }

    .backgroundvalue {
        background-color: yellow;
        text-align: center;
        width: 50%;
        margin-left: 25%;
        border: 1px solid black;
    }
</style>
<body>
    <h1 class="title">Array Function</h1>
    <div class="backgroundvalue">
<?php
    include 'BT4array.php';

    $mang_gia_tri_so = [1, 2, 5, 3, 4, 9, 7, 8];

    $gia_tri_max = timMax($mang_gia_tri_so);
    $gia_tri_min = timMin($mang_gia_tri_so);
    $tong = tongMang($mang_gia_tri_so);
    $gia_tri_tim_kiem = 8;
    $kiem_tra_mang = kiemTraMang($gia_tri_tim_kiem, $mang_gia_tri_so);
    $sap_xep_mang = sapXepMang($mang_gia_tri_so);

    echo var_dump($mang_gia_tri_so) . "<br>";
    echo "Giá trị lớn nhất là: $gia_tri_max<br>";
    echo "Giá trị nhỏ nhất là: $gia_tri_min<br>";
    echo "Tổng giá trị mảng là: $tong<br>";
    echo "$gia_tri_tim_kiem " . ($kiem_tra_mang ? "có" : "không có") . " trong mảng<br>";
    echo "Mảng đã sắp xếp: " . implode(', ', $sap_xep_mang);
?>
</div>
</body>
</html>

