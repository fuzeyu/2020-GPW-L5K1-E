<?php
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $IDcode = isset($_POST['IDcode']) ? $_POST['IDcode'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $Isbusiness = isset($_POST['Isbusiness']) ? $_POST['Isbusiness'] : "";
    $ticket = isset($_POST['tickets']) ? $_POST['tickets'] : "";
    $url="/user/booking.php";
   
/**
    echo"<script>alert('$IDcode');";
    echo"<script>alert('$phone');";
    echo"<script>alert('$Isbusiness');";
    echo"<script>alert('$ticket');</script>";
**/
    switch($ticket)
    {
        case'1':$route='Chengdu to Chongqing';break;
        case'7':$route='Chengdu to Chongqing';break;
        case'2':$route='Chengdu to Beijing';break;
        case'8':$route='Chengdu to Beijing';break;
        case'3':$route='Chengdu to Neijiang';break;
        case'9':$route='Chengdu to Neijiang';break;
        case'4':$route='Chengdu to Tibet';break;
        case'10':$route='Chengdu to Tibet';break;
        case'5':$route='Chengdu to Qinghai';break;
        case'11':$route='Chengdu to Qinghai';break;
        case'6':$route='Chengdu to Shanghai';break;
        case'12':$route='Chengdu to Shanghai';break;
    }

        $con = new mysqli("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");
        if (!$con)
        {
            echo"<script>alert('connection failed!');";
            echo"location.href='$url'</script>";
        }
        
        if(strcmp($Isbusiness,"0")==0)
        {
            $select = mysqli_query($con,"SELECT t_id FROM ticket WHERE customer='' AND seat_type='economy' AND route='$route'");
            $row = mysqli_fetch_array($select);
        }
        else
        {   
            $select = mysqli_query($con,"SELECT t_id FROM ticket WHERE customer='' AND seat_type='business' AND route='$route'");
            $row = mysqli_fetch_array($select);
        }
        if(empty($row))
        {
            echo"<script>alert('have no this kind of tickets!');";
            echo"location.href='$url'</script>";
        }
        else
        {
            $t_id = $row['t_id'];
        }
        $update = mysqli_query($con,"UPDATE ticket SET customer='$name',customer_phone='$phone',IDcode='$IDcode' WHERE t_id='$t_id'");
        if(strcmp($Isbusiness,"0")==0)
        {
            $insert1 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness=0)";
            $do1 = mysqli_query($con, $insert1);
            //echo "<script>alert('$t_id')";
            echo"<script>alert('successful!');console.log($t_id);";
            echo"location.href='$url'</script>";
        }
        else
        {
            $insert2 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness=1)";
            $do2 = mysqli_query($con, $insert2);
            //echo "<script>alert('$t_id')"
            echo"<script>alert('successful!');";
            echo"location.href='$url'</script>";
        }
    
?>

