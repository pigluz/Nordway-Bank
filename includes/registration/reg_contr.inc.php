<?php
declare(strict_types=1);
// validation, etc stuff

function are_inputs_empty(string $name, string $surname, string $phonenum, string $email, string $ssn, string $pwd) 
{
    if(empty($name) || empty($surname) || empty($phonenum) || empty($email) || empty($ssn) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
};

function is_email_invalid(string $email) 
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
};

function is_email_unavailable (object $pdo, string $email) 
{
    if(get_user_by_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
};

function is_phone_number_invalid (string $phonenum) 
{
    if(preg_match('/^\d{3}[-\s]?\d{3}[-\s]?\d{3}$/', $phonenum)) {
        return false;
    } else {
        return true;
    }
};

function is_phone_number_unavailable(object $pdo, string $phonenum) 
{
    if(get_user_by_phonenum($pdo, $phonenum)) {
        return true;
    } else {
        return false;
    }
};
function is_ssn_invalid(string $ssn) 
{
    if(preg_match('/^\d{11}$/', $ssn)){ // regex na pesel lol
        return false;
    }   else {
        return true;
    }
}
function is_ssn_unavailable(object $pdo, string $ssn) {
    if(get_user_by_ssn($pdo, $ssn)) {
        return true;
    } else {
        return false;
    }
}
function create_user(object $pdo, string $name, string $surname, string $email, string $phonenum, string $ssn, string $pwd) 
{
    set_user($pdo, $name, $surname, $email, $phonenum, $ssn, $pwd);
};