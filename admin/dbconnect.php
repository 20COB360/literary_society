<?php
$servername="localhost";
$username="root";
$password="";
$database="rls";

$conn=mysqli_connect($servername,$username,$password,$database);
if($conn){
    // echo "Connection is successful";
}
else{
    echo "Connection is not successful". mysqli_connect_error($conn);
    die();
}
?>