<?php

ob_start();
session_start();

if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header('location:/restaurant/home/indexe.php');
}

//print_r($_SESSION);

?>
<?php include '../shared/head.php';?>
  

<nav class="navbar navbar-expand-lg navbar-light ">

  <a class="navbar-brand" href="/restaurant/home/indexe.php">
    <img src="/restaurant/img/logo2.png" width="40" height="40" class="d-inline-block align-top" alt="">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link " href="/restaurant/home/indexe.php">Home <span class="sr-only">(current)</span></a>
      </li>


            <!-- AUTHENTICATION for admin -->
      <?php if (isset($_SESSION['admin'])): ?>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          chef&ship
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/restaurant/chef/createchef.php" style="color:black !important">create chef</a>
          <a class="dropdown-item" href="/restaurant/shipper/createship.php" style="color:black !important">create shipper</a>

          <a class="dropdown-item" href="/restaurant/chef/listchef.php" style="color:black !important">list chef</a>
          <a class="dropdown-item" href="/restaurant/shipper/listship.php" style="color:black !important">list shipper</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Meal&cat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/restaurant/meals/createmeal.php" style="color:black !important">create meal</a>
          <a class="dropdown-item" href="/restaurant/category/createcat.php" style="color:black !important">create category</a>

          <a class="dropdown-item" href="/restaurant/meals/listmeal.php" style="color:black !important">list meal</a>
          <a class="dropdown-item" href="/restaurant/category/listcat.php" style="color:black !important">list category</a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          order
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!--
          <a class="dropdown-item" href="/restaurant/order/createord1.php" style="color:black !important">create order</a>
          <a class="dropdown-item" href="/restaurant/order/submitmeals2.php" style="color:black !important">submit order</a>
          <a class="dropdown-item" href="/restaurant/order/vieword3.php" style="color:black !important">view order</a>
        -->
          <a class="dropdown-item" href="/restaurant/orddetails/listord.php" style="color:black !important">list ord</a>
          <a class="dropdown-item" href="/restaurant/orddetails/orddetails.php" style="color:black !important"> ord det </a>
          <a class="dropdown-item" href="/restaurant/orddetails/detforship.php" style="color:black !important"> details for shipper </a>
          <a class="dropdown-item" href="/restaurant/orddetails/detforadmin.php" style="color:black !important"> details for admin </a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          customer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/restaurant/customer/listcust.php" style="color:black !important">list customer</a>
          <a class="dropdown-item" href="/restaurant/feedback/showfeed.php" style="color:black !important"> list feed </a>

        </div>
      </li>

    </ul>


        <!-- logout for admin -->
    <form class="form-inline my-2 my-lg-0">
      <button type="submit" name="logout" class="button btn2 mr-3" > LogOut </button>
    </form>
            <?php else: ?>

  </div>

  <!-- logout for customer -->
            <?php if (isset($_SESSION['CUSTOMER'])): ?>

    <form class="form-inline my-2 my-lg-0">
      <button type="submit" name="logout" class="button btn2 mr-3" > LogOut </button>
    </form>

            <?php else: ?>

    <form class=" form-inline my-2 my-lg-0">
      <li class="nav-item dropdown mr-3" style="list-style-type: none;"><a href="/restaurant/admin/logincust.php" class="button btn1"> LogIn </a></li>
    </form>

    <form class=" form-inline my-2 my-lg-0">
      <li class="nav-item dropdown mr-3" style="list-style-type: none;"><a href="/restaurant/customer/createcust.php" class="button btn2"> SignUp </a></li>
    </form>
            <?php endif; ?>

            <form class=" form-inline my-2 my-lg-0 ">
    <li class="nav-item dropdown " style="list-style-type: none;"><a href="/restaurant/feedback/feedback.php" class="button btn3"> FeedBack </a></li>
            </form>

    <?php endif; ?>
</nav>

<?php ob_end_flush();  ?>
<?php include'../shared/script.php';?>