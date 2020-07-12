<?php
session_start();

$userID = $_SESSION['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNo = $_POST['phoneNo'];
$pswd = $_POST["pswd"];
$originpswd = $_POST['originpswd'];

require "../connection/mysqli_conn.php";
$sql = $sql = "SELECT password FROM customer WHERE customerEmail = '$userID'";
$rs = mysqli_query($conn, $sql);
$rc = mysqli_fetch_assoc($rs);
if ($originpswd == $rc["password"]) {
  $sql = "UPDATE customer SET firstName='$fname', lastName='$lname', phoneNumber='$phoneNo', password='$pswd' WHERE customerEmail = '$userID'";
  mysqli_query($conn, $sql);
  header("Location: ../user.php?update=success");
} else {
  header("Location: ../user.php?error=pwNotEqual");
}
