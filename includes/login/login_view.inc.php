<?php

declare(strict_types=1);
// function to show stuff on the page

function account_status() 
{
    if(isset($_GET["logged_off"])) {
        echo "<div class='alert alert-success text-center mt-3 p-2 d-flex' role'alert'>";
        echo "<p class='my-auto mx-auto'>Logged out successfully.</p>";
        echo "</div>";
    } else if(isset($_GET["acc_deleted"])) {
        echo "<div class='alert alert-success text-center mt-3 p-2 d-flex' role'alert'>";
        echo "<p class='my-auto mx-auto'>Account has been deleted.</p>";
        echo "</div>";
    } else if(isset($_GET["pwd_changed"])) {
        echo "<div class='alert alert-success text-center mt-3 p-2 d-flex' role'alert'>";
        echo "<p class='my-auto mx-auto'>Password has been changed.</p>";
        echo "</div>";
    }
    if (isset($_GET["reg_succ"])) {
        echo "<div class= 'alert alert-success text-center mt-3 p-2 d-flex' role='alert'>";
        echo "<p class='my-auto  mx-auto'>Successfully created an account!</p>";
        echo "</div>"; 
    }
    if(isset($_SESSION["user_id"])) {
        header("Location: mainpage.php");
        die();
    }
}

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