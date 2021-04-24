<?php 
ob_start();
include '../shared/head.php';
include '../shared/nav.php';
include '../shared/script.php';

include '../general/test.php';
include '../general/configdb.php';

include '../general/auth_cust.php';             // AUTHENTICATION LOGIN
//include '../general/auth_cust_create_ord.php';  /*=>>> not to use this AUTHENTICATION here =>> cauze it has no value in this page */
include '../general/auth_cust_view_ord.php';    // AUTHENTICATION that meals added





//getting order id from global variable [ $_SESSION] =>>> i criated in [ createord.php ]. [1]
$ordid = $_SESSION['ord'];


// retieve order details from table [ ord_details ]. [2]
$select = "SELECT ord_details.total_m_p as meal_T_p , ord_details.quantity as mealquant , meal.name as mealname FROM  `ord_details` JOIN `meal` on ord_details.meal_id = meal.id WHERE ord_details.ord_id = $ordid ";
$sele = mysqli_query( $conn , $select);




// ===== back homepage =====
if(isset($_GET['back'])){
    $_SESSION['ord'] = NULL;
    $_SESSION['t'] = NULL;
    $ordid = NULL;

    header("location:/restaurant/home/indexe.php");
}


?>





<div class="container col-6 text-center mt-5" >

    <div class='alert alert-info col-6 m-auto' >
        <h4> Order Number: <?php echo $ordid ?> </h4>
    </div>
    
    <table class="table ">
        <tr style="font-size: 22px;">
            <td>meal</td>
            <td>quantity</td>
            <td>total price for a meal</td>
        </tr>
        <?php foreach ($sele as $data){ ?>
        <tr>
            <td><?php echo $data['mealname']; ?></td>      <!-- printing [ mealname ] [ mealquant ] from table [ ord_details ]   [3] --> 
            <td><?php echo $data['mealquant'];?></td>
            <td><?php echo $data['meal_T_p'];?></td>
            
        </tr>
        <?php } ?>
    </table>

                   
    <h4> Total Price = <?php echo  $_SESSION['t']; ?> </h4> <!-- printing price of the order from page [ submitmeals2.php ] [4]-->
  <form method="GET">
        <button class="btn5 mt-3" name="back" type="submit" >  Back to Home Page </button>
  </form>
</div>


<?php ob_end_flush(); ?>