<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';

 //testmessage( $conn , "connection"); 
 
if(isset($_POST['send'])){
    $name = $_POST['name'] ;
    $phone =$_POST['phone'] ;
    $salary = $_POST['salary'];
    $insert =  "INSERT INTO `shipper` VALUES ( NULL , '$name' , '$phone' , '$salary' )" ;
    $i = mysqli_query($conn , $insert );
    header("location:/restaurant/shipper/listship.php");
}




   $name ="";
   $phone = "";
   $salary = "";
   $update = false;
   if(isset($_GET ['edit'])){
     $update = true ;
     $id = $_GET['edit'];
     $select = "SELECT * FROM `shipper` WHERE id = $id";
     $s= mysqli_query( $conn , $select );
     $row =mysqli_fetch_assoc($s);
     $name = $row['name'] ;
     $phone = $row['phone'];
     $salary = $row['salary'];
    }

    if(isset($_POST['upd'])){
      $name = $_POST ['name'];
      $phone = $_POST ['phone'];
      $salary = $_POST ['salary'];
      $update = "UPDATE `shipper` SET name ='$name', phone ='$phone' , salary = '$salary' WHERE id = $id";
      $s = mysqli_query ( $conn , $update );
      header("location:/restaurant/shipper/listship.php");
    }
   

   ?>


   <div class="container col-6">
   <form method = "POST" class ="mt-5">
   
       <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Shipper Name</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="name" value =" <?php echo $name; ?>" placeholder="shipper name">
       </div>

       <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Phone</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value =" <?php echo $phone; ?>" placeholder="phone">
       </div>

       <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label"> Salary </label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="salary" value ="<?php echo $salary; ?>" >
       </div>

       <button type="submit" class="button btn1 " name="send" >Create</button>
       <button type="upd" class="button btn7" name="upd" >Update</button>
   </form>
   </div>
   
   <?php ob_end_flush(); ?>
   
   