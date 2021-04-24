<?php 
ob_start();

 include '../shared/head.php'; 
 include '../shared/nav.php'; 
 include '../shared/script.php'; 

 include '../general/configdb.php'; 
 include '../general/test.php'; 
 include '../general/auth_cust.php';    // AUTHENTICATION LOGIN
 include '../general/auth_cust_create_ord.php'; // AUTHENTICATION CREATE ORDER
 

 //testmessage( $conn , "connection"); 


 
 // === getting [ order id ] from global variable ===
 $ordid = $_SESSION['ORDID'];
 //echo $ordid;


// ====== table category ===[1]
$select = "SELECT * FROM `category` ";
$se = mysqli_query( $conn , $select);           // to use in the select down 



// getting data from the form and sending it to table [ order details ]
if(isset($_POST['add'])){

        $meal = $_POST['mel'];          // getting data from the form [ meal selected ]
        $quantity = $_POST['quant'];    // getting data from the form [ quantity selected]
 
        // getting meal price from table [ meal ] which customer selected to put it in table [ order details ] =>> timing [ quantity ]
        $price = " SELECT * FROM `meal` WHERE id = $meal ";     // $melid['id'] =>> from second [foreach] down.
        $pri = mysqli_query( $conn , $price);
        $pr = mysqli_fetch_assoc($pri);
        $p = $pr['unitprice'];        //[ $p ] =>> represent price of meal from table meal =>> when customer selected meal.
        
        // calculating total price of [ meal ] with it's [ quantity ] =>> one row
        $total_p = $p * $quantity ;

        // inserting data into [ ord_details ]
        $insert = " INSERT INTO `ord_details` VALUES ( $ordid , $meal , $quantity , $total_p )";
        $i = mysqli_query( $conn , $insert );
}



// confirm and calculating total price of order in table [ orders ]
if(isset($_POST['conf'])){
        
        $address = $_POST['address'];
        // calculating total price from table [ ord_details ] using aggregate function [ sum ]
        $select = " SELECT SUM(total_m_p) AS `totalprice` FROM `ord_details` WHERE ord_id = $ordid ";
        $s = mysqli_query( $conn , $select);
        $total = mysqli_fetch_assoc($s);
        $total_p = $total['totalprice'];

        $_SESSION['t'] = $total_p;   // to use in page [ vieword3.php ] to print totalprice to customer

        $update = "UPDATE  `orders`  SET  total_p = $total_p , confirm = 'confirmed' , place = '$address'  WHERE id = $ordid ";
        $u = mysqli_query( $conn , $update);


        


        // once clicking on [ confirm order ] =>> session is null =>> [ $ordid] is null =>> going to header with new session contain [ order id ]
        $_SESSION['ORDID'] = NULL ;
        $_SESSION['ord'] = $ordid ;
        $ordid = NULL;
        
        header("location:/restaurant/order/vieword3.php");
}


 ?>










<div class="container col-6 text-center my-5">     <!-- [2] -->
<form method="POST" >


  <!-- select for [ meal ] -->

  <label for="quantity" class="mt-4">  choose meal </label>
  <select name="mel" class="form-control">
                <?php foreach($se as $catdata){ ?>       <!-- first foreach -->
    <optgroup label="<?php echo $catdata['cat_name']; ?>">
                <?php 
                        $catid = $catdata['id'];
                        $select = "SELECT * FROM `meal` WHERE section_id = $catid";
                        $d = mysqli_query( $conn , $select);
                        foreach($d as $mel){            // second foreach
                ?>
    <option value="<?php echo $mel['id']; ?>"> <?php echo $mel['name'] . " " . $mel['unitprice'] . " " ."LE"; ?> </option>
                <?php } ?>      <!-- closing second for each -->
   </optgroup>
                <?php } ?>      <!-- closing first foreach -->
  </select>



   <!-- select for [ quantity ] -->

   <label for="quantity" class="mt-4">  Quantity </label>
   <select name="quant" id="quantity" class="form-control">
                <?php for($i=1 ; $i<=10 ; $i++){  ?>
      <option value="<?php echo $i; ?>"> <?php echo $i ; ?> </option>
                <?php } ?>
   </select>

   <button class="btn4 mt-3" name="add" type="submit">  Add Meal </button>

   <h4 class="mt-5"> delivery place </h4>
   <input type="text" name="address" class="form-control"> 

   <button class="btn5 mt-3" name="conf" type="submit">  Submit Order </button>

</form>
</div>




<?php ob_end_flush(); ?>
