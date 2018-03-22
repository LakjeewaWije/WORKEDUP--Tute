<?php

$con = mysqli_connect("localhost","root","","workedup");
if(!$con){
    //echo "Not connected";
    //print_r(mysqli_connect_error());
    die("Could not connect: ".mysqli_connect_error());
//    header( 'Location: addCustomer.php?response=success&LakjeewaWijebandara_W1654096' ) ;  // Page redirection with query string. If insertion successf
}
else{
    //echo "Connection successful";
}
?>