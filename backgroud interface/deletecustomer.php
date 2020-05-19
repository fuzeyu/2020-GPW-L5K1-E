<?php

// 1. Open database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Group3666";
$dbname = "funeral_service";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection is ok
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")" 
    );
}

$deleteid = $_GET['id'];

//2. Do a query
$query  = "DELETE FROM customer ";
$query .= "WHERE id= $deleteid";

//echo $query;
    
$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}



//Echo "Staff deleted successfully, please return to the previous page and refresh!!!";



// 5. close db connection
mysqli_close($connection);


header('Location: customertable.php')

?>