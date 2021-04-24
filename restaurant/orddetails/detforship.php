<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';


 //testmessage( $conn , "connection");

 $select = "SELECT orders.id  as ordid, customer.name , customer.phone_num , orders.total_p , orders.place , customer.id as cid
            from orders 
            JOIN customer
            ON orders.cust_id = customer.id
            WHERE orders.confirm = 'confirmed' ";
$sord = mysqli_query( $conn , $select);




?>



<div class="container col-7 text-center mt-5 ">
    <table class="table table-hover">
      <thead class="thead-dark thead-fixed">
        <tr class="">
            <th> Order ID </th>
            <th> Customer ID </th>
            <th> Customer Name </th>
            <th> Phone  Number </th>
            <th> Address </th>
            <th> Total Price </th>
        </tr>
      </thead>
            <?php foreach( $sord as $data){ ?>
        <tr>
            <td> <?php echo $data['ordid'] ?> </td>
            <td> <?php echo $data['cid'] ?> </td>
            <td> <?php echo $data['name'] ?> </td>
            <td> <?php echo $data['phone_num'] ?> </td>
            <td> <?php echo $data['place'] ?> </td>
            <td> <?php echo $data['total_p'] ?> </td>
        </tr>
            <?php } ?>
    </table>
</div>




<?php ob_end_flush(); ?>

