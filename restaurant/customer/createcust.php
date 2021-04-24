<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 //include '../general/auth_cust.php';  // eroooooooooor


 //testmessage( $conn , "connection");


 if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $phone_num = $_POST['phone_num'];
  $insert = "INSERT INTO `customer` VALUES (NULL , '$name' , '$email' , '$pass' , '$phone_num' )";
  $i = mysqli_query($conn , $insert);
  header('location:/restaurant/admin/logincust.php');
  
}

$name = "";
$email = "";
$phone_num = "";

 ?>




<div class="container col-6 mt-5 ">
<form method="POST">
  <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Please Enter Your Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="text" name="email" class="form-control" placeholder="Please Enter Your Email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" name="pass" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone Number</label>
      <input type="text" name="phone_num" class="form-control" placeholder="Please Enter Your Phone Number">
    </div>
 
    <button type="submit" name="send" class="button btn8 btn-block">Sign up</button>
    
</form>
</div>
<div style="height: 50px;"></div>
<?php include '../shared/footer.php'; ?>


 <?php ob_end_flush(); ?>

