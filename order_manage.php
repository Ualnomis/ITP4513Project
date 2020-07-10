<?php
require "header.php";
?>
<!-- content -->
<div class="content">
  <h1>Manage Order</h1>
  <div class="card">
    <div class="form-row">
      <div class="form-group col-md-4">
        <input type="date" class="form-control" id="startDate">
      </div>
      <div class="form-group col-md-4">
        <input type="date" class="form-control" id="endDate">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </div>


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

          <td>2020/01/03</td>
          <td>Delivery</td>
          <td class="text-right">$99,225</td>
          <td class="td-actions text-right">
            <a href="gen_report.html"><button type="button" class="btn btn-primary">Generate Report</button></a>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td class="text-center">2</td>

          <td>2020/01/02</td>
          <td>Awaiting</td>
          <td class="text-right">$19,225</td>
          <td class="td-actions text-right">
            <a href="gen_report.html"><button type="button" class="btn btn-primary">Generate Report</button></a>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td class="text-center">3</td>

          <td>2020/01/01</td>
          <td>Completed</td>
          <td class="text-right">$29,225</td>
          <td class="td-actions text-right">
            <a href="gen_report.html"><button type="button" class="btn btn-primary">Generate Report</button></a>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
require "footer.php";
?>