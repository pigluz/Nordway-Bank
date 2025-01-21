<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_or_email = $_POST["LOG_IN_username/email"];
    $pwd = $_POST["LOG_IN_password"];
    
    try {
        require_once "../db_connection.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        $errors = [];
        if(!are_inputs_filled($login_or_email, $pwd)) {
            $errors["empty_inputs"] = "Fill all in the fields!";
        };
        
        $user = get_user($pdo, $login_or_email);
        
        if($user == false) {
            header("Location: ../../index.php?acc_404");
            die();
        }

        if(!is_pwd_correct($pwd, $user)) {
            $errors["incorrect_pwd"] = "Incorrect login info!";
        } 
    
        require_once "../config_session.inc.php";
        if($errors) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../../index.php");
            die();
        }
        
        // if success, create a session and proceed to the main page
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_login"] = htmlspecialchars($user["login"]);
        $_SESSION["user_firstname"] = htmlspecialchars($user["name"]);
        $_SESSION["user_surname"] = htmlspecialchars($user["surname"]);
        $_SESSION["user_email"] = htmlspecialchars($user["email"]);
        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["last_regeneration"] = time();

        $pdo = null;
        $query = null;
        header("Location: ../../mainpage.php");

    } catch (PDOException $e) {
        die("Query error: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}