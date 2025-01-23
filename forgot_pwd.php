<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/forget_pwd/forgot_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordway | Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Sora", serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        #menu_banner {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
        }
        .form-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 30px;
            background-color: #f9f9f9;
            max-width: 500px;
            width: 100%;
            margin: auto;
        }
        #footer {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div id="menu_banner" class="container-fluid text-center">
        <h1>Nordway</h1>
        <hr>
        <span>For those who strive for more.</span>
    </div>

    <div class="flex-grow-1 d-flex align-items-center">
        <div class="form-container">
            <h2 class="text-center">Forgot Password</h2>
            <p class="text-center text-black-50">Enter your email and we'll send you a code to reset your password.</p>
            <form action="includes/forget_pwd/email_enter.inc.php" method="post">
                <div class="form-floating mb-3">
                    <input name="FORGOT_PWD_email" type="email" class="form-control" placeholder="Enter email:" required>
                    <label for="FORGOT_PWD_email">Enter email:</label>
                </div>
                <div id="errors">
                    <?php
                        // forgot_pwd_errors();
                    ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php">Back to Login</a>
            </div>
        </div>
    </div>

    <div id="footer" class="container-fluid text-center border-top mt-5 py-3">
        <span>Nordway 2025 | <a href="https://github.com/pigluz/Nordway-Bank">Source Code</a></span>
    </div>
</body>
</html>
