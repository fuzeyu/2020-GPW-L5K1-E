<?php
$route = $_POST['route'];
$seat_type = $_POST['seat_type'];
$customer = $_POST['customer'];
$customer_phone = $_POST['customer_phone'];
$IDcode = $_POST['IDcode'];

$con = new mysqli("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");
$insert = "INSERT INTO ticket(route,seat_type,customer,customer_phone,IDcode) VALUES ('$route','$seat_type','$customer','$customer_phone','$IDcode');";
$do = mysqli_query($con, $insert);
if(empty($customer))
{
    if(strcmp($seat_type,"economy")==0)
    {
        $insert1 = "UPDATE route_tickets SET RT_count=RT_count+1 where(RT_name LIKE '$route%' AND IsBusiness=0)";
        $do1 = mysqli_query($con, $insert1);
        //echo"<script>alert('????')</script>";
    }
    else
    {
        $insert2 = "UPDATE route_tickets SET RT_count=RT_count+1 where(RT_name LIKE '$route%' AND IsBusiness=1)";
        $do2 = mysqli_query($con, $insert2);
    }
}

header("Location:/background/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
