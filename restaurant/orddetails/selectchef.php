<?php 

 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';

 //testmessage( $conn , "connection");





//======== Update Part ========
$chef = "";
$update = false;
if (isset($_GET['edit'])){
    $update = true;
    $ordid = $_GET['edit'];
    $select = " SELECT * FROM `orders` WHERE id = $ordid";
    $s = mysqli_query( $conn , $select );
    $row = mysqli_fetch_assoc($s);  // return one row
    $chef = $row['chef_id'];
    
    if (isset($_POST['update'])){
        $chef = $_POST['chef'];
        $update = " UPDATE `orders` SET chef_id = '$chef'  WHERE  id = $ordid ";
        $s = mysqli_query( $conn , $update );
        header("location:/restaurant/orddetails/listord.php");
    }
}


?>




<div class="container col-6 text-center my-5">
  <form method="POST" >

    <h4 class="alert alert-success"> order number: <?php echo $ordid; ?></h4>

    <div class="form-group">
        <label for="dep"> Chef Name</label>
        <select id="dep" name="chef" class="form-control">
                    <?php 
                    $select = "select * from `chef`";
                    $c = mysqli_query($conn , $select);
                    foreach($c as $data){
                    ?>
            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                    <?php } ?>
        </select>
    </div>



    <button type="submit" name="update" class="btn5 mt-3"> Submit</button>

  </form>
</div>