<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <title>Orders</title>
</head>

<body class="container">
   <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      if ($_SESSION["Role"] != 'A') {
        header("location: ../index.php");
      }
   require_once '../inventory/navbar.php';
   require_once './orderController.php';
   //id, status, date, time, customer email, package name
   $orders = $_SESSION['orders'];
   $orderStatus = $_SESSION['orderStatus'];
   ?>
    <nav class="breadcrumb navbar">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li class="is-active"><a href="#">Orders</a></li>
        </ul>
    </nav>
    <table id="myTable" class="table table-responsive-md">
        <thead>
            <tr>
                <td>ID</td>
                <td>Email</td>
                <td>Date</td>
                <td>Time</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($orders as $o) {
                    echo "<tr>";
                    echo "<td>" .$o->oid. "</td>";
                    echo "<td>" .$o->email. "</td>";
                    echo "<td>" .$o->date. "</td>";
                    echo "<td>" .$o->time. "</td>";
                    echo "<td>" .$o->status. "</td>";
                    if($o->status == 'Confirmed'){
                        echo "<td><a class='button is-info'>Assign Employees</a>&nbsp
                        <a class='button is-info'>Assign props</a></td>";
                    }
                    else if($o->status == 'Completed'){
                        echo "<td><a class='button is-info'>Deliver Photos</a></td>";
                    }
                    else {
                        echo "<td><a class='button is-disabled'></a></td>";
                    }
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