<?php
session_start();
require "../connection/mysqli_conn.php";

$userID = $_SESSION['userID'];
$goodsID = $_POST['goodsID'];
$goodsQty = $_POST['goodsQty'];
$totalPrice = $_POST['totalPrice'];
$shopID = $_POST["shopidSelector"];
$consignmentStoreID = $_POST["cidSelector"];
$date = date('Y-m-d H:i:s');
if ($totalPrice > 0) {
  $sql = "INSERT INTO orders(customerEmail, consignmentStoreID, shopID, orderDateTime, status, totalPrice) VALUES ('$userID', $consignmentStoreID,$shopID,'$date', 1,$totalPrice)";

  if (mysqli_query($conn, $sql)) {
    $lastOrderID = mysqli_insert_id($conn);
  } else {
  }

  foreach ($goodsID as $key => $value) {
    if ($goodsQty[$key] > 0) {
      $sql = "UPDATE goods SET remainingStock = remainingStock - $goodsQty[$key] WHERE goodsNumber = $goodsID[$key]";
      echo $sql . "<br>";
      $rs = mysqli_query($conn, $sql);
      if (mysqli_affected_rows($conn) > 0) {
        $sql1 = "SELECT * FROM goods WHERE goodsNumber = $goodsID[$key]";
        echo $sql1 . "<br>";
        $rs1 = mysqli_query($conn, $sql1);
        $rc = mysqli_fetch_assoc($rs1);
        $sql = "INSERT INTO orderitem (orderID, goodsNumber, quantity, sellingPrice) VALUES ($lastOrderID,  $goodsID[$key], $goodsQty[$key], " . $rc['stockPrice'] . ")";
        $rs = mysqli_query($conn, $sql);
        $rc = mysqli_fetch_assoc($rs);
        echo $sql . "<br>";
        header("Location: ../view_order.php");
      }
    }
  }
} else {
  header("Location: ../buy_product.php?error=orderfail2");
}
