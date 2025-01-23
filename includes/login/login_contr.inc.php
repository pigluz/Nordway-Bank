<?php
declare(strict_types=1);
// validation, etc stuff

function are_inputs_filled(string $email_login, string $pwd) 
{
    if(empty($email_login) || empty($pwd)) {
        return false;
    } else {
        return true;
    }
};

function is_pwd_correct(string $unhashed_pwd, array $user_info) {
    $hashed_pwd = $user_info["pwd"];
    if(password_verify($unhashed_pwd, $hashed_pwd)) {
        return true;
    } else {
        return false;
    }
}