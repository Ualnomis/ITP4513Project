<?php
require "header.php";

$shopIDD;
$cid;
?>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      cache: false
    });
    load_consignmentstore_shop();
    load_consignmentstore_product();
    // everything here will be executed once index.html has finished loading, so at the start when the user is yet to do anything.
    $("#shopidSelector").load(load_consignmentstore_shop());
    $("#shopidSelector").change(load_consignmentstore_shop()); //this translates to: "when the element with id='select1' changes its value execute load_new_content() function"
    $("#cidSelector").change(load_consignmentstore_shop());
  });

  function load_consignmentstore_shop() {
    var selected_option_value = $("#shopidSelector option:selected").val(); //get the value of the current selected option.

    $.post("includes/searchstore.inc.php", {
        option_value: selected_option_value
      },
      function(data) { //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
        $("#cidSelector").html(data);
        load_consignmentstore_product();
        // alert(data); //just to see what it returns
      }
    );
  }

  function load_consignmentstore_product() {
    var selected_option_value = $("#cidSelector option:selected").val(); //get the value of the current selected option.

    $.post("includes/loadProduct.inc.php", {
        option_value: selected_option_value
      },
      function(data) { //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
        $("#tbodyProduct").html(data);
        // alert(data); //just to see what it returns
      }
    );
  }
</script>

<script>
  function calculateAmount(val, price, id) {
    var divobj = document.getElementById(id);
    var originValue = parseFloat(divobj.value);

    var tot_price = val * price;
    /*display the result*/

    if (originValue >= tot_price) {
      calculateTotal((originValue - tot_price), 1);
    } else {
      calculateTotal((tot_price - originValue), 0);
    }
    divobj.value = tot_price;
  }

  function calculateTotal(price, change) {
    var divobj = document.getElementById('totalPrice');
    /*display the result*/
    if (change == 0) {
      totalprice = parseFloat(divobj.value) + price;
      divobj.value = totalprice;
    } else {
      totalprice = parseFloat(divobj.value) - price;
      divobj.value = totalprice;
    }
  }
</script>

<!-- content -->
<div class="content">
  <h1>Order Goods</h1>
  <div class="card">
    <form action="includes/orderproduct.inc.php" method="POST">
      <div class="form-group">
        <label for="shopidSelector">Shop ID</label>
        <select class="form-control" id="shopidSelector" name="shopidSelector" onchange="load_consignmentstore_shop()" onload="load_consignmentstore_shop()">
          <?php
          $sql = "SELECT * FROM shop";
          $rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
          if (mysqli_num_rows($rs) > 0) {
            $count = 0;
            while ($rc = mysqli_fetch_assoc($rs)) {
              if ($count == 0) {
                $shopIDD = $rc["shopID"];
                $count++;
              }
              printf("<option value=" .  $rc["shopID"] . ">%s (%s)</option>", $rc["shopID"], $rc["address"]);
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="cidSelector">Consignment Store ID</label>
        <select class="form-control" id="cidSelector" name="cidSelector" onchange="load_consignmentstore_product()">
          <?php
          $sql = "SELECT * FROM consignmentstore_shop WHERE shopID = '" . $shopIDD . "'";
          $rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
          if (mysqli_num_rows($rs) > 0) {
            $count = 0;
            while ($rc = mysqli_fetch_assoc($rs)) {
              if ($count == 0) {
                $cID = $rc["consignmentStoreID"];
                $count++;
              }
              $sql1 = "SELECT * FROM consignmentstore WHERE consignmentStoreID = " . $rc["consignmentStoreID"];
              $rs1 = mysqli_query($conn, $sql1) or die(mysqli_connect_error($conn));
              $rc1 = mysqli_fetch_assoc($rs1);
              echo "<option value=" . $rc["consignmentStoreID"] . ">" . $rc["consignmentStoreID"] . " (" . $rc1["ConsignmentStoreName"] . ")" . "</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Good Name</th>
              <th>Price</th>
              <th>Qty available</th>
              <th>Qty Require</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="tbodyProduct">
            <!-- sample data -->
            <?php
            $sql = "SELECT * FROM goods WHERE consignmentStoreID = '" . $cID . "' AND status=1";
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
            ?>
            <tr>
              <td colspan="4" class="text-right">Total :</td>
              <td><input type="number" id="totalPrice" name="totalPrice" class="form-control" value="0.0" readonly /></td>
            </tr>
          </tbody>
        </table>
      </div>
      <button type="submit" class="btn btn-primary">Order</button>
    </form>
  </div>
</div>
<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == "orderfail2") {
    echo "<script type='text/javascript'>alert('Please order at lease 1 goods');</script>";
  }
}
?>

<?php
require "footer.php";
?>