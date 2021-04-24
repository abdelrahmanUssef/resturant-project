<?php 
ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';


 //testmessage( $conn , "connection"); 


 $select = "SELECT * FROM `customer`";
 $s = mysqli_query($conn,$select);

?>



<div class="container col-6 mt-5">
<table class="table table-hover">

  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>

  <tbody>
    <tr>
            <?php foreach($s as $data){?>
      <td scope="row"><?php echo $data['id'];?></td>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['email'];?></td>
      <td><?php echo $data['pass'];?></td>
      <td><?php echo $data['phone_num'];?></td>
    </tr>
          <?php }?>
  </tbody>

</table>
</div>


<?php ob_end_flush();  ?>