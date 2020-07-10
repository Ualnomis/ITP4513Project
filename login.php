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
  </div>
  <!-- login and sign up form -->
  <div class="form">

    <ul class="tab-group">
      <li class="tab active"><a href="#signup">Sign Up</a></li>
      <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
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
            <input type="tel" name="phoneNo" maxlength="8" required autocomplete="off">
          </div>

          <input type="submit" name="signup-submit" class="button button-block" value="Sign Up">
        </form>

      </div>

      <div id="login">
        <h1>Welcome Back!</h1>

        <form action="home.html" method="post">

          <div class="field-wrap">
            <label>
              Email Address / Tenant ID<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" />
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <input type="submit" class="button button-block" value="Log In" />

        </form>

      </div>
    </div>
  </div> <!-- /form -->
  <!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>