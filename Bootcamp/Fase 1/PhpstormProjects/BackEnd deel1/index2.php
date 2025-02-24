<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$int1 = rand(1, 100);
$int2 = rand(1, 100);
$sum = $int1 + $int2;
$min = $int1 - $int2;
$mult = $int1 * $int2;
$div = round($int1 / $int2, 2);

echo "$int1 + $int2 =  $sum <br>";
echo "$int1 - $int2 =  $min <br>";
echo "$int1 * $int2 =  $mult <br>";
echo "$int1 / $int2 =  $div <br>";

echo "<hr>";
$arr = array(3, 5, 8 & 12);
function tabel($array)
{
    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i] . "<br>";

    }
}
tabel($arr);
?>
</body>
</html>

