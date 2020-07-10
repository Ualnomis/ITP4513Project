<?php
session_start();
require "../connection/mysqli_conn.php";


$sql = "DELETE FROM customer WHERE customerEmail = '" . $_SESSION['userID'] . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
if (mysqli_affected_rows($conn) > 0) {
  header("Location: logout.inc.php");
} else {
  echo $_SESSION['userID'];
  header("Location: logout.inc.php");
}
