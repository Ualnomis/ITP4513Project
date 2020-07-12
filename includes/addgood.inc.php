<?php
session_start();

$goodsName = $_POST['addGoodName'];
$remainingStock = $_POST['addQty'];
$stockPrice = $_POST['addPrice'];
$consignmentStoreID = $_POST["consignmentStoreID"];
require "../connection/mysqli_conn.php";

$sql = "INSERT INTO goods(consignmentStoreID, goodsName, stockPrice, remainingStock, status) "
  . "VALUES ('$consignmentStoreID', '$goodsName', $stockPrice, $remainingStock, 1)";
echo $sql;
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
  echo "OK";
  header("Location: ../good.php?add=success");
} else {
  header("Location: ../good.php?add=fail");
}
