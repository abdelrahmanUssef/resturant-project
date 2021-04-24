<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_cust.php';

 //testmessage( $conn , "connection");


  if(isset($_POST['send'])){

    // getting customer [ id ] =>> to make feedback with his [ id ]
    $cust_email = $_SESSION['CUSTOMER'];
    $select = "SELECT * FROM `customer` WHERE email = '$cust_email' ";
    $s = mysqli_query( $conn , $select );
    $row = mysqli_fetch_assoc($s);
    $cust_id = $row['id'];
    
    $description = $_POST['description'];
    $insert = "INSERT INTO `feedback` VALUES ( NULL , $cust_id , '$description')";
    $i = mysqli_query($conn , $insert);
  }

  if(isset($_POST['back'])){
    header('location:/restaurant/home/indexe.php');
  }

 ?>


<div class="container col-6 mt-5 text-center" >
<form method="POST">

  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Description </label>
    <textarea type="text" value="<?php echo $description?>" name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Please Enter Your FeedBack"> </textarea>
  </div>

    <button type="submit" name="send" class="btn4  mt-3">Send FeedBack</button>
  
    <button type="submit" name="back" class="btn5 mt-3" >  Back to Home Page </button>
  

</form>
</div>
<div style="height: 60px;"></div>
<?php include '../shared/footer.php'; ?>
<?php ob_end_flush();