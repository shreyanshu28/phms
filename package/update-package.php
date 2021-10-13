<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!(isset($_SESSION['package']))) {
  header("location:./package.php");
}

$packages = $_SESSION['package'];

foreach ($packages as $package) {
  $_SESSION['pid'] = $package->pid;
  $_SESSION['packageName'] = $package->packageName;
  $_SESSION['photoCount'] =  $package->photoCount;
  $_SESSION['videoCount'] =  $package->videoCount;
  $_SESSION['price'] = $package->price;
  $_SESSION["description"] = $package->description;
  $_SESSION['type'] = $package->type;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <title>Update package</title>
</head>

<body>
  <?php require_once './utilities/fetch-types.php' ?>
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
      <li><a href="./package.php">package</a></li>
      <li class="is-active"><a href="#">Update package</a></li>
    </ul>
  </nav>
  <form action="./utilities/update-package.php" method="post" class="m-6">
    <div class="field">
      <label class="label" for="pid">package Id</label>
      <div class="control">
        <input class="input is-success" type="text" name="pid" id="pid" value="<?php echo "$_SESSION[pid]"; ?>" readonly />
      </div>
    </div>
    <div class="field">
      <label class="label" for="pName">Name</label>
      <div class="control">
        <input class="input is-success" type="text" name="packageName" id="packageName" value="<?php echo "$_SESSION[packageName]"; ?>">
      </div>
    </div>
    <div class="field">
      <label class="label" for="photoCount">Photo Count</label>
      <div class="control">
        <input type="number" class="is-success" name="photoCount" id="photoCount" value="<?php echo "$_SESSION[photoCount]"; ?>">
      </div>
    </div>
    <div class="field">
      <label class="label" for="videoCount">Video Count</label>
      <div class="control">
        <input type="number" class="is-success" name="videoCount" id="videoCount" value="<?php echo "$_SESSION[videoCount]"; ?>">
      </div>
    </div>
    <div class="field">
      <label class="label" for="price">Price</label>
      <div class="control">
        <input type="number" class="is-success" name="price" id="price" value="<?php echo "$_SESSION[price]"; ?>">
      </div>
    </div>
    <div class="field">
      <label class="label" for="price">Description</label>
      <div class="control">
        <textarea name="description" id="description" cols="30" rows="3" placeholder="This is Package Description"><?php echo "$_SESSION[description]"; ?></textarea>
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
            foreach ($types as $type) {
              if ($type->type == $_SESSION['type']) {
                echo "<option selected>" . $type->type . "</option>";
              } else {
                echo "<option>" . $type->type . "</option>";
              }
            }
            ?>
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
</body>
<script src="../scripts/navbar.js"></script>
<script src="./scripts/script.js"></script>

</html>