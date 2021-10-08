<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard</title>
</head>

<body class="container">
  <?php
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
  ob_start();
  if($_SESSION["Role"] != 'A') {
    header("location: ../../index.php");
  }
}
require_once './user-info.php';
require_once './navbar.php';
$users = $_SESSION['adminUsers'];
$role = $_SESSION['adminRole'];
?>
  <nav class="breadcrumb navbar">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li class="is-active"><a href="#">User</a></li>
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
          <form action="./user-info.php" method="post">
            <div class="field">
              <label for="designation" class="label">Designation</label>
              <div class="control">
                <input type="text" name="designation" id="designation">
              </div>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <input type="submit" value="submit" class="button is-link" id="submit">
              </div>
              <div class="control"><input type="reset" value="reset" class="button is-link is-light"></div>
            </div>
          </form>
        </section>
      </div>
    </div>
  <table id="myTable" class="table table-responsive-md">
      <thead>
          <tr>
          <td>Id</td>
          <td>FIrst Name</td>
          <td>Middle Name</td>
          <td>Last Name</td>
          <td>Date of Birth</td>
          <td>Gender</td>
          <td>Contact Number</td>
          <td>Email</td>
          <td>Society</td>
          <td>Area</td>
          <td>City</td>
          <td>Role</td>
          <td>Action</td>
          </tr>
      </thead>
      <tbody>
          <?php
            foreach($users as $u) {
              echo "<tr>";
              echo "<td>".$u->uid."</td>";
              echo "<td>".$u->firstName."</td>";
              echo "<td>".$u->middleName."</td>";
              echo "<td>".$u->lastName."</td>";
              echo "<td>".$u->dob."</td>";
              echo "<td>".$u->gender."</td>";
              echo "<td>".$u->contactNumber."</td>";
              echo "<td>".$u->email."</td>";
              echo "<td>".$u->addressline1."</td>";
              echo "<td>".$u->addressline2."</td>";
              echo "<td>".$u->city."</td>";
              // echo "<form method=POST>";
              ?>
              <td><form action="" method="post">
                <?php
              // echo "<td>
                echo "<div class=select>
                    <select name=role id=role>";
                foreach($role as $r) {
                    if($r->role == $u->role) {
                        echo "<option selected name=newRole value=".$r->role.">".$r->role."</option>";
                    }
                    else {
                        echo "<option name=newRole value=".$r->role.">".$r->role."</option>";
                    }
                }
                echo "</select>
                </div>
                </td>";
                echo "<td><input type=hidden name=uid value=".$u->uid."><input type=submit name=submit value=update class='button is-primary'></td>";
              
                ?>
  </form>
              </tr><?php
            }
            
          ?>
      </tbody>
  </table>
  <?php 
            
            if(isset($_POST['submit'])) {
                  $_SESSION['role'] = $_POST['role'];
                  $_SESSION['uid'] = $_POST['uid'];
                  header('location:./user-info.php');
            }
            ?>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#myTable").DataTable();
  });
  </script>
  <script src="../../scripts/showModal.js"></script>
  </body>
</html>  