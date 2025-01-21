<?php
require_once("includes/config_session.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordway</title>
    <link rel="icon" type="image/x-icon" href="src/favicon.ico">
    <liak rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Helvetica, sans-serif,
        }
        #menu_banner {
            background-color: #007bff;
            color: white;
            padding: 10px 0; /* Reduced padding */
        }
        #menu_banner h1 {
            position: absolute;
            left: 10px;
            top: 10px;
        }
        @media (max-width: 768px) {
            .centered-container {
                flex-direction: column;
                align-items: center; /* Centered on small screens */
            }
            .divider {
                width: 100%;
                height: 1px;
                margin: 20px 0;
            }
        }
    </style>
</head>
<body>
    <div id="menu_banner" class="container-fluid text-center">
        <h1>Nordway</h1>
        <span>Hello, nigga!</span>
    </div>

    <!-- 
    TODO
    check if the user is logged in, if not transfer them to index.php page
     add functionalities like:
        displaying the user balance
        managing the account (modifying the data, deleting the account)
        withdrawing/depositing money
        transaction table
    -->
    <div id="footer" class="container-fluid text-center mt-5 py-3 border-top position-absolute bottom-0 ">
        <span>Nordway 2025 | <a href="https://github.com/pigluz/Nordway-Bank">Source Code</a></span>
    </div>
</body>
</html>
