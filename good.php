<?php


require "header.php";


?>

<!-- content -->
<div class="content">
  <h1>Manage Good</h1>
  <div class="card">
    <table class="table">
      <thead>
        <tr>
          <th>Goods ID</th>
          <th>Consignment Store ID</th>
          <th>Goods Name</th>
          <th>Stock Quantity</th>
          <th class="text-right">Stock Price</th>
          <th class="text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT goods.consignmentStoreID, goodsNumber, goodsName, stockPrice, remainingStock, status
        FROM consignmentstore, goods
        WHERE consignmentstore.tenantID = '" . $userID . "' AND
              goods.consignmentStoreID = consignmentstore.consignmentStoreID AND
              goods.status = 1
              ;";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
          while ($rc = mysqli_fetch_assoc($rs)) {
        ?>
            <!-- sample data -->
            <tr>
              <td><?php echo $rc["goodsNumber"]; ?></td>
              <td><?php echo $rc["consignmentStoreID"]; ?></td>
              <td><?php echo $rc["goodsName"]; ?></td>
              <td><?php echo $rc["remainingStock"]; ?></td>
              <td class="text-right"><?php echo "$" . $rc["stockPrice"]; ?></td>
              <form action="includes/deletegood.inc.php" method="POST">
                <td class="td-actions text-right">
                  <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" data-toggle="modal" data-target="#editGoodModal<?php echo $rc["goodsNumber"]; ?>">
                    <i class="tim-icons icon-settings"></i>
                  </button>
                  <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <input type="hidden" id="deletegoods" name="deletegoodsNumber" value="<?php echo $rc["goodsNumber"]; ?>" />
                </td>
              </form>
            </tr>

            <!-- Edit good modal -->
            <div class=" modal modal-black show fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="editGoodModal<?php echo $rc["goodsNumber"]; ?>" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editGood">Edit Good</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="tim-icons icon-simple-remove"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card">
                      <div class="card-body">
                        <form action="includes/updategood.inc.php" method="POST">
                          <div class="form-group">
                            <label for="qty">Stock Quantity</label>
                            <input type="number" step="any" value="<?php echo $rc["remainingStock"]; ?>" class="form-control" id="editQty" name="editQty" placeholder="Enter Good Name" />
                          </div>
                          <div class="form-group">
                            <label for="price">Stock Price</label>
                            <input type="number" step="any" value="<?php echo $rc["stockPrice"]; ?>" class="form-control" id="editPrice" name="editPrice" placeholder="Enter Good Name" />
                          </div>
                          <button type="submit" class="btn btn-primary">Edit</button>
                          <input type="hidden" id="goodsNumber" name="goodsNumber" value="<?php echo $rc["goodsNumber"]; ?>" />
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGoodModal">Add
    Good</button>
</div>



<!-- Add Good modal -->
<div class=" modal modal-black show fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="addGoodModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGood">Add Good</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form action="includes/addgood.inc.php" method="POST">
              <div class="form-group">
                <label for="cidSelector">Consignment Store ID</label>
                <select class="form-control" name="consignmentStoreID" id="cidSelector">
                  <?php
                  $sql = "SELECT * FROM consignmentstore WHERE tenantID='" . $userID . "'";
                  $rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
                  if (mysqli_num_rows($rs) > 0) {
                    while ($rc = mysqli_fetch_assoc($rs)) {
                      printf("<option>%s</option>", $rc["consignmentStoreID"]);
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="goodName">Good Name</label>
                <input type="text" class="form-control" name="addGoodName" id="addGoodName" placeholder="Enter Good Name" />
              </div>
              <div class="form-group">
                <label for="qty">Stock Quantity</label>
                <input type="number" class="form-control" name="addQty" id="addQty" placeholder="Enter Good Name" />
              </div>
              <div class="form-group">
                <label for="price">Stock Price</label>
                <input type="number" step="any" class="form-control" name="addPrice" id="addPrice" placeholder="Enter Good Name" />
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php
require "footer.php";
?>