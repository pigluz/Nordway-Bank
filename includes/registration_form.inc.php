<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $birth_place = $_POST["SIGN_UP_birthPlace"]; 
    $pwd = $_POST["SIGN_UP_pwd"];
    
    require_once("db_connection.inc.php");

    $login = rand(10000000,99999999);

    $sql = "INSERT INTO users (name, surname, email, phonenum, birth_place, login, pwd)
    VALUES ('$name', '$surname', '$email', '$phonenum', '$birth_place', '$login', '$pwd')";
    
    if (mysqli_query($conn, $sql))
    {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    $pdo = null;
    header("Location: ../main.php");
    die();
} else {
    header("Location: ../main.php");
    die();
}

?>