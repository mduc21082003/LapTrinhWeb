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
