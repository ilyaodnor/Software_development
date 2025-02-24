<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="image-container">
    <?php
    getGreeting();
    ?>
</div>

<?php
function getGreeting()
{
    $time = date('H');
    $fulltime = date('H:i');
    if (0 <= $time && $time < 7) {
        echo "<h1>Goede nacht! </h1>";
        echo "<h2>Het is nu $fulltime</h2>";
        echo "<img src='images/night.png' alt='Ночь' >";
    } else if (7 <= $time && $time < 12) {
        echo "<h1>Goede morgen! </h1>";
        echo "<h2>Het is nu $fulltime</h2>";
        echo "<img src='images/morning.png' alt='Утро' >";
    } else if (12 <= $time && $time < 18) {
        echo "<h1>Goede dag! </h1>";
        echo "<h2>Het is nu $fulltime</h2>";
        echo "<img src='images/afternoon.png' alt='День' >";
    } else if (18 <= $time && $time <= 23) {
        echo "<h1>Goede avond! </h1>";
        echo "<h2>Het is nu $fulltime</h2>";
        echo "<img src='images/evening.png' alt='Вечер' >";
    }

}

?>

<body>
</html>

