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
}
// if($_SESSION["Role"] != 'A') {
//     header("location: ../../index.php");
// }
// require_once '../../inventory/navbar.php' ;
require_once './user-info.php';
$users = $_SESSION['adminUsers'];
$role = $_SESSION['adminRole'];
?>

  <table id="myTable" class="table table-responsive-md">
      <thead>
          <tr>Id</tr>
          <tr>FIrst Name</tr>
          <tr>Middle Name</tr>
          <tr>Last Name</tr>
          <tr>Date of Birth</tr>
          <tr>Gender</tr>
          <tr>Contact Number</tr>
          <tr>Email</tr>
          <tr>Society</tr>
          <tr>Area</tr>
          <tr>City</tr>
          <tr>Role</tr>
          <tr>Action</tr>
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
              echo "<td>".$u->role."</td>";
              echo "<td>action</td>";
              echo "</tr>";
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
  </body>
</html>  