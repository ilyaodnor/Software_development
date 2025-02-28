<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lab 2 - Includes en require</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require_once 'includes/header.php'; ?>

<div class="container-main">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['button1'])) {
            require '/Users/ilya/Documents/GitHub/Scooljaar2/Software_development/Bootcamp/Fase 1/PhpstormProjects/BackEnd deel3/op4Eindopdracht/pages/onderwerp1.php';
        } else if (isset($_POST['button2'])) {
            require '/Users/ilya/Documents/GitHub/Scooljaar2/Software_development/Bootcamp/Fase 1/PhpstormProjects/BackEnd deel3/op4Eindopdracht/pages/onderwerp2.php';
        } else if (isset($_POST['button3'])) {
            require '/Users/ilya/Documents/GitHub/Scooljaar2/Software_development/Bootcamp/Fase 1/PhpstormProjects/BackEnd deel3/op4Eindopdracht/pages/onderwerp3.php';
        }
    } else {
        require '/Users/ilya/Documents/GitHub/Scooljaar2/Software_development/Bootcamp/Fase 1/PhpstormProjects/BackEnd deel3/op4Eindopdracht/pages/onderwerp1.php';
    }
    ?>
</div>
<?php require_once 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>