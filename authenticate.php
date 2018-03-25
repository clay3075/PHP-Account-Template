<?php
    require_once "session.php";
    session_start();
    
    $authenticated = False;
    if (isset($_SESSION["SessionInfo"])) {
        if ($_SESSION["SessionInfo"]->is_valid()) {
            $authenticated = True;
        }
    } 
    if (!$authenticated) {
        header("Location: index.php");
    }
?>