<?php 
 ob_start();
 include '../shared/head.php';
 include '../shared/nav.php';
 include '../shared/script.php';

 include '../general/configdb.php';
 include '../general/test.php';

 //testmessage( $conn , "connection"); 


 if (isset($_POST['send'])){
    $username = $_POST['userName'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `customer` WHERE email = '$username' AND pass = '$password' ";
    $s = mysqli_query( $conn , $select );
    $numrows = mysqli_num_rows($s);

    if ($numrows > 0){
        $_SESSION['CUSTOMER'] = $username;
        header('location:/restaurant/home/indexe.php');
    }else{
        echo "<div class=' text-center mt-5' style = 'color:red; font-size:20; ' > invalid email or password please try again </div>";
    }
} 


?>


<div class="container col-3 mt-5 ">
 <form method="POST">
     
    <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input  type="email" name = "userName" class="form-control" placeholder="username">
    </div>
     
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" name = "password" class="form-control" placeholder="password">
    </div>
     
      
     <button type="submit" name="send" class=" btn8 btn-block " > login </button>
 </form>
</div>

<div style="height: 100px;"></div>

<?php ob_end_flush(); ?>




<?php include '../shared/footer.php'; ?>