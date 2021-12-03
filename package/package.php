<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "./utilities/fetch-packages.php";
require_once "./utilities/fetch-types.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <title>Packages Dashboard</title>
</head>

<body>
  <?php
  require_once "./navbar.php";
  ?>
  <div class="container">
    <nav class="breadcrumb navbar">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li class="is-active"><a href="#">Packages Dashboard</a></li>
      </ul>
      <div class="navbar-main">
        <div class="navbar-end"><button class="button is-success" id="modal-click">Add new</button></div>
      </div>
    </nav>
    <div class="modal" id="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Add new Package</p>
          <button class="delete" id="close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <form action="./utilities/add-package.php" method="post">
            <div class="field">
              <label class="label" for="packageName">Package Name</label>
              <div class="control">
                <input class="input is-success" type="text" name="packageName" id="packageName">
              </div>
            </div>
            <div class="field">
              <label class="label" for="photoCount">Photo Count</label>
              <div class="control">
                <input type="number" class="is-success" name="photoCount" id="photoCount">
              </div>
            </div>
            <div class="field">
              <label class="label" for="videoCount">Video Count</label>
              <div class="control">
                <input type="number" class="is-success" name="videoCount" id="videoCount">
              </div>
            </div>
            <div class="field">
              <label class="label" for="price">Price</label>
              <div class="control">
                <input type="number" class="is-success" name="price" id="price">
              </div>
            </div>
            <div class="field">
              <label class="label" for="description">Description</label>
              <div class="control">
                <textarea name="description" id="description" cols="30" rows="3" placeholder="This is Package Description">This is Package Description</textarea>
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
                    foreach ($types as $types) {
                      echo "<option>" . $types->type . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <input type="submit" value="Submit" class="button is-link" name="submit" id="submit"></input>
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
          <td>Package Name</td>
          <td>Photo Count</td>
          <td>Video Count</td>
          <td>Price</td>
          <td>Type</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($packages as $package) {
          if (isset($_REQUEST["restore"])) {
            if ($_REQUEST["restore"] == 1) {
              if ($package->status) {
                continue;
              }
              echo "<tr>";
              echo "<td>" . $package->pid . "</td>";
              echo "<td>" . $package->packageName . "</td>";
              echo "<td>" . $package->photoCount . "</td>";
              echo "<td>" . $package->videoCount . "</td>";
              echo "<td>" . $package->price . "</td>";
              echo "<td>" . $package->description . "</td>";
              echo "<td>" . $package->type . "</td>";
              echo "<td><a class='button is-warning' href='./utilities/delete-package.php?id=$package->pid&restore=1' id='btn'>Restore</a></td>";
              echo "</tr>";
            }
          } else {
            if (!$package->status) {
              continue;
            }
            echo "<tr>";
            echo "<td>" . $package->pid . "</td>";
            echo "<td>" . $package->packageName . "</td>";
            echo "<td>" . $package->photoCount . "</td>";
            echo "<td>" . $package->videoCount . "</td>";
            echo "<td>" . $package->price . "</td>";
            echo "<td>" . $package->description . "</td>";
            echo "<td>" . $package->type . "</td>";
            echo "<td><a class='button is-dark' href='./utilities/fetch-packages.php?id=$package->pid' id='btn'>Edit</a>&nbsp";
            echo "<a class='button is-danger' href='./utilities/delete-package.php?id=$package->pid' id='btn'>Delete</a></td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $("#myTable").DataTable();
      });
    </script>
    <script src="./scripts/script.js"></script>
  </div>
</body>

</html>