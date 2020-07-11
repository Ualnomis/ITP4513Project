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
        <!-- sample data -->
        <tr>
          <td>1</td>
          <td>1</td>
          <td>Keyboard</td>
          <td>15</td>
          <td class="text-right">$99</td>
          <td class="td-actions text-right">
            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" data-toggle="modal" data-target="#editGoodModal">
              <i class="tim-icons icon-settings"></i>
            </button>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>1</td>
          <td>Mouse</td>
          <td>16</td>
          <td class="text-right">$100</td>
          <td class="td-actions text-right">
            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" data-toggle="modal" data-target="#editGoodModal">
              <i class="tim-icons icon-settings"></i>
            </button>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>1</td>
          <td>FreeHK card</td>
          <td>18</td>
          <td class="text-right">$5</td>
          <td class="td-actions text-right">
            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" data-toggle="modal" data-target="#editGoodModal">
              <i class="tim-icons icon-settings"></i>
            </button>
            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </td>
        </tr>
      </tbody>

    </table>

  </div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGoodModal">Add
    Good</button>

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
              <form action="" method="POST">
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
                  <label for="goodName">Good Name</label>
                  <input type="text" class="form-control" id="addGoodName" placeholder="Enter Good Name" />
                </div>
                <div class="form-group">
                  <label for="qty">Stock Quantity</label>
                  <input type="number" class="form-control" id="addQty" placeholder="Enter Good Name" />
                </div>
                <div class="form-group">
                  <label for="price">Stock Price</label>
                  <input type="number" class="form-control" id="addPrice" placeholder="Enter Good Name" />
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Edit good modal -->

  <div class=" modal modal-black show fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="editGoodModal" aria-hidden="true">
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
              <form action="" method="POST">
                <div class="form-group">
                  <label for="qty">Stock Quantity</label>
                  <input type="number" class="form-control" id="editQty" placeholder="Enter Good Name" />
                </div>
                <div class="form-group">
                  <label for="price">Stock Price</label>
                  <input type="number" class="form-control" id="editPrice" placeholder="Enter Good Name" />
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require "footer.php";
?>