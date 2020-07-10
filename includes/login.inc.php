<?php
if (isset($_POST['login-submit'])) {
  require "../connection/mysqli_conn.php";

  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  $sql = "SELECT * FROM customer WHERE customerEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?error=sqlerror");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $rs = mysqli_stmt_get_result($stmt);
    if ($rc = mysqli_fetch_assoc($rs)) {
      if (strcmp($pwd, $rc['password']) == 0) {
        session_start();
        $_SESSION['userID'] = $rc['customerEmail'];
        $_SESSION['role'] = "customer";
        header("Location: ../dashboard.php");
        exit();
      } else {
        header("Location: ../login.php?error=wrongpwd#login");
        exit();
      }
    } else {
      $sql = "SELECT * FROM tenant WHERE tenantID = ?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
      } else {
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);
        if ($rc = mysqli_fetch_assoc($rs)) {
          if (strcmp($pwd, $rc['password']) == 0) {
            session_start();
            $_SESSION['userID'] = $rc['tenantID'];
            $_SESSION['role'] = "tenant";
            header("Location: ../dashboard.php");
            exit();
          } else {
            header("Location: ../login.php?error=wrongpwd");
            exit();
          }
        } else {
          header("Location: ../login.php?error=nouser");
          exit();
        }
      }
    }
  }
}
