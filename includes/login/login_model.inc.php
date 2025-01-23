<?php
declare(strict_types=1);
// database stuff

function get_user(object $pdo, string $login_or_email) {
    // firstly check if there is a user in the database that has the specific login
    $query = 'SELECT * FROM users WHERE login = :login';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":login", $login_or_email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    // if not found, check for the email address
    if($result == null) {
        $query = 'SELECT * FROM users WHERE email = :email';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $login_or_email);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($result == null) {
            return false;
        }
    }  
    return $result;
}