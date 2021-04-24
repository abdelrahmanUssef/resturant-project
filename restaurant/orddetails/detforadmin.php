<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';


 //testmessage( $conn , "connection");

$select = " SELECT orders.id  as ordid, customer.id as cid , customer.name custname , chef.id as chid , chef.name as chname , shipper.id  as sid, shipper.name  as sname, orders.total_p , orders.place 
            from orders 
            JOIN customer
            ON orders.cust_id = customer.id
            JOIN shipper
            ON orders.shipper_id = shipper.id
            JOIN chef
            ON orders.chef_id = chef.id
            WHERE orders.confirm = 'confirmed'
            ORDER by orders.id asc ";
$sord = mysqli_query( $conn , $select);


?>



<div class="container col-7 text-center mt-5 ">
    <table class="table table-hover">
      <thead class="thead-dark thead-fixed">
        <tr class="">
            <th> order ID </th>
            <th> customer ID </th>
            <th> customer name </th>
            <th> chef ID </th>
            <th> chef name </th>
            <th> shipper ID </th>
            <th> shipper name </th>
            <th> totalprice </th>
            <th> Address </th>
        </tr>
      </thead>
            <?php foreach( $sord as $data){ ?>
        <tr>
            <td> <?php echo $data['ordid'] ?> </td>
            <td> <?php echo $data['cid'] ?> </td>
            <td> <?php echo $data['custname'] ?> </td>
            <td> <?php echo $data['chid'] ?> </td>
            <td> <?php echo $data['chname'] ?> </td>
            <td> <?php echo $data['sid'] ?> </td>
            <td> <?php echo $data['sname'] ?> </td>
            <td> <?php echo $data['total_p'] ?> </td>
            <td> <?php echo $data['place'] ?> </td>

        </tr>
            <?php } ?>
    </table>
</div>




<?php ob_end_flush(); ?>

