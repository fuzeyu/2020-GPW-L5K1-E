<?php
    $username = isset($_POST['uname']) ? $_POST['uname'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    if(!empty($username) && !empty($password))
    {
        //$con = mysql_connect("localhost","xiao-yufei","D5I1F0D9wJAEFNmKuK4au6gc");
        $con = new mysqli("localhost", "xiao-yufei", "D5I1F0D9wJAEFNmKuK4au6gc");
        if (!$con)
        {
            header("Location:test.php?err=3");
        }
        //mysql_select_db("2201613130107", $con);
        $select = "SELECT username,password FROM user WHERE userName = '$username' AND pwd = '$password'";
        $check = mysqli_query($select,$con);
        
        if ($username == $row['username'] && $password == $row['password']) 
        {
            header("Location:index.php");
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

