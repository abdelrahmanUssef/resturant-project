<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';



 if(isset($_POST['send'])){
    $name = $_POST['name'] ;
    $phone = $_POST['phone'] ;
    $salary = $_POST['salary'];
    
    $insert =  "INSERT INTO `chef` VALUES (NULL,'$name', '$phone' , $salary)" ;
    $i = mysqli_query($conn , $insert );
    header("location:/restaurant/chef/listchef.php");
   }
   
   $name ="";
   $phone = "";
   $salary = "";
   $update = false;
   if(isset($_GET ['edit'])){
     $update = true ;
     $id = $_GET ['edit'];
     $select = "SELECT * FROM `chef` WHERE id = $id";
     $s= mysqli_query( $conn , $select );
     $row =mysqli_fetch_assoc($s);
    $name = $row ['name'] ;
    $phone = $row['phone'];
    $salary = $row['salary'];
    if(isset($_POST['upd'])){
      $name = $_POST ['name'];
      $phone = $_POST ['phone'];
      $salary = $_POST ['salary'];
      $update = "UPDATE `chef` SET name ='$name', phone ='$phone' , salary = $salary WHERE id = $id";
      $s = mysqli_query ($conn,$update);
      header("location:/restaurant/chef/listchef.php");
    }
   }
   

?>


<div class="container col-6">
<form method="POST" class ="mt-5">

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Chef Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="name" value =" <?php echo $name; ?>" placeholder="chef name">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value =" <?php echo $phone; ?>" placeholder="phone" >
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Salary </label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="salary" value ="<?php echo $salary; ?>"  >
    </div>

    <div class="">
        <button type="submit" class="button btn1 " name="send" >Send</button>
        <button type="submit" class="button btn7 " name="upd" >Update</button>
    </div>

</form>
</div>


<?php ob_end_flush(); ?>

