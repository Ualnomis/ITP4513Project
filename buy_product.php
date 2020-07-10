<?php
require "header.php";
?>

<!-- content -->
<div class="content">
  <h1>Order Goods</h1>
  <div class="card">
    <form action="" method="POST">
      <div class="form-group">
        <label for="shopidSelector">Shop ID</label>
        <select class="form-control" id="shopidSelector">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cidSelector">Consignment Store ID</label>
        <select class="form-control" id="cidSelector">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
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
              <td>$5</td>
              <td>50</td>
              <td><input type="number" class="form-control" value="3" /></td>
              <td><input type="number" class="form-control" value="15.0" readonly /></td>
            </tr>
            <tr>
              <td>Orange</td>
              <td>$10</td>
              <td>50</td>
              <td><input type="number" class="form-control" value="5" /></td>
              <td><input type="number" class="form-control" value="50.0" readonly /></td>
            </tr>
            <tr>
              <td>Shoe</td>
              <td>$100</td>
              <td>30</td>
              <td><input type="number" class="form-control" value="0" /></td>
              <td><input type="number" class="form-control" value="0.0" readonly /></td>
            </tr>
            <tr>
              <td>Cube</td>
              <td>$100</td>
              <td>300</td>
              <td><input class="form-control" type="number" value="0" /></td>
              <td><input type="number" class="form-control" value="0.0" readonly></td>
            </tr>
            <tr>
              <td>iPhone</td>
              <td>$10000</td>
              <td>3</td>
              <td><input class="form-control" type="number" value="0" /></td>
              <td><input type="number" class="form-control" value="0.0" readonly /></td>
            </tr>
            <tr>
              <td colspan="4" class="text-right">Total :</td>
              <td><input type="number" class="form-control" value="65.0" readonly /></td>
            </tr>
          </tbody>
        </table>
      </div>
      <button type="submit" class="btn btn-primary">Order</button>
    </form>
  </div>
</div>


<?php
require "footer.php";
?>