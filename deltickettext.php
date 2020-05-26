<?php
$t_id = $_POST['t_id'];

$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$delete = "DELETE FROM ticket WHERE t_id='$t_id'";
$do = mysqli_query($con, $delete);
header("Location:/xyf/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
