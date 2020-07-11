<?php
session_start();

$goodsNumber = $_POST['goodsNumber'];
$editQty = $_POST['editQty'];
$editPrice = $_POST['editPrice'];

require "../connection/mysqli_conn.php";

$sql = "UPDATE goods SET stockPrice='$editPrice', remainingStock='$editQty' WHERE goodsNumber = '$goodsNumber'";
echo $sql;
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
  echo "OK";
  header("Location: ../good.php?update=success");
}
