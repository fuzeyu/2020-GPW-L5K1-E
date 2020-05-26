<?php

require('db.php');

if ($_POST['submit']) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $type = $_POST['type'];
    
    // 2. Do a query
    $query  = "INSERT INTO li (start, end, type ) "; 
    $query .= "VALUES ('$start', '$end', '$type' ) ";
    header("Location:route.php");

    echo $query;

    $result = mysqli_query($connection, $query);
}

?>

