<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogani Shop</title>
</head>
<body>
    <?php
    session_start();
    ob_start();
    ?>
    <?php
    include_once "model/database.php";
    include_once "view/element/header.php";
    include_once "controller/controller.php";
    include_once "view/element/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<li>xinchao</li>
</html>