<?php require 'structure/header.php'; ?>
<link rel="stylesheet" href="structure/style.css">
<?php
$name = $_POST['name'];
$email = $_POST['email'];
if (trim($name) == "" || trim($email) == "") {
    echo "Vul alles in!";
    sleep(2);
    require 'welkom.php';
} else {
    echo "Naam: $name <br> Email: $email";
}
?>
<?php require 'structure/footer.php'; ?>
