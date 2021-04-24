<?php

function testmessage( $condition , $message ){
    if( $condition ){
        echo "<div class='alert alert-info col-6 m-auto' >";
        echo "<h2 class='text-center'>" . $message . " is true" . "</h2>";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger col-6 m-auto'>";
        echo "<h2 class='text-center'>" . $message . " is false" . "</h2>";
        echo "</div>";
    }
}

?>