<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
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
    <title>Inventory Dashboard</title>
  </head>
  <body class="container">
    <?php require_once './utilities/fetchProducts.php'?>
  <nav class=" navbar is-spaced" role="navigration" aria-label="main navigation">
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
                <a href="./home.php" class="navbar-item">Home</a>
                <a href="#" class="navbar-item is-active">Inventory</a>
                <a href="./login.php" class="navbar-item button is-danger">Log Out</a>
            </div>
        </div>
    </nav>
    <nav class="breadcrumb navbar">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li class="is-active"><a href="#">Inventory</a></li>
      </ul>
      <div class="navbar-main">
        <div class="navbar-end"><a href="../index.php" class="button is-success">Add new</a></div>
      </div>
    </nav>
    <table id="myTable" class="table table-responsive-md">
      <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Ownership</td>
          <td>Type</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
      <?php 
          foreach ($products as $inventory) {
            echo "<tr>";
            echo "<td>".$inventory->poid."</td>";
            echo "<td>".$inventory->pName."</td>";
            echo "<td>".$inventory->qty."</td>";
            echo "<td>".$inventory->price."</td>";
            echo "<td>".$inventory->ownership."</td>";
            echo "<td>".$inventory->iType."</td>";
            echo "<td><a class='button is-dark' href='./utilities/fetchProducts.php?id=$inventory->poid' id='btn'>Edit</a></td>";
        }
      ?>
      </tbody>
    </table>
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
    <script src="../scripts/navbar.js"></script>
  </body>
</html>