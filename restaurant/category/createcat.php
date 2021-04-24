<?php 
ob_start();

 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';

 //testmessage( $conn , "connection"); 
 

/*
 $select = " SELECT * FROM chef";
 $s = mysqli_query( $conn , $select);
 testmessage( $s , "select statement");
 testmessage( $conn , "connection");    // using [ query statement ] as condition in testmessage.
*/



if(isset($_POST['send'])){
    $name = $_POST['Name'];
    $insert = "INSERT INTO category VALUES (NULL , '$name' )";
    $i = mysqli_query($conn , $insert);
    if($i) header('location:/restaurant/category/listcat.php');
    }

if(isset($_GET ['delete'])) {
     $CatID =($_GET['delete']);
     $delete = "DELETE FROM 'category' WHERE $id = $CatID";
     $d = mysqli_query($conn , $delete);
     header("location: /restaurant/category/Listcat.php");
}

    $name = "";

    $update = false;
if(isset($_GET['edit']))  {
     $update = true;
     $CatID = $_GET['ID'];
     $select = "SELECT * FROM 'category' WHERE ID = $CatID" ;
     $s = mysqli_query($conn , $select);
     $row = mysqli_fetch_assoc($s);
     $name = $row['name'];
     $CatID = $row ['cat_ID'];
}

if (isset($_POST['update'])){
   $name = $_POST['name'];
   $CatID = $_post['CatID'];
   $update = "UPDATE 'category' SET name = '$name'  WHERE id = $CatID";
   $s = mysqli_query($conn , $update);
   header("location:/restaurant/category/listcat.php");

}



?>



<div class="container col-6 my-5 text-center">
<form method="POST">
    
  <div class="form-group ">
    <label for="exampleInputEmail1"> Name </label>
    <input type="text" name = "Name" value =""class ="form-control" placeholder = "Category Name">
  </div>
  
  <button type="submit" name="send" class="button btn1  " > Send </button>

</form>
</div>



<?php ob_end_flush(); ?>