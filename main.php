<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordway</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #menu_banner {
            background-color: #007bff; /* Fixed typo: bg-primary */
            color: white;
        }
        .form-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 30px; /* Increased padding */
            background-color: #f9f9f9;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .divider {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 1px;
            background: #ddd;
            height: auto;
            margin: 0 20px;
        }
        .divider span {
            background: #f9f9f9;
            padding: 5px 10px;
            color: #555;
        }
        .centered-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: stretch; /* Ensures equal height */
            gap: 20px;
            margin-top: 30px;
        }
        .centered-container > .form-container {
            flex: 1;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .centered-container {
                flex-direction: column;
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
    <div id="menu_banner" class="container-fluid p-5 text-center">
        <h1>Nordway</h1>
        <hr>
        <span>kupa kupa kuap.</span>
    </div>

    <div id="notLoggedIn_banner" class="container mt-4 text-center">
        <h1>You are not logged in.</h1>
    </div>

    <div class="centered-container">
        <!-- Sign Up Section -->
        <div id="signUP_form" class="form-container">
            <h2 class="text-center">Sign Up</h2>
            <form action="includes/registration_form.inc.php" method="post">
                <div class="row g-2 mb-3">
                    <div class="form-floating col">
                        <input name="SIGN_UP_name" type="text" class="form-control" placeholder="Your name">
                        <label for="SIGN_UP_name">Your name</label>
                    </div>
                    <div class="form-floating col">
                        <input name="SIGN_UP_surname" type="text" class="form-control" placeholder="Your surname">
                        <label for="SIGN_UP_surname">Your surname</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="SIGN_UP_email" type="email" class="form-control" placeholder="Your email">
                    <label for="SIGN_UP_email">Your email</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="SIGN_UP_pwd" type="text" class="form-control" placeholder="Your password">
                    <label for="SIGN_UP_pwd">Your password</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="SIGN_UP_phoneNr" type="text" class="form-control" placeholder="Your phone number">
                    <label for="SIGN_UP_phoneNr">Your phone number</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="SIGN_UP_birthPlace" type="text" class="form-control" placeholder="Your birth place">
                    <label for="SIGN_UP_birthPlace">Your birth place</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#">Terms of Service</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
        </div>

        <!-- Divider -->
        <div class="divider">
            <span>or</span>
        </div>

        <!-- Log In Section -->
        <div id="logIN_form" class="form-container">
            <h2 class="text-center">Log In</h2>
            <form action="includes/login/user_login.inc.php" method="post">
                <div class="form-floating mb-3">
                    <input name="LOG_IN_username/email" type="text" class="form-control" placeholder="Your login/email">
                    <label for="LOG_IN_username/email">Your login/email</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="LOG_IN_password" type="password" class="form-control" placeholder="Your password">
                    <label for="LOG_IN_password">Your password</label>
                </div>
                <div class="text-center mb-3">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
        </div>
    </div>

    <div id="footer" class="container-fluid text-center mt-5 py-3 border-top">
        <span>Nordway 2025 | <a href="https://github.com/stinkyrat612/Nordway-Bank">Source Code</a></span>
    </div>
</body>
</html>
