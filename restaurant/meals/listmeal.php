<?php
ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';

 //testmessage( $conn , "connection");




 ?>



<div class="container col-6 my-5 text-center">
 <table class="table table-hover table-pink ">

  <thead class="thead-dark">
    <tr>
      <th scope="col"> ID </th>
      <th scope="col"> Name </th>
      <th scope="col"> Unitprice </th>
      <th scope="col"> Section id </th>
      <th scope="col">  action </th>
   </tr>
  </thead>
  
        <?php
          $SELECT = "SELECT * FROM `meal`"; 
          $s = mysqli_query($conn , $SELECT);
          foreach($s as $data){ 
        ?>
    <tr>
        <td> <?php echo $data['id']?></td>
        <td> <?php echo $data['name']?></td>
        <td> <?php echo $data['unitprice']?></td>
        <td> <?php echo $data['section_id']?></td>
        <td>           
            <a href="/restaurant/meals/createmeal.php?edit=<?php echo $data['id'] ?>"  class="button btn3"> Update </a>
        </td>
    </tr>
        <?php }?>

</table>
</div>

<?php ob_end_flush(); ?>