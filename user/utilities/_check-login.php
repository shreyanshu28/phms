<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['Username'])) {
    $_SESSION['Username'] = $_COOKIE['Username'];
    header("location: /ProductionHouse/user/home.php?home=1");
} else {
    if (isset($_POST['submit'])) {
        require_once __DIR__ . "/../../_make-connection.php";

        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];

        // $username = "kushal";
        // $password = "11111111";

        // TODO: Transaction testing remaining
        try {
            $pdo->beginTransaction();
            $sql = "select * from tbllogin where username = :username && password = :password";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["username" => $username, "password" => $password]);
            $pdo->commit();
        } catch (Exception $e) {
            echo "rollback";
            $pdo->rollBack();
        }

        $user = $stmt->fetch();
        $_SESSION['userstring'] = $user->lid;
        echo $user->lid;
        if ($user->lid) {
            setCookie("Username", $_POST["txtUsername"], time() + 60 * 60 * 24 * 7, "/");

            header("location: /ProductionHouse/user/utilities/_check-login.php");

            // $_SESSION["Username"] = $_COOKIE["Username"];

            // if (isset($_COOKIE["Username"])) {
            //     header("location: /home.php?user=${_SESSION['Username']}");
            // }
        } else {
            header("location: /ProductionHouse/user/login.php?no=TRUE");
        }
    }
}
