<?php
session_start();
if ($_SESSION) {
  $userID =  $_SESSION['userID'];
  $role = $_SESSION["role"];
} else {
  header("Location: login.php");
}

require "connection/mysqli_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Hong Kong Cube Shop
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- BootStrip CSS Files -->
  <link href="./assets/css/black-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="dashboard.php" class="simple-text logo-mini">
            CS
          </a>
          <a href="dashboard.php" class="simple-text logo-normal">
            Cube Shop
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="dashboard.php">
              <i class="fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <?php
          if ($_SESSION["role"] == "customer") {
          ?>
            <li>
              <a href="buy_product.php">
                <i class="fas fa-shopping-cart"></i>
                <p>Order</p>
              </a>
            </li>
            <li>
              <a href="view_order.php">
                <i class="fas fa-receipt"></i>
                <p>View Order</p>
              </a>
            </li>
            <li>
              <a href="user.php">
                <i class="fas fa-user"></i>
                <p>User Profile</p>
              </a>
            </li>
          <?php
          }
          ?>
          <?php
          if ($_SESSION["role"] == "tenant") {
          ?>
            <li>
              <a href="good.php">
                <i class="fab fa-product-hunt"></i>
                <p>Good Manage</p>
              </a>
            </li>
            <li>
              <a href="order_manage.php">
                <i class="fas fa-receipt"></i>
                <p>Order Manage</p>
              </a>
            </li>
          <?php
          }
          ?>

        </ul>
      </div>
    </div>


    <div class="main-panel">


      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="dashboard.php">Hong Kong Cube Shop</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">


              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="./assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <?php
                  if ($_SESSION["role"] == "customer") {
                  ?>
                    <li class="nav-link"><a href="user.php" class="nav-item dropdown-item">Profile</a></li>
                  <?php
                  }
                  ?>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="includes/logout.inc.php" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->