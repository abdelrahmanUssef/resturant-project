<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';


 //testmessage( $conn , "connection");

$select = " SELECT ord_Details.ord_id , meal.name AS mealname ,  ord_details.quantity 
            FROM `ord_details` 
            join `meal`
            ON ord_details.meal_id = meal.id
            order by ord_details.ord_id asc";
$sord = mysqli_query( $conn , $select);


?>



<div class="container col-7 text-center mt-5 ">
    <table class="table table-hover">
      <thead class="thead-dark thead-fixed">
        <tr class="">
            <th> order ID </th>
            <th> Meal ID </th>
            
            <th> Quantity </th>
        </tr>
      </thead>
            <?php foreach( $sord as $data){ ?>
        <tr>
            <td> <?php echo $data['ord_id'] ?> </td>
            <td> <?php echo $data['mealname'] ?> </td>
            
            <td> <?php echo $data['quantity'] ?> </td>
        </tr>
            <?php } ?>
    </table>
</div>




<?php ob_end_flush(); ?>

