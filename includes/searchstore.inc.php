<?php

$shopID = $_POST["option_value"];
$sql = "SELECT * FROM consignmentstore_shop WHERE shopID = '" . $shopID . "'";
$result = "";
require "../connection/mysqli_conn.php";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
if (mysqli_num_rows($rs) > 0) {
  $count = 0;
  while ($rc = mysqli_fetch_assoc($rs)) {
    $result .= "<option value=" . $rc["consignmentStoreID"] . ">" . $rc["consignmentStoreID"] . "</option>";
  }
}
echo $result;
