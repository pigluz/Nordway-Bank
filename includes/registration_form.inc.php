<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "root";
    $password = "";
    $servername = "localhost";
    $db_name = "nordway_bank";
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $name = $_POST["SIGN_UP_name"];
    $surname = $_POST["SIGN_UP_surname"];
    $phonenum = $_POST["SIGN_UP_phoneNr"];
    $email = $_POST["SIGN_UP_email"];
    $birth_place = $_POST["SIGN_UP_birthPlace"];
    
    $login = 
    $sql = "INSERT INTO MyGuests (name, surname, email, phonenum, birth_place, login)
    VALUES ('$name', '$surname', '$email', '$phonenum', '$birth_place', '$login')";
    
    if (mysqli_query($conn, $sql))
    {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    $conn-> close();
    header("Location: ../main.php");
    die();
} else {
    header("Location: ../main.php");
    die();
}

?>