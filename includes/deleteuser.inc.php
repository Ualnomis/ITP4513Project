<?php
session_start();
require "../connection/mysqli_conn.php";


$userID = $_SESSION['userID'];

$sql = "SELECT * FROM orders WHERE customerEmail = '" . $userID . "'";
$rs = mysqli_query($conn, $sql);

if (mysqli_num_rows($rs) > 0) {
  while ($rc = mysqli_fetch_assoc($rs)) {
    $sql = "DELETE FROM orderitem WHERE orderID = '" . $rc['orderID'] . "'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM orders WHERE orderID = '" . $rc['orderID'] . "'";
    mysqli_query($conn, $sql);
  }
}

$sql = "DELETE FROM customer WHERE customerEmail = '" . $_SESSION['userID'] . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
if (mysqli_affected_rows($conn) > 0) {
  header("Location: logout.inc.php");
} else {
  echo $_SESSION['userID'];
  header("Location: logout.inc.php");
}
