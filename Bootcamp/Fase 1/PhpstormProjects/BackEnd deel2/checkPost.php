<?php require 'structure/header.php'; ?>
<link rel="stylesheet" href="structure/style.css">

<?php
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "(geen naam)";
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : "(geen emailadres)";

echo "Naam: $name <br> Email: $email";
?>

<?php require 'structure/footer.php'; ?>
