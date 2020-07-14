<?php
require "header.php";

require_once "connection/mysqli_conn.php";
$sql = "SELECT * FROM customer WHERE customerEmail = '" . $userID . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_connect_error($conn));
$rc = mysqli_fetch_assoc($rs);
?>
<!-- content -->
<div class="content">
  <h1>User Profile</h1>
  <div class="card">
    <div class="card-body">

      <?php

      $form = <<<EOD
<form action="includes/updateuser.inc.php" method="POST">
<div class="form-group">
  <label for="email">Email address</label>
  <input type="email" class="form-control" value="%s" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" disabled="disabled">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="fname">First Name</label>
    <input type="text" required class="form-control" value="%s" name="fname" id="fname" placeholder="First Name">
  </div>
  <div class="form-group col-md-6">
    <label for="lname">Last Name</label>
    <input type="text" required class="form-control" value="%s" name="lname" id="lname" placeholder="Last Name">
  </div>
</div>
<div class="form-group">
  <label for="phoneNo">Phone Number</label>
  <input type="text" required pattern="\d*" title="Please only input number" maxlength="8" class="form-control" name="phoneNo" value="%s" id="phoneNo" placeholder="Phone Number">
</div>
<div class="form-group">
  <label for="pwdConfirm">Origin Password</label>
  <input type="password" required class="form-control" id="pwdConfirm" name="originpswd" placeholder="Password">
</div>

<div class="form-group">
  <label for="pswd">Password</label>
  <input type="password" class="form-control" name="pswd" id="pswd" placeholder="Password">
</div>

<input type="submit" class="btn btn-primary" value = "Save Change">
<a href="includes/deleteuser.inc.php"><button class="btn btn-warning animation-on-hover" type="button" >Delete Account</button></a>
</form>
EOD;

      printf(
        $form,
        $rc["customerEmail"],
        $rc["firstName"],
        $rc["lastName"],
        $rc["phoneNumber"]
      );

      if (isset($_GET["error"])) {
        if ($_GET["error"] == "pwNotEqual") {
          echo "<script type='text/javascript'>alert('Update fail: Origin Password Wrong');</script>";
        }
      }
      if (isset($_GET["update"])) {
        if ($_GET["update"] == "success") {
          echo "<script type='text/javascript'>alert('Update Success');</script>";
        }
      }
      ?>

    </div>
  </div>


</div>

<?php
require "footer.php";
?>