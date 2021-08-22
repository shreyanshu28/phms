<?php
// If session already started gives
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Username'])) {
    header("Location: ./login.php");
} else {
    // the path of _make-connection must be relative to the file for which it must be used
    // include doesn't change the path of the location
    include "../_make-connection.php";
    include "./utilities/_fetch-user.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <title>Home</title>
</head>

<body>
    <nav class=" navbar is-spaced" role="navigration" aria-label="main navigation">
        <div class="navbar-brand">
            <a href="./index.php" class="navbar-item">
                <h1 class="title is-4">Production House</h1>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-taget="navbarMain" id="navbar-burger">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" id="navbar-main">
            <div class="navbar-end">
                <a href="./home.php" class="navbar-item is-active">Home</a>
                <a href="./login.php" class="navbar-item button is-danger">Log Out</a>
            </div>
        </div>
    </nav>

    <form action="./utilities/_add-user.php" method="post" class="signup-main">

    </form>
</body>

</html>