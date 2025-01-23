<?php
declare(strict_types=1);
// database stuff

function get_user_by_email(object $pdo, string $email) 
{
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_by_phonenum(object $pdo, string $phonenum) 
{
    $query = 'SELECT * FROM users WHERE phonenum = :phonenum';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phonenum", $phonenum);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_by_ssn(object $pdo, string $unhashed_ssn) {
    $options = [
        'cost' => 12
    ];
    $hashedSSN = password_hash($unhashed_ssn, PASSWORD_DEFAULT, $options);
    $query = 'SELECT * FROM users WHERE ssn = :ssn';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ssn", $hashedSSN);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $name, string $surname, string $email, string $phonenum, string $ssn, string $pwd)
{
    // generate random login
    $login = rand(10000000, 99999999);

    $query = "INSERT INTO users (name, surname, email, phonenum, ssn, login, pwd)
        VALUES (:name, :surname, :email, :phonenum, :ssn, :login, :pwd)";

    // hashing password
    $options = [
        'cost' => 12
    ];
    $hashedSSN = password_hash($ssn, PASSWORD_DEFAULT, $options);
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":surname", $surname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phonenum", $phonenum);
    $stmt->bindParam(":ssn", $hashedSSN);
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":pwd", $hashedPwd);

    $stmt->execute();
}
