<?php
session_start();
class DBWrapper {
    protected $conn;

    function load_config() {
        $config = file_get_contents("c:\\users\\cjred\\desktop\\phptest.json");
        return json_decode($config, True);
    }

    function __construct() {
        $config = $this->load_config();
        $server = $config["server"];
        $password = $config["password"];
        $username = $config["user"];
        $db = $config["db"];
        $this->conn = new PDO("mysql:dbname=$db;host=$server", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function __destruct(){
        $conn = null;
    }
}

?>