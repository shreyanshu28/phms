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
    <title>Inventory</title>
  </head>
  <body>
    <!--Add new product
        Update new product
        Delete quantity/product
     -->
    <nav
      class="navbar is-spaced"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="navbar-brand">
        <a href="../index.php" class="navbar-item">
          <h1 class="title is-4">Apricus Productions</h1></a
        >

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
      <div class="navbar-menu" id="navbar-main">
        <div class="navbar-end">
          <a href="" class="is-info mr-3">Hello, Admin</a>
          <a href="" class="is-danger button">Log out</a>
        </div>
      </div>
    </nav>
    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul class="ml-6">
        <li><a href="../index.php">Home</a></li>
        <li class="is-active"><a href="#" aria-current="page">Inventory</a></li>
      </ul>
    </nav>
    <!-- Fetch products from database -->
    <div id="inventory" class="m-2 columns"></div>
  </body>
  <script src="../scripts/navbar.js"></script>
  <script src="./scripts/createImage.js"></script>
</html>