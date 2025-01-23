<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $ssn = $_POST["SIGN_UP_ssn"]; 
    $pwd = $_POST["SIGN_UP_pwd"];
    
    try {
        require_once "../db_connection.inc.php";
        require_once "reg_model.inc.php";
        require_once "reg_contr.inc.php";

        // ERR VALIDATION
        $errors = [];
        if(are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["empty_inputs"] = "Fill all in the fields!";
        };
        if(is_email_invalid($email) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["invalid_email"] = "Invalid email!";
        };
        if(is_email_unavailable($pdo, $email) && !is_email_invalid($email) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["taken_email"] = "Email already in use!";
        };
        if(is_phone_number_invalid($phonenum) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["invalid_phone_number"] = "Invalid phone number!";
        }
        if(is_phone_number_unavailable($pdo, $email) && !is_phone_number_invalid($phonenum) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["taken_phone_number"] = "Phone number already in use!";
        };
        if(is_ssn_invalid($ssn) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["invalid_ssn"] = "Invalid SSN!";
        }
        if(is_ssn_unavailable($pdo, $ssn) && !is_ssn_invalid($ssn) && !are_inputs_empty($name, $surname, $phonenum, $email, $ssn, $pwd)) {
            $errors["invalid_ssn"] = "SSN already in use!";
        }

        require_once "../config_session.inc.php";
        if($errors) {
            $_SESSION["sign_up_errors"] = $errors;
            header("Location: ../../index.php");
            die();
        }

        // if no errors found, create the user acc
        create_user($pdo, $name, $surname, $email, $phonenum, $ssn, $pwd);
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

