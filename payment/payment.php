<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
$key = "rzp_test_LnEhyxSwxZ4lJA";
$amt = $_SESSION["amtTotal"];
?>
<form action="../user/home.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_LnEhyxSwxZ4lJA" data-amount="<?php echo $amt * 100; ?>" data-currency="INR" data-id="<?php echo "OID" . rand(10, 100) . "END"; ?>" data-buttontext="Pay with Razorpay" data-name="Apricus Productions" data-description="Book an appointment with us and we will contact you soon " ; data-image="https://cdn.dribbble.com/users/41394/screenshots/2178368/apricot.jpg" data-prefill.name="<?php echo $_SESSION['uname']; ?>" ; data-prefill.email="<?php echo $_SESSION['email']; ?>" data-theme.color="#F37254"></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
</form>