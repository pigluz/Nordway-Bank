<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordway</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="menu_banner" class="container-fluid p-5 bg-priamry text-center">
        <h1>Nordway</h1>
        <hr>
        <span>kupa kupa kuap.</span>
    </div>

    <div id="notLoggedIn_banner" class="container-fluid mt-3 d-flex flex-row my border">
        <div class="d-flex align-items-start">
            <h1 class="text-center clear-fix">You are not logged in.</h1>
        </div><br>
        <div id="signUP_form" class="container-fluid p-5 my border mt-3">
            <h1 class="text-center">Sign up</h1>
            <form action="includes/signup/user_signup.inc.php" method="post">
                <div class="container-fluid row g-2 mb-3 mt-3 ms-0 me-0 ps-0 pe-0">
                    <div class="form-floating col ms-0 ps-0"> 
                        <input name="SIGN_UP_name" type="text" class="form-control" placeholder="Your name">
                        <label for="SIGN_UP_name">Your name:</label>
                    </div>
                    <div class="form-floating col me-0 pe-0" > 
                        <input name="SIGN_UP_surname" type="text" class="form-control" placeholder="Your surname">
                        <label for="SIGN_UP_surname">Your surname:</label>
                    </div>  
                </div>
                <div class="form-floating mb-3 mt-3"> 
                    <input name="SIGN_UP_email" type="text" class="form-control" placeholder="Your e-mail">
                    <label for="SIGN_UP_email">Your e-mail:</label>
                </div>
                <div class="form-floating mb-3 mt-3"> 
                    <input name="SIGN_UP_login" type="text" class="form-control" placeholder="Your login">
                    <label for="SIGN_UP_login">Your login:</label>
                </div>
                <div class="form-floating mb-3 mt-3"> 
                    <input name="SIGN_UP_phoneNr" type="text" class="form-control" placeholder="Your phone number">
                    <label for="SIGN_UP_phoneNr">Your phone number:</label>
                </div>
                <div class="form-floating mb-3 mt-3"> 
                    <input name="SIGN_UP_birthPlace" type="text" class="form-control" placeholder="Your birth place">
                    <label for="SIGN_UP_birthPlace">Your birth place:</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>
        <span>or</span>
        <div id="logIN_form" class="container-fluid p-5 my border mt-3">
            <h1 class="text-center">Log in</h1>
            <form action="includes/login/user_login.inc.php" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input name="LOG_IN_username/email" type="text" class="form-control" placeholder="Your login/email:s">
                    <label for="LOG_IN_username/email">Your login/email:</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input name="LOG_IN_password" type="password" class="form-control" placeholder="Your password:">
                    <label for="LOG_IN_password">Your password:</label>
                </div>
                <a href="" class="text-center">Forgot password</a>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
        </div>
    </div>

    <div id="footer" class="container-fluid p-5 my border mt-3 text-center ">
        <span>Nordway 2025 | <a href="https://github.com/stinkyrat612/Nordway-Bank">Source Code</a></span>
    </div>
</div>
</body>
</html>