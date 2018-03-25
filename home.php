<?php
    require_once "authenticate.php";
?>

<script>
    function logout() {
        var ajaxurl = 'ajaxhandler.php',
        data =  {'action': 'logout'};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            console.log("action performed successfully");
        });
        location.href = "index.php";
    }    
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <title>Welcome <?= $_SESSION["SessionInfo"]->User; ?></title>
</head>
<body>
    <?php require "header.php" ?>
    <?php require "footer.php" ?>
</body>
</html>