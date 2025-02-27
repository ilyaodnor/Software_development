<?php
$antwoord = false;
$error = false;
$activity = isset($_POST['activity']) ? $_POST['activity'] : '';
$persoon = isset($_POST['persoon']) ? $_POST['persoon'] : '';
$getal = isset($_POST['getal']) ? $_POST['getal'] : '';
$vakantie = isset($_POST['vakantie']) ? $_POST['vakantie'] : '';
$eigenschap = isset($_POST['eigenschap']) ? $_POST['eigenschap'] : '';
$slechtEigenschap = isset($_POST['slechtEigenschap']) ? $_POST['slechtEigenschap'] : '';  // fixed variable name here
$ergs = isset($_POST['ergs']) ? $_POST['ergs'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($activity) || empty($persoon) || empty($getal) || empty($vakantie) || empty($eigenschap) || empty($slechtEigenschap) || empty($ergs)) {
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
        <h1>Onkunde...</h1>
        <label>Wat zou je graag willen doen?<input type="text" name="activity" value="<?php echo htmlspecialchars($activity); ?>"></label>
        <label>Met welke persoon kun je goed opschieten?<input type="text" name="persoon" value="<?php echo htmlspecialchars($persoon); ?>"></label>
        <label>Wat is jouw favorite getal?<input type="text" name="getal" value="<?php echo htmlspecialchars($getal); ?>"></label>
        <label>Wat heb je altijd bij je als je op vakantie gaat?<input type="text" name="vakantie" value="<?php echo htmlspecialchars($vakantie); ?>"></label>
        <label>Wat is je beste persoonlijke eigenschap?<input type="text" name="eigenschap" value="<?php echo htmlspecialchars($eigenschap); ?>"></label>
        <label>Wat is je slechtste persoonlijke eigenschap?<input type="text" name="slechtEigenschap" value="<?php echo htmlspecialchars($slechtEigenschap); ?>"></label> <!-- fixed name here -->
        <label>Wat is het ergste dat je kan overkomen?<input type="text" name="ergs" value="<?php echo htmlspecialchars($ergs); ?>"></label>
        <button type="submit" name="submit" style="background-color: <?= $error ? '#FFB5B5' : 'blue'; ?>">Submit</button>
        <?php if($error): ?>
            <p style="color: red;">Je moet alle vragen beantwoorden!</p>
        <?php endif; ?>
    </form>
<?php endif; ?>
<?php if($antwoord): ?>
    <div class="result">
        <h1>Er heerst paniek...</h1>
        <h2 style="font-size: 30px">Er zijn veel mensen die niet kunnen <?= htmlspecialchars($activity) ?>. Neem nou <?= htmlspecialchars($persoon) ?>. Zelfs met de hulp van een <?= htmlspecialchars($vakantie) ?> of zelfs <?= htmlspecialchars($getal) ?> kan <?= htmlspecialchars($persoon) ?> niet <?= htmlspecialchars($activity) ?>. Dat heeft niet te maken met een gebrek aan <?= htmlspecialchars($eigenschap) ?>, maar met een te veel aan <?= htmlspecialchars($slechtEigenschap) ?>. Te veel <?= htmlspecialchars($slechtEigenschap) ?>
            leidt tot <?= htmlspecialchars($ergs) ?> en dat is niet goed als je wilt <?= htmlspecialchars($activity) ?>. Helaas voor <?= htmlspecialchars($persoon) ?>.</h2>
    </div>
<?php endif; ?>
<div style="background-color: #303030; width: 708px; height: 30px; border-radius: 5px; align-items: center; justify-content: center">
    <p style="color: white; margin-left: 33%">Deze website is gemaakt door Ilya.</p>
</div>
</body>
</html>
