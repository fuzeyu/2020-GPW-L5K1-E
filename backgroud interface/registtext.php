<?php
$username = isset($_POST['uname']) ? $_POST['uname'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$truthName = isset($_POST['truthName']) ? $_POST['truthName'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$age = isset($_POST['age']) ? $_POST['age'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$idcard = isset($_POST['IDcard']) ? $_POST['IDcard'] : "";
$time = date("Y-m-d");

if ($password == $re_password) 
{
    $con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
    $select = "SELECT userName FROM user WHERE userName = '$username'";
    $check = mysqli_query($con, $select);
    $row = mysqli_fetch_array($check);
    if ($username == $row['userName']) 
    {
        header("Location:regist.php?err=1");
    } 
    else 
    {
        $insert = "INSERT INTO user(userName,truthName,gender,age,idcard,phone,pwd,createTime) VALUES('$username','$truthName','$gender','$age','$idcard','$phone','$pwd','$time')";
        mysqli_query($con, $insert);
        header("Location:regist.php?err=3");
    }
    mysqli_close($con);
} 
else 
{
    header("Location:regist.php?err=2");
} ?>
