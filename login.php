<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hong Kong Cube Shop Management System</title>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="assets/css/indexstyle.css">

</head>

<body>
  <!-- logo of the web site -->
  <div class="logo">
    <a href="index.html">
      <h1>Hong Kong Cube Shop Management System</h1>
    </a>
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "usertaken") {
        echo "<h1 style=\"color: red\">Email have been registed</h1>";
      } else if ($_GET['error'] == "nouser") {
        echo "<h1 style=\"color: red\">Account No Exist</h1>";
      } else if ($_GET['error'] == "wrongpwd") {
        echo "<h1 style=\"color: red\">Account / Password Wrong</h1>";
      }
    }
    if (isset($_GET['signup'])) {
      if ($_GET['signup'] == "success") {
        echo "<h1 style=\"color: green\">Sign Up Success</h1>";
      }
    }
    ?>
  </div>
  <!-- login and sign up form -->
  <div class="form">

    <ul class="tab-group">
      <li class="tab active"><a href="#signup">Sign Up</a></li>
      <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
      <!-- sign up form -->
      <div id="signup">
        <h1>Sign Up for Free</h1>
        <form action="includes/signup.inc.php" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" maxlength="255" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" maxlength="255" required autocomplete="off" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" maxlength="50" required autocomplete="off">
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" maxlength="50" name="password" required autocomplete="off">
          </div>

          <div class="field-wrap">
            <label>
              Phone Number<span class="req">*</span>
            </label>
            <input type="text" pattern="\d*" title="Please only input number" name="phoneNo" maxlength="8" required>
          </div>

          <input type="submit" name="signup-submit" class="button button-block" value="Sign Up">
        </form>

      </div>

      <!-- login form -->
      <div id="login">
        <h1>Welcome Back!</h1>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "wrongpwd") {
          }
        }


        ?>
        <form action="includes/login.inc.php" method="post">

          <div class="field-wrap">
            <label>
              Email Address / Tenant ID<span class="req">*</span>
            </label>
            <input type="text" name="uid" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pwd" required autocomplete="off" />
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <input type="submit" name="login-submit" class="button button-block" value="Log In" />

        </form>

      </div>

    </div>
  </div>
  <!-- /form -->

  <!-- partial -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>