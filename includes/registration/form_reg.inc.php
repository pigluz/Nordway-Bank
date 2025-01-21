<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $birth_place = $_POST["SIGN_UP_birthPlace"]; 
    $pwd = $_POST["SIGN_UP_pwd"];
    
    try {
        require_once "../db_connection.inc.php";
        require_once "reg_model.inc.php";
        require_once "reg_contr.inc.php";

        // ERR VALIDATION
        $errors = [];
        if(!are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["empty_inputs"] = "Fill all in the fields!";
        };
        if(!is_email_valid($email) && are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["invalid_email"] = "Invalid email!";
        };
        if(!is_email_available($pdo, $email) && is_email_valid($email) && are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["taken_email"] = "Email already taken!";
        };
        if(!is_phone_number_valid($phonenum) && are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["invalid_phone_number"] = "Invalid phone number!";
        }
        if(!is_phone_number_available($pdo, $email) && is_phone_number_valid($phonenum) && are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["taken_phone_number"] = "Phone number already taken!";
        };

        require_once "../config_session.inc.php";
        if($errors) {
            $_SESSION["sign_up_errors"] = $errors;
            header("Location: ../../index.php");
            die();
        }

        // if no errors found, create the user acc
        create_user($pdo, $name, $surname, $email, $phonenum, $birth_place, $pwd);
        $query=null;
        $pdo=null;
    
        header("Location: ../../index.php?reg_succ");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}

