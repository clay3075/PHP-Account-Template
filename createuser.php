<?php
    require "dbusers.php";
    session_start();
    $userName = $_POST["userName"];
    if ($_POST["password"] == $_POST["password2"] && trim($_POST["password"]) != "" && trim($userName) != ""){
        $password = $_POST["password"];
    } else{
        header("Location: newuser.php");
    }

    //create new user in database and redirect to index
    try{
        $db = new DBUsers();
        $db->create_user($userName, $password);
    } catch (PDOException $e){
        echo "Error creating account for $userName<br>";
    }

    header("Location: index.php");
?>