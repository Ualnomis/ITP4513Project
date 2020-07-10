<?php
require "header.php";
?>
<!-- content -->
<div class="content">
  <h1 class="card-title">Order</h1>
  <div class="card">
    <label>Order ID: 1</label>
    <label>Order Date: 2020-01-01 15:00AM</label>
    <label>Shop Name: abc shop</label>
    <label>Shop's Address: Hong Kong</label>
    <label>Status: Delivery</label>
    <br />
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Product</th>
          <th>Prict</th>
          <th>Qty available</th>
          <th>Qty Require</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <!-- sample data -->
        <tr>
          <td>Apple</td>
          <td>$5.0</td>
          <td>50</td>
          <td>3</td>
          <td>$15.0</td>
        </tr>
        <tr>
          <td>Orange</td>
          <td>$10.0</td>
          <td>50</td>
          <td>5</td>
          <td>$50.0</td>
        </tr>
        <tr>
          <td colspan="4" class="text-right">Total :</td>
          <td>$65.0</td>
        </tr>
      </tbody>
    </table>
  </div>
  <a href="view_order.html"><button type="button" class="btn btn-primary">Back</button></a>
</div>
<?php
require "footer.php"
?>