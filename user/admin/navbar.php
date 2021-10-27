<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <title>Document</title>
</head>

<body>
  <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
    <div class="navbar-brand">
      <a href="../../index.php" class="navbar-item">
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
        <a href="../home.php" class="navbar-item">Home</a>
        <a href="../../inventory/inventory.php" class="navbar-item">Inventory</a>
        <a href="../../package/package.php">packages</a>
        <a href="../view-user.php" class="navbar-item">Users</a>
        <a href="./../../inventory/deleted-inventory.php" class="navbar-item">Restore Products</a>
        <a href="../login.php" class="navbar-item button is-danger">Log Out</a>
      </div>
    </div>
  </nav>
  <script src="../../scripts/navbar.js"></script>
</body>

</html>