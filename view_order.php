<?php
require "header.php";

?>
<!-- content -->
<div class="content">
  <h1>View Order</h1>
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
        <!-- view order data -->
        <?php
        $sql = "SELECT * FROM orders WHERE customerEmail = '" . $userID . "' ORDER BY orders.orderDateTime DESC;";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
          while ($rc = mysqli_fetch_assoc($rs)) {
        ?>
            <tr>
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
                <a href="view_order_detail.php?orderID=<?php echo $rc["orderID"]; ?>"><button type="button" class="btn btn-primary">View Order</button></a>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php

require "footer.php";
?>