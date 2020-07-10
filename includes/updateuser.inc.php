<?php
session_start();

$userID = $_SESSION['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNo = $_POST['phoneNo'];
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwdConfirm'];

require "../connection/mysqli_conn.php";

$sql = "UPDATE customer SET firstName='$fname', lastName='$lname', phoneNumber='$phoneNo', password='$pwd'";
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
  echo "OK";
  header("Location: ../user.php");
}
