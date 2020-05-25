<?php
    $username = isset($_POST['uname']) ? $_POST['uname'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    if(!empty($username) && !empty($password))
    {
        //$con = mysql_connect("localhost","xiao-yufei","D5I1F0D9wJAEFNmKuK4au6gc");
        $con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc","2201613130107");
        if (!$con)
        {
            header("Location:login.php?err=3");
        }
        //mysql_select_db("2201613130107", $con);
        //$select = "SELECT userName,pwd FROM user WHERE userName = '$username' AND pwd = '$password'";
        $check = mysqli_query($con,"SELECT userName,pwd FROM user WHERE userName = '$username' AND pwd = '$password'");
        if (!$check) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        
        $row = mysqli_fetch_array($check);
        if ($username == $row['userName'] && $password == $row['pwd']) 
        {
            header("Location:index.html");
            mysqli_close($conn);
        }
        else 
        { 
            header("Location:test.php?err=1");
        }
    }
    else
    {
        header("Location:test.php?err=2");
    }
   
?>

