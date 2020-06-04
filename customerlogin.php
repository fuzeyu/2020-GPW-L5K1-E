<?php
    //session_start();
    $username = isset($_POST['count']) ? $_POST['count'] : "";
    $password = isset($_POST['pwd']) ? $_POST['pwd'] : "";
    $url="/user/booking.php";
    
    if(!empty($username) && !empty($password))
    {
        
        $con = mysqli_connect("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");
        if (!$con)
        {
            echo"<script>alert('connection failed!');";
            echo"location.href='$url'</script>";
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
            $_SESSION['username']="$username";
            $yes=$_SESSION['username'];
            echo"<script>alert('welcome back,$yes');";
            echo"location.href='$url'</script>";
            mysqli_close($conn);
        }
        else 
        { 
            echo"<script>alert('password wrong!');";
            echo"location.href='$url'</script>";
        }
    }
    else
    {
        echo"<script>alert('isempty?');";
        echo"location.href='$url'</script>";
    }
   
?>

