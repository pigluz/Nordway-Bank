<?php

declare(strict_types=1);
// function to show stuff on the page

function login_status()
{
    if (isset($_GET["acc_404"])) {
        echo "<div class='alert alert-danger text-center mt-3 p-1' role='alert'>";
        echo "<p class='my-auto'> Account not found! </p>";
        echo "</div>"; 
    }
    
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];

        foreach ($errors as $error) {
            echo "<div class='alert alert-danger text-center mt-3 p-1' role='alert'>";
            echo "<p class='my-auto'>" . $error . "</p>";
            echo "</div>";
        }
        unset($_SESSION["login_errors"]);
    } 
}