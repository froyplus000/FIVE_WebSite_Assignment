<?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104471956";
    $pwd = "2882005";
    $sql_db = "s104471956_db";

    $con = mysqli_connect($host, $user, $pwd, $sql_db);

    if(!$con){
        die("Connection Error");
    }
?>