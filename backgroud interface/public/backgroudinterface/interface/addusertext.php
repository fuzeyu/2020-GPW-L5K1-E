<?php
$userName = $_POST['userName'];
$truthName = $_POST['truthName'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$idcard = $_POST['idcard'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$createTime = $_POST['createTime'];

$con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
$insert = "INSERT INTO ticket(userName,truthName,gender,age,idcard,phone,pwd,createTime) VALUES ('$userName','$truthName','$gender','$age','$idcard',,'$phone','$pwd','$createTime');";
$do = mysqli_query($con, $insert);
header("Location:/xyf/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
