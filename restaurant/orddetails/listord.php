<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';
 include '../general/auth_admin.php';


 //testmessage( $conn , "connection");




$select = " SELECT orders.id , shipper.name as sname , chef.name  as cname 
            FROM `orders`
            JOIN chef ON orders.chef_id = chef.id 
            JOIN shipper on orders.shipper_id = shipper.id
            WHERE orders.confirm = 'confirmed'
            ORDER BY orders.id asc";          // to select data from 3 tables i will print them down in the table
$s = mysqli_query ( $conn , $select );   

?>




<div class="container col-8 text-center my-5">
    <table class="table  table-dark table-hover ">
      <thead class="">
        <tr>
            <th>order ID</th>
            <th>Action</th>
            <th>chef ID</th>
            <th>Action</th>
            <th>shipper ID</th>   
        </tr>
      </thead>

            <?php foreach($s as $data){  ?>

        <tr>
            <td> <?php echo $data['id'] ?> </td>
            <td>           
                <a href="/restaurant/orddetails/selectchef.php?edit=<?php echo $data['id'] ?>"  class="button btn3"> select chef </a>
            </td>
            <td> <?php echo $data['cname'] ?> </td>
            <td>           
            <a href="/restaurant/orddetails/selectship.php?edit=<?php echo $data['id'] ?>"  class="button btn6"> select shipper </a>
            </td>
            <td> <?php echo $data['sname'] ?> </td>
            <td> 

            </td>
        </tr>
            <?php }  ?>
    </table>



    <?php ob_end_flush();  ?>