<?php 
ob_start();
include '../shared/head.php';
include '../shared/nav.php';
include '../shared/script.php';

include '../general/test.php';
include '../general/configdb.php';

include '../general/auth_cust.php';






if (isset($_POST['createord'])){

  // getting customer [ id ] =>> to make order with his [ id ]
  $cust_email = $_SESSION['CUSTOMER'];                
  $select = "SELECT * FROM `customer` WHERE email = '$cust_email' ";
  $s = mysqli_query( $conn , $select );
  $row = mysqli_fetch_assoc($s);
  $cust_id = $row['id'];

  // creating order
  $insert =" INSERT INTO orders VALUES (NULL , $cust_id , 1 , 1 , NULL , NULL  , NULL )";
  $i = mysqli_query( $conn , $insert );

  
  // i can cancel this code here and use it [ submitmeals.php ] page
  // to select [ id ] of last  order created [ last row in  table  ( orders ) ].
  $select = " SELECT * from `orders` ORDER BY id DESC LIMIT 1 ";
  $s = mysqli_query( $conn , $select) ;
  $row = mysqli_fetch_assoc($s);
   $id = $row['id'];          // variable [ $id ] contain value of the order number .
  $_SESSION['ORDID'] = $id;
  header('location:/restaurant/order/submitmeals2.php');
}


 
?>

<div  style="height: 30rem; width: 80%; margin-left: 170px; margin-bottom:200px; margin-top:30px;" >
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
  </ol>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/burger.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/pizza.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/chicken.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/pasta.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/meat.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/cake1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/pancakes.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/cake.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/smoothi.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/coffee.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>



<div class='container col-6 text-center my-5' >
    <h2> Press The Button to Create Your Order </h2>
    <form method="POST">
      <button class="button btn4" name="createord" type="submit" onclick="return confirm('Are You Sure ?')" > Create Order </button>
    </form>
</div>
<div style="height: 80px;"></div>
<?php include '../shared/footer.php';?>

<?php ob_end_flush(); ?>