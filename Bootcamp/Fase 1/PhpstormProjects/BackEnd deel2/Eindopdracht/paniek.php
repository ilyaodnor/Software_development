<?php
$antwoord = false;
$error = false;
$huisdier = isset($_POST['huisdier']) ? $_POST['huisdier'] : '';
$belangrijkstePersoon = isset($_POST['belangrijkstePersoon']) ? $_POST['belangrijkstePersoon'] : '';
$land = isset($_POST['land']) ? $_POST['land'] : '';
$verveling = isset($_POST['verveling']) ? $_POST['verveling'] : '';
$speelgoed = isset($_POST['speelgoed']) ? $_POST['speelgoed'] : '';
$docent = isset($_POST['docent']) ? $_POST['docent'] : '';
$kopen = isset($_POST['kopen']) ? $_POST['kopen'] : '';
$bezigheid = isset($_POST['bezigheid']) ? $_POST['bezigheid'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($huisdier) || empty($belangrijkstePersoon) || empty($land) || empty($verveling) || empty($speelgoed) || empty($docent) || empty($kopen) || empty($bezigheid)) {
        $error = true;
        $antwoord = false;
    } else {
        $antwoord = true;
        $error = false;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1 style="color: #dddddd; font-family: 'Comic Sans MS',serif; font-size: 90px;">Mad libs</h1>
<header style="background-color: #611717; width: 708px; height: 50px; border-radius: 5px">
    <a href="onkunde.php" style="color: white; padding: 10px;">Onkunde</a>
    <a href="paniek.php" style="color: white; padding: 10px;">Paniek</a>
</header>

<?php if(!$antwoord): ?>
    <form action="" method="post" class="form" style="margin-top: 10px;">
        <h1>Er heerst paniek...</h1>
        <label>Welk dier zou je nooit als huisdier willen hebben?<input type="text" name="huisdier" value="<?php echo htmlspecialchars($huisdier); ?>"></label>
        <label>Wie is de belangrijkste persoon in je leven?<input type="text" name="belangrijkstePersoon" value="<?php echo htmlspecialchars($belangrijkstePersoon); ?>"></label>
        <label>In welk land zou je graag willen wonen?<input type="text" name="land" value="<?php echo htmlspecialchars($land); ?>"></label>
        <label>Wat doe je als je je verveelt?<input type="text" name="verveling" value="<?php echo htmlspecialchars($verveling); ?>"></label>
        <label>Met welk speelgoed speelde je als kind het meest?<input type="text" name="speelgoed" value="<?php echo htmlspecialchars($speelgoed); ?>"></label>
        <label>Bij welke docent spijbel je het best?<input type="text" name="docent" value="<?php echo htmlspecialchars($docent); ?>"></label>
        <label>Als je € 100.000,- had, wat zou je dan kopen?<input type="text" name="kopen" value="<?php echo htmlspecialchars($kopen); ?>"></label>
        <label>Wat is je favoriete bezigheid?<input type="text" name="bezigheid" value="<?php echo htmlspecialchars($bezigheid); ?>"></label>
        <button type="submit" name="submit" style="background-color: <?= $error ? '#FFB5B5' : 'blue'; ?>">Submit</button>
        <?php if($error): ?>
            <p style="color: red;">Je moet alle vragen beantwoorden!</p>
        <?php endif; ?>
    </form>
<?php endif; ?>

<?php if($antwoord): ?>
    <div class="result" style="margin-top: 10px; padding-left: 20px;">
        <h1>Er heerst paniek...</h1>
        <h2>Er heerst paniek in het koninkrijk <?= htmlspecialchars($land); ?>. Koning <?= htmlspecialchars($docent); ?> is ten einde raad en als koning <?= htmlspecialchars($docent); ?> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?= htmlspecialchars($belangrijkstePersoon); ?>.</h2>
        <h2>"<?= htmlspecialchars($belangrijkstePersoon); ?>, Het is een ramp! Het is een schande!"</h2>
        <h2>"Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"</h2>
        <h2>"Mijn <?= htmlspecialchars($huisdier); ?> is verdwenen! Zo maar, zonder waarschuwing. En ik had net <?= htmlspecialchars($speelgoed); ?> voor hem gekocht!"</h2>
        <h2>"Majesteit, uw <?= htmlspecialchars($huisdier); ?> komt vast vanzelf weer terug?"</h2>
        <h2>"Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <?= htmlspecialchars($bezigheid); ?> leren?"</h2>
        <h2>"Maar Sire, daar kunt u toch uw <?= htmlspecialchars($kopen); ?> voor gebruiken."</h2>
        <h2>"<?= htmlspecialchars($belangrijkstePersoon); ?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had?"</h2>
        <h2>"Mij vervelen, Sire."</h2>
    </div>
<?php endif; ?>

<div style="background-color: #303030; width: 708px; height: 30px; border-radius: 5px; align-items: center; justify-content: center">
    <p style="color: white; margin-left: 33%">Deze website is gemaakt door Ilya.</p>
</div>
</body>
</html>
