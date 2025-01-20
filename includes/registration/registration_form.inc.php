<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $birth_place = $_POST["SIGN_UP_birthPlace"]; 
    $pwd = $_POST["SIGN_UP_pwd"];
    
    try {
        require_once("../db_connection.inc.php");
        require_once("registration_func.inc.php");

        // ERR VALIDATION
        $errors = [];

        if(!are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["empty_inputs"] == "Fill all in the fields!";
        };
        if(!is_email_valid($email) && !are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["invalid_email"] == "Invalid email!";
        };
        if(!is_email_available($pdo, $email) && !is_email_valid($email) && !are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["taken_email"] == "Email already taken!";
        };
        if(!is_phone_number_valid($phonenum) && !is_email_available($pdo, $email) && !is_email_valid($email) && !are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["invalid_phone_number"] == "Invalid phone number!";
        }
        if(!is_phone_number_available($pdo, $email) && !is_phone_number_valid($phonenum) && !is_email_available($pdo, $email) && !is_email_valid($email) && !are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd)) {
            $errors["taken_phone_number"] == "Phone number already taken!";
        }

        require_once "../config_session.inc.php";
        if($errors) {
            $_SESSION["sign_up_errors"] = $errors;
            header("Location: ../../index.php");
        }

        // if no errors found, create user
        $login = rand(10000000,99999999);
    
        $query = "INSERT INTO users (name, surname, email, phonenum, birth_place, login, pwd)
        VALUES (:name, :surname, :email, :phonenum, :birth_place, :login, :pwd)";
    
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phonenum", $phonenum);
        $stmt->bindParam(":birth_place", $birth_place);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":pwd", $hashedPwd);
    
        $stmt->execute();
        $query=null;
        $pdo=null;
    
        header("Location: ../../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}

?>