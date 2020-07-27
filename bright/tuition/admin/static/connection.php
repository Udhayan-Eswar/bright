<?php
$con = mysqli_connect("localhost","root","","bright");
if(mysqli_connect_errno($con))
{
    echo "Failed to connect to Database";
}
else
{
    #connection_success
    #echo  "Connected to Database Successfully";
}

?>