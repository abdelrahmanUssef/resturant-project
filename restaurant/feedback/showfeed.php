<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 //include '../general/auth_cust.php';

 //testmessage( $conn , "connection");


 $select =" SELECT feedback.id as fid , customer.id as cid , customer.name as cname , feedback.description as des
            FROM `feedback` join customer 
            ON feedback.cust_id = customer.id ";
$sfeed = mysqli_query( $conn , $select);


 ?>



<div class="container col-7 text-center mt-5">
 <table class="table table-hover">
    <thead class="thead-dark">
     <tr>
         <th> Feed ID </th>
         <th> Customer ID </th>
         <th> Customer Name </th>
         <th> Description </th>
     </tr>
    </thead>
            <?php foreach( $sfeed as $data){ ?>
     <tr class="">
         <td> <?php echo $data['fid']; ?> </td>
         <td> <?php echo $data['cid']; ?> </td>
         <td> <?php echo $data['cname']; ?> </td>
         <td> <?php echo $data['des']; ?> </td>
     </tr>
            <?php } ?>
 </table>
</div>


<?php ob_end_flush();  ?>