<?php
    //connection to data base
    $host="localhost";
    $username="root";
    $pass="";
    $database="student";

    $conn=mysqli_connect($host,$username,$pass,$database);
    if(!$conn){
         die("connection failed : ".mysqli_connect_error());
    };


?>