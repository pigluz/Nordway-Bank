<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $birth_place = $_POST["SIGN_UP_birthPlace"]; 
    $pwd = $_POST["SIGN_UP_pwd"];
    
    try {
        require_once("db_connection.inc.php");

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
    
        header("Location: ../main.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../main.php");
    die();
}

?>