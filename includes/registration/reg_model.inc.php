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

function set_user(object $pdo, string $name, string $surname, string $email, string $phonenum, string $birth_place, string $pwd)
{
    // generate random login
    $login = rand(10000000, 99999999);

    $query = "INSERT INTO users (name, surname, email, phonenum, birth_place, login, pwd)
        VALUES (:name, :surname, :email, :phonenum, :birth_place, :login, :pwd)";

    // hashing password
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
}
