<?php
    $conn=mysqli_connect('localhost','root', '', 'students', '3307');
    if(!$conn){
        die('connection failed:'.mysqli_connect_error());
    }
?>