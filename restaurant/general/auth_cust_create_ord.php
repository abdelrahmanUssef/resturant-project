<?php

if(isset($_SESSION['ORDID'])){     // if i put [ if($_SESSION) ] only =>> there is no error.

}else{
    header("location:/restaurant/order/createord1.php");
}

?>
