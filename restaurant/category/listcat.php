<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';

 //testmessage( $conn , "connection"); 



$SELECT = "SELECT * FROM `category` "; 
$s = mysqli_query($conn , $SELECT);


?>






<div class="container col-6 my-5 text-center">
<table class="table table-hover table-pink ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cat_name</th>
    </tr>
  </thead>
  
      <?php foreach ($s as $data){ ?>
      
    <tr>
        <td> <?php echo $data['id']?></td>
        <td> <?php echo $data['cat_name']?></td>
    </tr>
      <?php } ?>
</table>
</div>


<?php ob_end_flush();  ?>

