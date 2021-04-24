<?php
ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';

 //testmessage( $conn , "connection");



//====== create part ====
if(isset($_POST['send'])){
  $name = $_POST['Name'];
  $unitprice = $_POST['unitprice'];
  $section_id = $_POST['section_id'];
    
  $insert = "INSERT INTO meal VALUES (NULL , '$name' ,$unitprice , $section_id )";
  $i = mysqli_query($conn , $insert);
  if($i) header('location: ../listmeal.php');
}

//===== delete part =====
if(isset($_GET ['delete'])) {
     $mealid =($_GET['delete']);
     $delete = " DELETE FROM 'meal' WHERE $id = $mealid ";
     $d = mysqli_query($conn , $delete);
     header("location: /restaurant/meals/Listmeal.php");
}

// ===== update part =====
$name = "";
$price = "";
$update = false;
if(isset($_GET['edit']))  {
 $update = true;
 $mealid = $_GET['edit'];
 $select = " SELECT * FROM `meal` WHERE id = $mealid " ;
 $s = mysqli_query($conn , $select);
 $row = mysqli_fetch_assoc($s);
 $name = $row['name'];
 $price = $row ['unitprice'];
}

if (isset($_POST['update'])){
   $name = $_POST['name'];
   $price = $_POST['uprice'];
   $update = "UPDATE `meal` SET name = '$name' , unitprice = '$price' WHERE id = $mealid";
   $s = mysqli_query( $conn , $update );
   header("location:/restaurant/meals/listmeal.php");

}


 ?>



<div class="container col-6 my-5 text-center">
 <form method="POST">

 <div class="form-group">
    <label for="exampleInputEmail1"> Name </label>
    <input type="text" name = "name" value ="<?php echo $name; ?>" class ="form-control" placeholder = "Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> Unit price </label>
    <input type="text" name = "uprice" value ="<?php  echo $price; ?>" class ="form-control" placeholder = "price">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> Section id </label>
    <select name="section_id" class="form-control" >
            <?php 
              $SELECT = " SELECT * FROM `category` "; 
              $s = mysqli_query($conn , $SELECT);
              foreach($s as $data){ 
            ?>
      <option value="<?php echo $data['id'] ?>"> <?php echo $data['cat_name'] ?> </option>
              <?php } ?>
    </select>
  </div>

  <button type="submit" name = "send" class="button btn1" >Send</button>
  <button type="submit" name = "update" class="button btn7" > Update </button>

 </form>
</div>


<?php ob_end_flush();  ?>
