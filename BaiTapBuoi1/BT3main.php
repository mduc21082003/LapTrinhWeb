<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require 'calculator.php';

$a = 20;
$b = 3;

echo "$a + $b = " . tinhTong($a, $b) . "<br>";
echo "$a - $b = " . tinhHieu($a, $b) . "<br>";
echo "$a * $b = " . tinhTich($a, $b) . "<br>";

if ($b != 0) {
    echo "$a / $b = " . tinhThuong($a, $b) . "<br>";
} else {
    echo "Không thể chia cho 0<br>";
}

if (laSoNguyenTo($a)) {
    echo "$a là số nguyên tố<br>";
} else {
    echo "$a không là số nguyên tố<br>";
}
if (laSoNguyenTo($b)) {
    echo "$b là số nguyên tố<br>";
} else {
    echo "$b không là số nguyên tố<br>";
}

if (laSoChan($a)) {
    echo "$a là số chẵn<br>";
} else {
    echo "$a không là số chẵn<br>";
}
if (laSoChan($b)) {
    echo "$b là số chẵn<br>";
} else {
    echo "$b không là số chẵn<br>";
}
?>
</body>
</html>
