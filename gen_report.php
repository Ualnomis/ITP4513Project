<?php
require "header.php";
$orderID = $_GET['orderID'];
$sql = "SELECT * FROM orders WHERE orderID = '" . $orderID . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
$rc = mysqli_fetch_assoc($rs);
$shopID = $rc['shopID'];
$customerEmail = $rc["customerEmail"];
$consignmentStoreID = $rc["consignmentStoreID"];
$orderDateTime = $rc["orderDateTime"];
$status = $rc["status"];

$sql = "SELECT * FROM customer WHERE customerEmail = '" . $customerEmail . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
$rc = mysqli_fetch_assoc($rs);
$customerName = $rc["lastName"] . $rc["firstName"];

$sql = "SELECT * FROM shop WHERE shopID = $shopID";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
$rc = mysqli_fetch_assoc($rs);
$address = $rc["address"];

$sql = "SELECT * FROM consignmentstore WHERE consignmentStoreID = $consignmentStoreID";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
$rc = mysqli_fetch_assoc($rs);
$shopName = $rc["ConsignmentStoreName"];


?>

<!-- content -->
<div class="content">
  <div class="card">
    <h1 class="card-title">Order Report</h1>
    <label style="font-size:1vw">Order ID: <?php echo $orderID; ?></label>
    <label style="font-size:1vw">Order Date: <?php echo $orderDateTime; ?></label>
    <label style="font-size:1vw">Customer Email: <?php echo $customerEmail; ?></label>
    <label style="font-size:1vw">Customer Name: <?php echo $customerName; ?></label>
    <label style="font-size:1vw">Shop's Address: <?php echo $address; ?></label>
    <label style="font-size:1vw">Status: <?php if ($status == 1) {
                                            echo "Delivery";
                                          } else if ($status == 2) {
                                            echo "Awaiting";
                                          } else if ($status == 3) {
                                            echo "Completed";
                                          } ?></label>
    <br />
    <table class="table">
      <thead>
        <tr>
          <th class>Product ID</th>
          <th>Product Name</th>
          <th>Selling Price</th>
          <th>Qty Require</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <!-- order item data -->
        <?php
        $sql = "SELECT * FROM orderitem WHERE orderID = $orderID";
        $rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
        $totalPrice = 0;
        while ($rc = mysqli_fetch_assoc($rs)) {
          $sqlgoods = "SELECT * FROM goods WHERE goodsNumber =" . $rc['goodsNumber'];
          $result = mysqli_query($conn, $sqlgoods) or die(mysqli_connect_error($conn));
          $rcgoods = mysqli_fetch_assoc($result);
        ?>
          <tr>
            <td><?php echo $rc["goodsNumber"]; ?></td>
            <td><?php echo $rcgoods["goodsName"]; ?></td>
            <td><?php echo $rcgoods["stockPrice"]; ?></td>
            <td><?php echo $rc["quantity"]; ?></td>
            <td><?php echo $rc["sellingPrice"] * $rc["quantity"]; ?></td>
          </tr>
        <?php
          $totalPrice += $rc["sellingPrice"] * $rc["quantity"];
        }
        ?>
        <tr>
          <td colspan="4" class="text-right">Total : </td>
          <td><?php echo $totalPrice; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <a href="order_manage.php"><button type="button" class="btn btn-primary">back</button></a>
</div>

<?php
require "footer.php";
?>