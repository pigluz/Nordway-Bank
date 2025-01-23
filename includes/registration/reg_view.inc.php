<?php

declare(strict_types=1);
// function to show stuff on the page
function signup_status()
{    
    if (isset($_SESSION["sign_up_errors"])) {
        $errors = $_SESSION["sign_up_errors"];

        foreach ($errors as $error) {
            echo "<div class='alert alert-danger text-center mt-3 p-1' role='alert'>";
            echo "<p class='my-auto'>" . $error . "</p>";
            echo "</div>";
        }
        unset($_SESSION["sign_up_errors"]);
    } 
}