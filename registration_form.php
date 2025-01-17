<?php
$username = "root";
$password = "";
$servername = "localhost";
$db_name = "nordwaybank";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$surname = $_POST["surname"];
$phonenum = $_POST["phonenum"];
$email = $_POST["email"];
$birth_place = $_POST["birthplace"];

$sql = "INSERT INTO MyGuests (name, surname, email, phonenum, birth_place)
VALUES ('$name', '$surname', '$email', '$phonenum', '$birth_place')";

if (mysqli_query($conn, $sql))
{
    echo "New record created successfully";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn-> close();
?>