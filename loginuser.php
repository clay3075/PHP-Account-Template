<?php
    session_start();
    require_once "dbusers.php";
    $db = new DBUsers();
    $userName = $_POST["userName"];

    if ($db->login($userName, $_POST["password"])) {
        header("Location: home.php");
    } else {
        header("Location: index.php");
    }
?>