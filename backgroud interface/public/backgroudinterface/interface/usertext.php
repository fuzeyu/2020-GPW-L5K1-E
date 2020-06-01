<?php
$id = $_POST['id'];
$userName = $_POST['userName'];
$truthName = $_POST['truthName'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$idcard = $_POST['idcard'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$createTime = $_POST['createTime'];


$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$update = "UPDATE ticket SET userName = '$userName',truthName = '$truthName',gender = '$gender',age = '$age',idcard = '$idcard',phone = '$phone',pwd = '$pwd',createTime = '$createTime' WHERE id = '$id'";
$do = mysqli_query($con, $update);
header("Location:/xyf/public/backgroudinterface/customer.php");
mysqli_close($con); 
?>
