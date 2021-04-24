<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';



 //testmessage( $conn , "connection");

 $select = " SELECT * FROM `chef` WHERE id > 1";
 $s = mysqli_query( $conn , $select );
 
 ?>
 
  
 
 
 <div class="container col-6 mt-5"> 
 <table class="table  table-hover">
 
   <thead class="thead-dark">
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">PHONE</th>
       <th scope="col">Salary</th>
       <th scope="col">action</th>
     
     </tr>
   </thead>
 
   <tbody>
     
     <?php foreach ( $s as $data ) { ?>
     <tr>
 
       <td> <?php echo $data ['id']; ?> </td>
       <td> <?php echo $data ['name']; ?> </td>
       <td> <?php echo $data ['phone']; ?> </td>
       <td> <?php echo $data ['salary']; ?> </td>
       <td>
         <a href="/restaurant/chef/createchef.php?edit= <?php echo $data['id']; ?>" class="button btn3">Update</a>
       </td>
     </tr>
     <?php } ?>
 
       
   </tbody>
 </table>
 </div>
 

 <?php ob_end_flush();  ?>

