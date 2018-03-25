<?php
    require_once "authenticate.php";
    require_once "dbusers.php";
    session_start();
    $db = new DBUsers();

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'logout':
                $db->kill_session($_SESSION["SessionInfo"]->User);
                break;
        }
    }
?>