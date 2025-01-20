<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_or_email = $_POST["LOG_IN_username/email"];
    $pwd = $_POST["LOG_IN_password"];
    
    try {
        require_once("db_connection.inc.php");

        // check if there is any login in the database
        // if not, check if there is any email 
        
        $query = 'SELECT * FROM users WHERE login = :login';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":login", $login_or_email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result == null) {
            $query = 'SELECT * FROM users WHERE email = :email';
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $login_or_email);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                die("no users found");
            }
        } 
        // if found, check if the pwd is correct
        if(!password_verify($pwd, $result["pwd"])) {
            die("invalid password");
        }
        
        $pdo = null;
        $query = null;
        header("../mainpage.php");

    } catch (PDOException $e) {
        die("Query error: " . $e->getMessage());
    }
} else {
    header("../index.php");
    die();
}