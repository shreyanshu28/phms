<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!(isset($_SESSION['products']))) {
        header("location:./inventory.php");
    }
    $inventory = $_SESSION['products'];

    foreach ($inventory as $product) {
        $_SESSION['pid'] = $product->pid;
        $_SESSION['productName'] = $product->productName;
        $_SESSION['qty'] =  $product->qty;
        $_SESSION['price'] = $product->price;
        $_SESSION['type'] = $product->type;
    }
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
    <?php require_once './utilities/_fetchType.php' ?>
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
    <nav class="breadcrumb navbar ml-6">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="./inventory.php">Inventory</a></li>
            <li class="is-active"><a href="#">Update Inventory</a></li>
        </ul>
    </nav>
    <form action="./utilities/updateProducts.php" method="post" class="m-6">
        <div class="field">
            <label class="label" for="pid">Product Id</label>
            <div class="control">
                <!-- use readonly not disabled php not able to get disabled post value -->
                <input class="input is-success" type="text" name="pid" id="pid" value="<?php echo "$_SESSION[pid]"; ?>" readonly />
            </div>
        </div>
        <div class="field">
            <label class="label" for="pName">Name</label>
            <div class="control">
                <input class="input is-success" type="text" name="productName" id="pName" value="<?php echo "$_SESSION[productName]"; ?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="qty">Quantity</label>
            <div class="control">
                <input type="number" class="is-success" name="qty" id="qty" value="<?php echo "$_SESSION[qty]"; ?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="price">Price</label>
            <div class="control">
                <input type="number" class="is-success" name="price" id="price" value="<?php echo "$_SESSION[price]"; ?>">
            </div>
        </div>
        <!--
        <div class="field">
            <label class="label" for="ownership">Owner</label>
            <div class="control">
                <div class="select">
                    <select>
                        <option>Add new</option>
                        <?php
                        // foreach ($owner as $o) {
                        //     if ($o->ownership == $_SESSION['ownership']) {
                        //         echo "<option  class=is-success selected=selected>" . $o->ownership . "</option>";
                        //     } else {
                        //         echo "<option class=is-success >" . $o->ownership . "</option>";
                        //     }
                        // } 
                        ?>
                    </select>
                </div>
            </div>
        </div> 
        -->
        <div class="field">
            <label class="label" for="type">Type</label>
            <div class="field control has-addons">
                <div class="select">
                    <select name="type" id="type">
                        <option value="-1">Types</option>
                        <option value="1">Add New</option>
                        <?php
                        foreach ($type as $t) {
                            if ($t->type == $_SESSION['type']) {
                                echo "<option selected>" . $t->type . "</option>";
                            } else {
                                echo "<option>" . $t->type . "</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <input type="submit" name="update" value="Update" class="button is-link" id="update"></input>
            </div>
            <div class="control">
                <input type="reset" class="button is-link is-light"></input>
            </div>
        </div>
    </form>

    <?php
    // if (isset($_POST['update'])) {
    //     header("location: ?id=${_SESSION['id']}");
    //     // unset($_SESSION['products']);
    //     // unset($_SESSION['products']);
    // }
    ?>
</body>
<script src="../scripts/navbar.js"></script>
<script src="./scripts/inventory.js"></script>

</html>