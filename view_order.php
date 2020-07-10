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
        <!-- sample data -->
        <tr>
          <td class="text-center">1</td>
          <td>2020/01/01</td>
          <td>Delivery</td>
          <td class="text-right">$99,225</td>
          <td class="td-actions text-right">
            <a href="view_order_detail.html"><button type="button" class="btn btn-primary">View Order</button></a>
          </td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td>2020/01/01</td>
          <td>Awaiting</td>
          <td class="text-right">$19,225</td>
          <td class="td-actions text-right">
            <a href="view_order_detail.html"><button type="button" class="btn btn-primary">View Order</button></a>
          </td>
        </tr>
        <tr>
          <td class="text-center">3</td>
          <td>2020/01/01</td>
          <td>Completed</td>
          <td class="text-right">$29,225</td>
          <td class="td-actions text-right">
            <a href="view_order_detail.html"><button type="button" class="btn btn-primary">View Order</button></a>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<?php
require "footer.php";
?>