<?php

declare(strict_types=1);
// validation, etc stuff


function are_inputs_filled(string $name, string $surname, string $phonenum, string $email, string $birth_place, string $pwd) 
{
    if(empty($name) || empty($surname) || empty($phonenum) || empty($email) || empty($birth_place) || empty($pwd)) {
        return false;
    } else {
        return true;
    }
};

function is_email_valid(string $email) 
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
};

function is_email_available (object $pdo, string $email) 
{
    if(get_user_by_email($pdo, $email)) {
        return false;
    } else {
        return true;
    }
};

function is_phone_number_valid (string $phonenum) 
{
    $phonenum_without_spaces = str_replace(" ", "", $phonenum);
    if(strlen($phonenum_without_spaces) == 9) {
        return true;
    }
    else {
        return false;
    }
};

function is_phone_number_available(object $pdo, string $phonenum) 
{
    if(get_user_by_phonenum($pdo, $phonenum)) {
        return false;
    } else {
        return true;
    }
};

function create_user(object $pdo, string $name, string $surname, string $email, string $phonenum, string $birth_place, string $pwd) 
{
    set_user($pdo, $name, $surname, $email, $phonenum, $birth_place, $pwd);
}