<?php

$cid = $_POST["option_value"];
$sql = "SELECT * FROM goods WHERE consignmentStoreID = '" . $cid . "' AND status = 1";
$result = "";
require "../connection/mysqli_conn.php";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
if (mysqli_num_rows($rs) > 0) {
  while ($rc = mysqli_fetch_assoc($rs)) {
    echo "<tr>"
      . "<input type=\"hidden\" name=\"goodsID[]\" value=\"" . $rc["goodsNumber"] . "\"/>"
      . "<td>" . $rc["goodsName"] . "</td>"
      . "<td>" . "$" . $rc["stockPrice"] . "</td>"
      . "<td>" . $rc["remainingStock"] . "</td>"
      . "<td>" . "<input type=\"number\" name=\"goodsQty[]\" class=\"form-control\" value=\"" . 0 . "\" min=\"0\" max=\"" . $rc["remainingStock"] . "\" onchange=\"calculateAmount(this.value, " . $rc['stockPrice'] . ", 'itemTotal" . $rc['goodsNumber'] . "')\" />" . "</td>"
      . "<td>" . "<input type=\"number\"  class=\"form-control\" value=\"0.0\" id=\"itemTotal" . $rc["goodsNumber"] . "\" readonly />" . "</td>"
      . "</tr>";
  }
}
echo '<tr>
<td colspan="4" class="text-right">Total :</td>
<td><input type="number"  name="totalPrice" id="totalPrice" class="form-control" value="0.0" readonly /></td>
</tr>';
