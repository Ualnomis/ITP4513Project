<?php
session_start();
require "../connection/mysqli_conn.php";
$orderID = $_POST["orderID"];

if ($_SESSION["role"] == "tenant") {
  $sql = "DELETE FROM orderitem WHERE orderID = '" . $orderID . "'";
  $rs = mysqli_query($conn, $sql);

  $sql = "DELETE FROM orders WHERE orderID = '" . $orderID . "'";
  $rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
  if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../order_manage.php?delete=success");
  } else {
    header("Location: ../order_manage.php?delete=fail1");
  }
} else {
  header("Location: ../order_manage.php?delete=fail2");
}
