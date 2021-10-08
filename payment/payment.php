<?php 
$key = "rzp_test_LnEhyxSwxZ4lJA";
$amt = 100;
?>
<form action="../user/home.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_LnEhyxSwxZ4lJA" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $amt * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo "OID".rand(10,100)."END";?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="Apricus Productions"
    data-description="Book an appointment with us and we will contact you soon ";
    data-image="https://cdn.dribbble.com/users/41394/screenshots/2178368/apricot.jpg"
    data-prefill.name="<?php echo $_SESSION['uname']; ?>";
    data-prefill.email="<?php echo $_SESSION['email']; ?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>