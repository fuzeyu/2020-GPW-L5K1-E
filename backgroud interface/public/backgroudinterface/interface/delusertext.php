<?php
$id = $_POST['id'];

$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$delete = "DELETE FROM user WHERE id='$id'";
$do = mysqli_query($con, $delete);
header("Location:/xyf/public/backgroudinterface/customer.php");
mysqli_close($con); 
?>
