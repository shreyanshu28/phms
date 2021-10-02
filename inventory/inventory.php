<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <title>Inventory Dashboard</title>
</head>

<body class="container">
  <?php
  require_once './utilities/fetchProducts.php';
  require_once './utilities/_fetchType.php';
  require_once './navbar.php';
  ?>
  <nav class="breadcrumb navbar">
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li class="is-active"><a href="#">Inventory</a></li>
    </ul>
    <div class="navbar-main">
      <div class="navbar-end"><button class="button is-success" id="modal-click">Add new</button></div>
    </div>
  </nav>
  <div class="modal" id="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add new product</p>
        <button class="delete" id="close-modal" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <form action="./utilities/addProducts.php" method="post">
          <div class="field">
            <label class="label" for="pName">Name</label>
            <div class="control">
              <input class="input is-success" type="text" name="productName" id="pName">
            </div>
          </div>
          <div class="field">
            <label class="label" for="qty">Quantity</label>
            <div class="control">
              <input type="number" class="is-success" name="qty" id="qty">
            </div>
          </div>
          <div class="field">
            <label class="label" for="price">Price</label>
            <div class="control">
              <input type="number" class="is-success" name="price" id="price">
            </div>
          </div>
          <div class="field">
            <label class="label" for="type">Type</label>
            <div class="field control has-addons">
              <div class="select">
                <select name="type" id="type">
                  <option value="-1">Types</option>
                  <option value="1">Add New</option>
                  <?php
                  foreach ($type as $t) {
                    echo "<option>" . $t->type . "</option>";
                  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <input type="submit" value="Submit" class="button is-link" name="submit" id="submit"></input>
              <!-- <button type="submit" name="button1" class="button is-link">Submit</button> -->
            </div>
            <div class="control">
              <input type="reset" class="button is-link is-light"></input>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
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
        echo "<tr>";
        echo "<td>" . $inventory->pid . "</td>";
        echo "<td>" . $inventory->productName . "</td>";
        echo "<td>" . $inventory->qty . "</td>";
        echo "<td>" . $inventory->price . "</td>";
        echo "<td>" . $inventory->type . "</td>";
        echo "<td><a class='button is-dark' href='./utilities/fetchProducts.php?id=$inventory->pid' id='btn'>Edit</a></td>";
      }
      ?>
    </tbody>
  </table>

  <script src="../scripts/showModal.js"></script>
  <script src="./scripts/inventory.js"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.buttflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#myTable").DataTable();
    });
  </script>
  <?php
  // if (array_key_exists("button1", $_POST)) {
  //   $_SESSION['pName'] = $_POST['pName'];
  //   $_SESSION['qty'] = $_POST['qty'];
  //   $_SESSION['price'] = $_POST['price'];
  //   $_SESSION['type'] = $_POST['type'];
  // }
  ?>
</body>

</html>