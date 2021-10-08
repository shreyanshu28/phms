<?php
// If session already started gives
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["Email"])) {
    header("location: ./login.php?no=TRUE");
} else {
    // the path of _make-connection must be relative to the file for which it must be used
    // include doesn't change the path of the location
    // require_once "../_make-connection.php";
    require_once "./utilities/_fetch-user.php";
    // if($_SESSION["Role"] != 'A') {
    //     header("location: ../index.php");
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="../styles/style.css" /> <!-- for packages view -->
    <title>Home</title>
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
                <div class="navbar-item has-dropdown is-hoverable mr-2">
                    <a class="navbar-link">
                        <div class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                        </div>
                        <span>
                            Hello, <?php
                                    echo $_SESSION["FName"];
                                    ?>
                        </span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="./user-detail.php" class="navbar-item">
                            <div class="icon is-small is-left">
                                <i class="fa fa-edit"></i>
                            </div>
                            <span>
                                Edit Profile
                            </span>
                        </a>

                        <?php
                        if ($_SESSION["Role"] == "A") {
                            echo "
                                <a href='../inventory/inventory.php' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-edit'></i>
                                    </div>
                                    <span>
                                        Manage Inventory
                                    </span>
                                </a>";
                        } else if ($_SESSION["Role"] == "C") {
                            echo "
                                <a href='../order/cart.php' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-shopping-cart'></i>
                                    </div>
                                    <span>
                                        Your Cart
                                    </span>
                                </a>";
                        }
                        ?>
                        <a href="#" class="navbar-item">
                            <div class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </div>
                            <span>
                                Privacy & Security
                            </span>
                        </a>
                        <a href="#" class="navbar-item">
                            <div class="icon is-small is-left">
                                <i class="fa fa-gear"></i>
                            </div>
                            <span>
                                Settings
                            </span>
                        </a>
                    </div>
                </div>
                <a href="./utilities/_log-out.php" class="navbar-item button is-danger">Logout</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <div class="plan-type">
                        Starter Plan 👦
                    </div>
                    <div class="plan-monthly-cost">
                        ₹6.99/mo
                    </div>
                    <div class="plan-annual-cost">
                        ₹83.88 billed annually
                    </div>
                    <a href="./order/cart.php?cart=A">
                        <button class="indexing-button">
                            Start Indexing →
                        </button>
                    </a>
                    <ul class="plan-details">
                        <li class="plan-detail">5,000 Index requests per month.</li>
                        <li class="plan-detail">1 team member only.</li>
                        <li class="plan-detail">.json export.</li>
                        <li class="plan-detail">No subdomains allowed.</li>
                        <li class="plan-detail">Queue enabled.</li>
                        <li class="plan-detail">20s avg. response time.</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="plan-type">
                        Advanced Plan 🧑
                    </div>
                    <div class="plan-monthly-cost">
                        ₹12.99/mo
                    </div>
                    <div class="plan-annual-cost">
                        ₹155.88 billed annually
                    </div>
                    <div class="indexing-button-div">
                        <a href="./order/cart.php?cart=B">
                            <button class="indexing-button">
                                Start Indexing →
                            </button>
                        </a>
                    </div>
                    <ul class="plan-details">
                        <li class="plan-detail">All starter plan features.</li>
                        <li class="plan-detail">5 team members.</li>
                        <li class="plan-detail">.json and xml export.</li>
                        <li class="plan-detail">Subdomains allowed.</li>
                        <li class="plan-detail">No queue.</li>
                        <li class="plan-detail">5s avg. response time.</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="plan-type">
                        Pro Plan 😎
                    </div>
                    <div class="plan-monthly-cost">
                        ₹20.99/mo
                    </div>
                    <div class="plan-annual-cost">
                        ₹251.78 billed annually
                    </div>
                    <div class="indexing-button-div">
                        <a href="./order/cart.php?cart=C">
                            <button class="indexing-button">
                                Start Indexing →
                            </button>
                        </a>
                    </div>
                    <ul class="plan-details">
                        <li class="plan-detail">All advanced plan features.</li>
                        <li class="plan-detail">Unlimited requests per/mo.</li>
                        <li class="plan-detail">All file types exports.</li>
                        <li class="plan-detail">Subdomains allowed.</li>
                        <li class="plan-detail">No queue.</li>
                        <li class="plan-detail">Instant response.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./scripts/login.js"></script>
<script src="../scripts/navbar.js"></script>

</html>