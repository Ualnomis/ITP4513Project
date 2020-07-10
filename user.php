<?php
require "header.php";
?>
<!-- content -->
<div class="content">
  <h1>User Profile</h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" disabled="disabled">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="First Name">
          </div>
          <div class="form-group col-md-6">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Last Name">
          </div>
        </div>
        <div class="form-group">
          <label for="phoneNo">Phone Number</label>
          <input type="number" class="form-control" id="phoneNo" placeholder="Phone Number">
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" id="pwd" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="pwdConfirm">Confirm Password</label>
          <input type="password" class="form-control" id="pwdConfirm" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Save Change</button>
        <button class="btn btn-warning animation-on-hover" type="button">Delete Account</button>
      </form>
    </div>
  </div>
</div>

<?php
require "footer.php";
?>