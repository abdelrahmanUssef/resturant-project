<?php 

 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';

 //testmessage( $conn , "connection");





//======== Update Part ========
$shipper = "";
$update = false;
if (isset($_GET['edit'])){
    $update = true;
    $ordid = $_GET['edit'];
    $select = " SELECT * FROM `orders` WHERE id = $ordid";
    $s = mysqli_query( $conn , $select );
    $row = mysqli_fetch_assoc($s);  // return one row
    $shipper = $row['shipper_id'];
    
    if (isset($_POST['update'])){
        $shipper = $_POST['shipper'];
        $update = " UPDATE `orders` SET shipper_id = $shipper  WHERE  id = $ordid ";
        $s = mysqli_query( $conn , $update );
        header("location:/restaurant/orddetails/listord.php");
    }
}


?>




<div class="container col-6 text-center my-5">
  <form method="POST" >

    <h4 class="alert alert-success"> order number: <?php echo $ordid; ?></h4>

    <div class="form-group">
        <label for="dep"> Shipper Name </label>
        <select id="dep" name="shipper" class="form-control">
                    <?php 
                    $select = "select * from `shipper`";
                    $sh = mysqli_query($conn , $select);
                    foreach($sh as $data){
                    ?>
            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                    <?php } ?>
        </select>
    </div>

    <button type="submit" name="update" class="btn5 mt-3"> Submit</button>

  </form>
</div>