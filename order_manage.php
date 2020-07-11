<?php
require "header.php";
if ($_SESSION["role"] != "tenant") {
  header("Location: dashboard.php");
}


?>
<script>
  function setValue(orderID) {
    document.getElementById("orderID").value = orderID;
    document.forms[0].submit();
  }
</script>

<!-- content -->
<div class="content">
  <h1>Manage Order</h1>
  <div class="card">

    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Order ID</th>

          <th>Order Date</th>
          <th>Status</th>
          <th class="text-right">Total Price</th>
          <th class="text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- sample data -->
        <?php
        $sql = "SELECT orderID, orders.consignmentStoreID, shopID, orderDateTime, status, totalPrice
          FROM consignmentstore, orders
          WHERE consignmentstore.tenantID = '" . $userID . "' AND
                orders.consignmentStoreID = consignmentstore.consignmentStoreID
                ORDER BY orders.orderDateTime DESC;";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
          while ($rc = mysqli_fetch_assoc($rs)) { ?>
            <td class="text-center"><?php echo $rc["orderID"]; ?></td>
            <td><?php echo $rc["orderDateTime"]; ?></td>
            <td>
              <?php
              if ($rc["status"] == 1) {
                echo "Delivery";
              } else if ($rc["status"] == 2) {
                echo "Awaiting";
              } else if ($rc["status"] == 3) {
                echo "Completed";
              }
              ?>
            </td>
            <td class="text-right"><?php echo "$" . $rc["totalPrice"]; ?></td>
            <td class="td-actions text-right">
              <a href="gen_report.php?orderID=<?php echo $rc["orderID"]; ?>"><button type="button" class="btn btn-primary">Generate Report</button></a>
              <button type="button" rel="tooltip" onClick="setValue(<?php echo $rc["orderID"]; ?>)" class="btn btn-danger btn-sm btn-icon">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
    <form action="includes/deleteorder.inc.php" method="POST">
      <input type="hidden" id="orderID" name="orderID" value="" />
    </form>
  </div>
</div>

<?php
require "footer.php";
?>