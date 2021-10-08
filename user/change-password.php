<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_POST["VerifyOTP"])) {
    header("location: ./login.php?otp=1");
}

if (!(password_verify($_POST["txtUserOTP"], $_COOKIE["otp"]))) {
    header("location: ./verify-otp.php?otp=1");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Get OTP</title>
</head>

<body>
    <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
        <div class="navbar-brand">
            <a href="../index.php" class="navbar-item">
                <h1 class="title is-4">Apricus Productions</h1>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-taget="navbarMain" id="navbar-burger">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" id="navbar-main">
            <div class="navbar-end">
                <a href="../index.php" class="navbar-item">Home</a>
                <a href="./login.php" class="navbar-item button is-light is-active mr-2">Login</a>
                <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
            </div>
        </div>
    </nav>

    <p class="title mt-3 is-2 has-text-centered">Create Password</p>

    <form action="/ProductionHouse/user/utilities/_add-user.php" method="post" class="login-main">
        <div class="field" id="userInput">
            <label class="label is-size-4">Enter Password</label>
            <div class="control">
                <input type="password" name="txtPassword" class="input is-info is-medium" placeholder="password" id="password" required />
            </div>
        </div>
        <div class="field" id="userInput">
            <label class="label is-size-4">Re-enter Password</label>
            <div class="control">
                <input type="password" name="txtRePassword" class="input is-info is-medium" placeholder="password" id="password" required />
            </div>
        </div>
        <div class="field">
            <div class="field has-addons">
                <input type="submit" class="button is-medium is-info" name="create-pass" value="Create" />
            </div>
        </div>
    </form>
</body>
<script src="/ProductionHouse/scripts/forgotPassword.js"></script>
<script src="/ProductionHouse/scripts/navbar.js"></script>

</html>