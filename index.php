<?php
session_start();
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
  <title>Home</title>
</head>

<body>
  <nav class="navbar my-1" role="navigration" aria-label="main navigation">
    <div class="navbar-brand">
      <a href="./index.php" class="navbar-item">
        <h1 class="title is-4">Apricus Productions</h1>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-taget="navbarMain" id="navbar-burger">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-menu has-shadow is-grey" id="navbar-main">
      <div class="navbar-end">
        <a href="./index.php" class="navbar-item is-active">Home</a>
        <a href="#aboutUs" class="navbar-item">About Us</a>
        <a href="#contactUs" class="navbar-item">Contact Us</a>
        <!-- if logged in , show logout and hello. otherwise login and signup  -->
        <?php
        if (!isset($_SESSION['userKey'])) {
          echo "<a href=./login.php class='navbar-item button mr-2 is-light'
                >Login</a>
                    <a href=./signup.php class='navbar-item button is-info'>Sign Up</a>";
        } else {
          echo "<a href=./home.php class='navbar-item button mr-2 is-light'>Hello, $_SESSION[userKey]</a>
                    <a href=./log-out.php class='narvbar-item button is-light'>Log out</a>";
        }
        ?>
      </div>
    </div>
  </nav>
  <div class="photo-type">
    <div class="content">
      <div class="hero">
        <h1 class="title is-3 photo-title">Let's start our Journey</h1>
        <h2 class="subtitle is-5 photo-title">
          The place where you will find your memories come to life
        </h2>
      </div>
    </div>
    <div class="box columns">
      <div class="show-page">
        <img src="./images/jonathan-borba-PGIDs5PKWns-unsplash.jpg" alt="Image by jonathan borba" class="" />
        <a href="#" class="">Photo Shooting<i class="fa fa-arrow-right"></i></a>
      </div>
      <div class="show-page">
        <img src="./images/ian-dooley-TLD6iCOlyb0-unsplash.jpg" alt="Image by ian dooley" class="" />
        <a href="#" class="">Video Making <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="block" id="aboutUs">
    <div class="container">
      <article class="message is-info">
        <div class="message-header">About Us</div>
        <div class="message-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet
          id, voluptatibus debitis officia ut labore rerum tempora quibusdam
          amet praesentium unde eligendi animi quis porro, illo sequi, veniam
          architecto eius.
        </div>
      </article>
    </div>
    <footer class="block" id="contactUs">
      <div class="box">
        <h1 class="title">Contact Us</h1>
        <a href="#" class="column"><i class="fa fa-github"></i> Github</a>
        <a href="#" class="column"><i class="fa fa-facebook"></i> Facebook</a>
        <a href="#" class="column"><i class="fa fa-twitter"></i> Twitter</a>
      </div>
    </footer>
</body>
<script src="./scripts/navbar.js"></script>

</html>