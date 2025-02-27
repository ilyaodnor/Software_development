<?php
$correct = false;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$errors = [];

if (empty($name)) {
    $errors['name'] = 'Naam is verplicht';
}
if (empty($email)) {
    $errors['email'] = 'Email is verplicht';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Ongeldig emailadres';
} else {
    $correct = true;
}

if (!empty($errors)) {
    header("Location: welkom.php?errors=" . urlencode(json_encode($errors)) . "&name=" . urlencode($name) . "&email=" . urlencode($email));
    exit;
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
</head>
<body>



<?php
$errors = isset($_GET['errors']) ? json_decode($_GET['errors'], true) : [];
?>

<?php if (!$correct): ?>
    <form action="" method="post">
        <label>
            <input type="text" name="name" placeholder="Vul je naam in" value="<?php echo htmlspecialchars(isset($_GET['name']) ? $_GET['name'] : ''); ?>">
            <?php if (isset($errors['name'])): ?>
                <span class="error">* <?php echo $errors['name']; ?></span>
            <?php endif; ?>
        </label>

        <label>
            <input type="email" name="email" placeholder="Vul je email in" value="<?php echo htmlspecialchars(isset($_GET['email']) ? $_GET['email'] : ''); ?>">
            <?php if (isset($errors['email'])): ?>
                <span class="error">* <?php echo $errors['email']; ?></span>
            <?php endif; ?>
        </label>

        <input type="submit" value="Verzenden">
    </form>
<?php else: ?>
<?php endif; ?>

<?php require 'structure/footer.php'; ?>

</body>
</html>
<link rel="stylesheet" href="structure/style.css">
<h1>Welkom</h1>