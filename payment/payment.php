<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$key = "rzp_test_LnEhyxSwxZ4lJA";
$amt = $_SESSION["amtTotal"];
$_SESSION["refId"] = "OID" . rand(10, 100) . "END";

?>
<form action="./success.php" method="POST">
  <link rel="stylesheet" href="./style.css">
  <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_LnEhyxSwxZ4lJA" data-amount="<?php echo $amt * 100; ?>" data-currency="INR" data-id="<?php $_SESSION["refId"]; ?>" data-buttontext="Pay with Razorpay" data-name="Apricus Productions" data-description="Book an appointment with us and we will contact you soon" ; data-image="https://cdn.dribbble.com/users/41394/screenshots/2178368/apricot.jpg" data-prefill.name="Demo" ; data-prefill.email="Demo@Demo.com" data-theme.color="#F37254"></script>
  <input type="hidden" custom="Hidden Element" name="hidden">
</form>