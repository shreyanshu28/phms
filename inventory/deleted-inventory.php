<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <title>Deleted Inventory</title>
</head>
<body class="container">
    <?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
    if($_SESSION["Role"] != 'A') {
    header("location: ../index.php");
    }
    require_once './utilities/fetchProducts.php';
    require_once './utilities/_fetchType.php';
    require_once './navbar.php';
    ?>
     <nav class="breadcrumb navbar">
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="./inventory.php">Inventory</a></li>
      <li class="is-active"><a href="#">Deleted Products</a></li>
    </ul>
    <div class="navbar-main">
      <div class="navbar-end"><button class="button is-success" id="modal-click">Add new</button></div>
    </div>
  </nav>
  <table id="myTable" class="table table-responsive-md">
    <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Type</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($products as $inventory) {
        if($inventory->qty) {
          continue;
        }
        else{
          echo "<tr>";
          echo "<td>" . $inventory->pid . "</td>";
          echo "<td>" . $inventory->productName . "</td>";
          echo "<td>" . $inventory->qty . "</td>";
          echo "<td>" . $inventory->price . "</td>";
          echo "<td>" . $inventory->type . "</td>";
          echo "<td><a class='button is-warning' href='./utilities/deleteProduct.php?id=$inventory->pid&restore=true' id='btn'>Restore</a></td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</body>
</html>