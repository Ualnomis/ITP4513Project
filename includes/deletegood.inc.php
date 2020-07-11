<?php
session_start();

$goodsNumber = $_POST['deletegoodsNumber'];

require "../connection/mysqli_conn.php";

$sql = "UPDATE goods SET status = 2 WHERE goodsNumber = $goodsNumber";
echo $sql;
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
  echo "OK";
  header("Location: ../good.php?update=success");
}
