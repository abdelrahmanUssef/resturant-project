<?php

if(isset($_SESSION['CUSTOMER'])){     // if i put [ if($_SESSION) ] only =>> there is no error.

}else{
    header("location:/restaurant/admin/logincust.php");
}

?>
