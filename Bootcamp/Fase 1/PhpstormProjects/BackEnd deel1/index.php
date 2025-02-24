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
echo'<h1>Hello world</h1>';
echo '<h2>Today is ' . date('l, F j, Y') . '</h2>';

define('HALLO', '<h1>Hello world</h1>');
echo HALLO;

$hallo = 'Learning PHP';
$hallo = '<h1>Hallo world </h1>';
echo $hallo;

$word1 = 'Hello';
$word2 = 'world';
echo "<h1>$word1 $word2</h1>";

$halloworld = array('Hello', 'world');
echo "<h1>$halloworld[0] $halloworld[1]</h1>";
?>
</body>
</html>