<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./styles/show-images.css">
    <title>Our Work</title>
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
    <div class="body-main">
        <h1 class="heading">Our Work</h1>
    </div>
    <div class="image-gallery"></div>
</body>
<script src="./scripts/show-images.js"></script>

</html>