<?php
session_start();
#session_destroy();
#session_start();
if (isset($_SESSION['userstring'])) {
  echo "SESSION: " . $_SESSION['userstring'];
}
if (isset($_SESSION['FName'])) {
  header("location: ./user/home.php");
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
  <link rel="stylesheet" href="./user/styles/style.css" />
  <title>Home</title>
</head>

<body>
  <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
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

    <div class="navbar-menu" id="navbar-main">
      <div class="navbar-end">
        <a href="./index.php" class="navbar-item is-active">Home</a>
        <hr class="navbar-divider">
        <a href="./user/login.php" class="navbar-item button is-light mr-2">Login</a>
        <a href="./user/signup.php" class="navbar-item button is-info">Sign Up</a>
      </div>
    </div>
  </nav>
  <div class="photo-type">
    <div class="content">
      <div class="hero">
        <h1 class="title mt-3 is-3 photo-title">Let's start our Journey</h1>
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
  <div class="row">
    <div class="card-container">
      <div class="card">
        <div class="card-content">
          <div class="plan-type">
            Starter Plan 👦
          </div>
          <div class="plan-monthly-cost">
            $6.99/mo
          </div>
          <div class="plan-annual-cost">
            $83.88 billed annually
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
            $12.99/mo
          </div>
          <div class="plan-annual-cost">
            $155.88 billed annually
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
            $20.99/mo
          </div>
          <div class="plan-annual-cost">
            $251.78 billed annually
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