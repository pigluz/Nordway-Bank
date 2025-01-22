<?php

declare(strict_types=1);
// function to show stuff on the page

function check_user() {
    if(isset($_GET["debug"])) {
        // testowe dane:

        $_SESSION["user_firstname"] = "Adam";
} else if (!isset($_SESSION["user_id"])){
        header("Location: index.php");
    }

}

function show_balance() {
    $user_balance = get_balance();
} 