<?php

$shopID = $_POST["option_value"];
$sql = "SELECT * FROM consignmentstore_shop WHERE shopID = '" . $shopID . "'";
$result = "";
require "../connection/mysqli_conn.php";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
if (mysqli_num_rows($rs) > 0) {
  $count = 0;
  while ($rc = mysqli_fetch_assoc($rs)) {
    $sql1 = "SELECT * FROM consignmentstore WHERE consignmentStoreID = " . $rc["consignmentStoreID"];
    $rs1 = mysqli_query($conn, $sql1) or die(mysqli_connect_error($conn));
    $rc1 = mysqli_fetch_assoc($rs1);
    $result .= "<option value=" . $rc["consignmentStoreID"] . ">" . $rc["consignmentStoreID"] . " (" . $rc1["ConsignmentStoreName"] . ")" . "</option>";
  }
}
echo $result;
