<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['UserInfo'])) {
    $user = explode(",", $_COOKIE['UserInfo'], strlen($_COOKIE["UserInfo"]));
    $_SESSION["Email"] = $user[0];
    $_SESSION["Role"] = $user[1];
    header("location: /ProductionHouse/user/home.php");
} else {
    if (isset($_POST['submit'])) {
        require_once __DIR__ . "/../../_make-connection.php";

        $username = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];

        $sql = "SELECT password, role FROM tblUserMaster WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["email" => $username]);
        $user = $stmt->fetch();
        $verify_password = password_verify($_POST["txtPassword"], $hash_pass->password);

        // TODO: Transaction testing remaining
        try {
            $pdo->beginTransaction();
            $sql = "SELECT password, role FROM tblUserMaster WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["email" => $username]);
            $pdo->commit();
        } catch (Exception $e) {
            echo "rollback";
            $pdo->rollBack();
        }
        $user = $stmt->fetch();
        $verify_password = password_verify($_POST["txtPassword"], $user->password);

        $userInfo = $_POST["txtEmail"] . "," . $user->role;
        if ($verify_password) {
            $_SESSION["userId"] = $user->uid;
            if (isset($_POST['RememberMe'])) {
                setCookie("UserInfo", $userInfo, time() + 60 * 60 * 24 * 7, "/");
                header("location: /ProductionHouse/user/utilities/_check-login.php");
            }
            $_SESSION["Email"] = $_POST["txtEmail"];
            $_SESSION["Role"] = $user->role;
            header("location: /ProductionHouse/user/home.php");
        } else {
            header("location: /ProductionHouse/user/login.php?error=1");
        }
    }
}
