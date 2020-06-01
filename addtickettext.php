<?php
$start = $_POST['start'];
$destination = $_POST['destination'];
$seat_type = $_POST['seat_type'];
$bus_type = $_POST['bus_type'];
$customer = $_POST['customer'];

$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$insert = "INSERT INTO ticket(start,destination,seat_type,bus_type,customer) VALUES ('$start','$destination','$seat_type','$bus_type','$customer');";
$do = mysqli_query($con, $insert);
header("Location:/xyf/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
