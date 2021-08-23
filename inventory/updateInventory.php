<?php 
// if (!$_SESSION) {
//     header("location:./inventory.php");
// } 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $inventory = $_SESSION['products'];

    foreach($inventory as $product) {
        $_SESSION['poid'] = $product->poid;
        $_SESSION['pName'] = $product->pName;
        $_SESSION['qty']=  $product->qty;
        $_SESSION['price'] = $product->price;
        $_SESSION['ownership'] = $product->ownership;
        $_SESSION['iType'] = $product->iType;
    }
    echo $_SESSION['poid'];
    echo $_SESSION['pName'];
    echo $_SESSION['qty'];
    echo $_SESSION['price'];
    echo $_SESSION['ownership'];
    echo $_SESSION['iType'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <title>Update Inventory</title>
</head>
<body>
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
                <a href="./home.php" class="navbar-item is-active">Home</a>
                <a href="./login.php" class="navbar-item button is-danger">Log Out</a>
            </div>
        </div>
    </nav>
    <nav class="breadcrumb navbar">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="./inventory.php">Inventory</a></li>
        <li><a href="#" class="is-active">Update Inventory</a></li>
      </ul>
    </nav>
    <form action="" method="post">
        <div class="field">
            <label class="label" for="pid">Product Id</label>
            <div class="control">
                <input class="input" type="text"name="pid" id="pid" value="<?php echo "$_SESSION[poid]";?>" disabled>
            </div>
        </div>
        <div class="field">
            <label class="label" for="pName">Name</label>
            <div class="control">
                <input class="input" type="text" name="pName" id="pName" value="<?php echo "$_SESSION[pName]";?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="qty">Quantity</label>
            <div class="control">
                <input  type="number" name="qty" id="qty" value="<?php echo "$_SESSION[qty]";?>">
            </div>
        </div>
        <div class="field">
        <label class="label" for="price">Price</label>
            <div class="control">
                <input type="number" name="price" id="price" value="<?php echo "$_SESSION[price]";?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="ownership">Owner</label>
            <div class="control">
                <input class="input" type="text" name="ownership" id="ownership" value="<?php echo "$_SESSION[ownership]";?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="iType">Type</label>
            <div class="control">
                <input class="input" type="text" name="iType" id="iType" value="<?php echo "$_SESSION[iType]";?>">
            </div>
        </div>        
        <div class="field is-grouped">
        <div class="control">
            <input type="submit" value="update"class="button is-link"></input>
        </div>
        <div class="control">
            <input type="reset" class="button is-link is-light"></input>
        </div>
        </div>
    </form>
</body>
</html>