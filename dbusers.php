<?php
require_once "dbwrapper.php";
require_once "session.php";
session_start();
class DBUsers extends DBWrapper {

    public function create_user($userName, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        date_default_timezone_set("America/Chicago");
        $dateCreated = date("Y-m-d H:i:s");
        $sessionID = uniqid(0, True);
        $stmt = $this->conn->prepare("insert into users (Email, PasswordHash, DateCreated, SessionID) values (:userName, :passwordHash, :dateCreated, :sessionID)");
        $stmt->execute(array(
            "userName" => $userName,
            "passwordHash" => $passwordHash,
            "dateCreated" => $dateCreated,
            "sessionID" => $sessionID
        ));
    }

    public function get_users() {
        $users = $this->conn->query("select * from users;");
        return $users;
    }

    public function get_user($userName) {
        $stmt = $this->conn->prepare("select * from users where email=?");
        $stmt->execute([$userName]);
        return $stmt->fetchAll();
    }

    public function login($userName, $password) {
        $success = False;
        
        $user = $this->get_user($userName);
        
        if (count($user) > 0 && password_verify($password, $user[0]["PasswordHash"])) {
            $this->create_session($userName);
            $success = True;
        }

        return $success;
    }

    private function create_session($userName) {
        $stmt = $this->conn->prepare("update users set SessionID=? where Email=?");
        $sessionid = uniqid(0, True);
        $stmt->execute([$sessionid, $userName]);
        $session = new Session($userName, (new DateTime())->modify("+5 minutes"), $sessionid);
        $_SESSION["SessionInfo"] = $session;
    }

    public function kill_session($userName) {
        $stmt = $this->conn->prepare("update users set SessionID=null where Email=?");
        $stmt->execute([$userName]);
        unset($_SESSION["SessionInfo"]);
    }

    public function session_exists($userName, $sessionID) {
        $stmt = $this->conn->prepare("select SessionID from users where Email=?");
        $stmt->execute([$userName]);
        return $sessionID === $stmt->fetch()[0];
    }
}

?>