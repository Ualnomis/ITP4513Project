<?php
session_start();

$userID = $_SESSION['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNo = $_POST['phoneNo'];
$pswd = $_POST["pswd"];
$pswdConfirm = $_POST['pswdConfirm'];

require "../connection/mysqli_conn.php";

$sql = "UPDATE customer SET firstName='$fname', lastName='$lname', phoneNumber='$phoneNo', password='$pswd' WHERE customerEmail = '$userID'";
echo $sql;
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
  echo "OK";
  header("Location: ../user.php?update=success");
}
