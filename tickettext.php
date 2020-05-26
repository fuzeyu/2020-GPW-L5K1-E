<?php
$t_id = $_POST['t_id'];
$start = $_POST['start'];
$destination = $_POST['destination'];
$seat_type = $_POST['seat_type'];
$bus_type = $_POST['bus_type'];
$customer = $_POST['customer'];

$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$update = "UPDATE ticket SET start = '$start',destination = '$destination',seat_type = '$seat_type',bus_type = '$bus_type',customer = '$customer' WHERE t_id = '$t_id'";
$do = mysqli_query($con, $update);
header("Location:/xyf/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
