<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_api";

    $con = new mysqli($server, $username, $password, $dbname);
    if($con->connect_error){
        die("Connection failed!".$con->connect_error);
    }else{
        echo "Congratulation! Connect successfully!";
    }
?>