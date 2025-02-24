<?php require 'structure/header.php'; ?>
<link rel="stylesheet" href="structure/style.css">
<h1>Welkom</h1>
<form action="checkPost.php" method="post">
    <input type="text" name="name" placeholder="Vul je naam in">
    <input type="email" name="email" placeholder="Vul je email in">
    <input type="submit" value="Verzenden">
</form>
<?php require 'structure/footer.php'; ?>

