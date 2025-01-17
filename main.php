<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordigo</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="menu_banner">
        <h1>Nordigo</h1>
        <hr>
        <span>Your money, our care.</span>
    </div>

    <div id="notLoggedIn_banner">
        <h1>You are not logged in.</h1>
        <div id="signUP_form">
            <h1>Sign up</h1>
            <form action="includes/signup/user_signup.inc.php" method="post">
                <label>Your legal name:</label>
                <input name="SIGN_UP_name">
                <label>Your login:</label>
                <input name="SIGN_UP_login">
                <label>Your e-mail:</label>
                <input name="SIGN_UP_email" type="email">
                <label>Your password:</label>
                <input name="SIGN_UP_password" type="password">
                <button type="submit">Sign up</button>
            </form>
        </div>
        <span>or</span>
        <div id="logIN_form">
            <h1>Log in</h1>
            <form action="includes/login/user_login.inc.php" method="post">
                <label>Your login/email:</label>
                <input name="LOG_IN_username/email">
                <label>Your password:</label>
                <input type="LOG_IN_password" type="password">
                <a href="">Forgot password</a>
                <button type="submit">Log in</button>
            </form>
        </div>
    </div>

    <div id="footer">
        <span>Nordigo 2024 | <a href="https://github.com/pigluz/signup-login-page-php-test">Source Code</a></span>
    </div>
</body>
</html>