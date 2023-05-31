<?php
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"postoffice");
if (!$conn){
    echo"Sorry we failed to connect: ";
}
else{
    echo "Connection was successful";
}


?>
