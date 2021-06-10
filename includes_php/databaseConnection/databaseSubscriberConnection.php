<?php
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbName = "moviedatabase";

    //connect to database
    $dbConnect  = mysqli_connect($servername, $username, $password, $dbName)
    or die ("unable to connect o database");
?>