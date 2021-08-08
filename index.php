<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar my-1" role="navigration" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="./index.html" class="navbar-item">
          <h1 class="title is-4">Production House</h1>
        </a>

        <a
          role="button"
          class="navbar-burger"
          aria-label="menu"
          aria-expanded="false"
          data-taget="navbarMain"
          id="navbar-burger"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu has-shadow is-grey" id="navbar-main">
        <div class="navbar-end">
          <a href="./index.php" class="navbar-item is-active">Home</a>
          <a href="./about-us.php" class="navbar-item">About Us</a>
          <a href="./contact-us.php" class="navbar-item">Contact Us</a>
          <a href="./login.php" class="navbar-item button mr-2 is-light"
            >Login</a
          >
          <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
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
        <div class="">
          <img
            src="./images/jonathan-borba-PGIDs5PKWns-unsplash.jpg"
            alt="Image by jonathan borba"
            class=""
          />
          <a href="#" class=""
            >Photo Shooting<i class="fa fa-arrow-right"></i
          ></a>
        </div>
        <div class="">
          <img
            src="./images/ian-dooley-TLD6iCOlyb0-unsplash.jpg"
            alt="Image by ian dooley"
            class=""
          />
          <a href="#" class=""
            >Video Making <i class="fa fa-arrow-right"></i
          ></a>
        </div>
      </div>
    </div>

    <!-- <div class="column is-center">
      <div class="card equal-height">
        <div class="card-image has-text-centered">
          <figure class="image is-128x128 is-inline-block">
            <img
              class=""
              src="./images/jonathan-borba-PGIDs5PKWns-unsplash.jpg"
            />
          </figure>
        </div>
        <div class="card-content">
           other content here 
        </div>
      </div> 
    </div> -->
  </body>
  <script src="./scripts/navbar.js"></script>
</html>

<!-- <section class="hero is-info">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">Title</h1>
      <h2 class="subtitle">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas,
        possimus.
      </h2>
    </div>
  </div>
</section>
<div class="block columns">
  <div class="card column">
    <div class="card-content">
      <p class="title">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum ipsum
        maxime qui minima voluptates nemo unde? Facilis dolorum sequi
        beatae.
      </p>
    </div>
    <div class="card-footer">
      <div class="card-footer-item">
        <a href="">Share on <i class="fa fa-facebook"></i></a>
      </div>
    </div>
  </div>
  <div class="card column">
    <div class="card-content">
      <p class="title">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum ipsum
        maxime qui minima voluptates nemo unde? Facilis dolorum sequi
        beatae.
      </p>
    </div>
    <div class="card-footer">
      <div class="card-footer-item">
        <a href="">Share on <i class="fa fa-facebook"></i></a>
      </div>
    </div>
  </div>
  <div class="card column">
    <div class="card-content">
      <p class="title">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum ipsum
        maxime qui minima voluptates nemo unde? Facilis dolorum sequi
        beatae.
      </p>
    </div>
    <div class="card-footer">
      <div class="card-footer-item">
        <a href="#">Share on <i class="fa fa-facebook"></i></a>
      </div>
    </div>
  </div>
</div> -->
