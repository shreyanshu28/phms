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
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
      integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"
    />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Inventory</title>
  </head>
  <body class="container">
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
    <table id="myTable" class="table table-responsive-md">
      
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdnjs.buttflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>
  </body>
  <script src="../scripts/navbar.js"></script>
  <script src="./scripts/createImage.js"></script>
  <script src="./scripts//fetchProducts.js"></script>
</html>