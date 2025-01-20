<?php

function are_inputs_filled($name, $surname, $phonenum, $email, $birth_place, $pwd) 
{
    if(empty($name) || empty($surname) || empty($phonenum) || empty($email) || empty($birth_place) || empty($pwd)) {
        return false;
    } else {
        return true;
    }
}

function is_email_valid ($email) 
{
    if(filter_var(($email), FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_email_available ($pdo, $email) 
{
    if(get_user($pdo, $email)) {
        return false;
    } else {
        return true;
    }
}

function is_phone_number_valid ($phonenum) 
{
    $phonenum_without_spaces = str_replace(" ", "", $phonenum);
    if(strlen($phonenum_without_spaces) == 9) {
        return true;
    }
    else {
        return false;
    }
}

function is_phone_number_available($pdo, $phonenum) {
    $query = 'SELECT * FROM users WHERE phonenum = :phonenum';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phonenum", $phonenum);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result == null) {
        return true;
    } else {
        return false;
    }
}