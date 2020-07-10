<?php
if (isset($_POST['signup-submit'])) {
  require "../connection/mysqli_conn.php";

  $fname = $_POST['fname'];

  $lname = $_POST['lname'];
  $email = $_POST['email'];
  echo $email;
  $password = $_POST['password'];
  $phoneNo = $_POST['phoneNo'];

  $sql = "SELECT customerEmail FROM customer WHERE customerEmail = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?error=sqlerror1");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
      header("Location: ../login.php?error=usertaken");
      exit();
    } else {
      $sql = "INSERT INTO customer(customerEmail, firstName, lastName, " . 'password' . ", phoneNumber) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror2");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "sssss", $email, $fname, $lname, $password, $phoneNo);
        mysqli_stmt_execute($stmt);
        header("Location: ../login.php?signup=success");
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../login.php");
  exit();
}
