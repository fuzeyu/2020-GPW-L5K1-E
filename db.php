<?php

// 1. Open database connection
$dbhost = "localhost";
$dbuser = "f9e99cfdf1f0";
$dbpass = "15c5606b20cc8382";
$dbname = "l5k1e";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection is ok
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")" 
    );
}

?>