<?php

if(isset($_SESSION['admin'])){

}else{
    header('location:/restaurant/admin/loginadmin.php');
}

?>