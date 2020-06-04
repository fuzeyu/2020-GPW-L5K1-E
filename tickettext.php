<?php
$t_id = $_POST['t_id'];
$route = $_POST['route'];
$seat_type = $_POST['seat_type'];
$customer = $_POST['customer'];
$customer_phone = $_POST['customer_phone'];
$IDcode = $_POST['IDcode'];

$con = new mysqli("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");

$check = mysqli_query($con,"SELECT customer FROM ticket WHERE t_id = '$t_id'");
$row = mysqli_fetch_array($check);
//echo"<script>alert('$row['customer']')</script>";
if(empty($customer)&&!(empty($row["customer"])))
{
    if(strcmp($seat_type,"economy")==0)
    {
        $insert1 = "UPDATE route_tickets SET RT_count=RT_count+1 where(RT_name LIKE '$route%' AND IsBusiness='0')";
        $do1 = mysqli_query($con, $insert1);
        //echo"<script>alert('????')</script>";
    }
    else
    {
        $insert2 = "UPDATE route_tickets SET RT_count=RT_count+1 where(RT_name LIKE '$route%' AND IsBusiness='1')";
        $do2 = mysqli_query($con, $insert2);
    }
}
else if(empty($row["customer"])&&!empty($customer))
{
    if(strcmp($seat_type,"economy")==0)
    {
        $insert3 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness='0')";
        $do3 = mysqli_query($con, $insert3);
        //echo"<script>alert('????')</script>";
    }
    else
    {
        $insert4 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness='1')";
        $do4 = mysqli_query($con, $insert4);
    }
}
$update = "UPDATE ticket SET customer = '$customer',customer_phone = '$customer_phone',IDcode = '$IDcode' WHERE t_id = '$t_id'";
$do = mysqli_query($con, $update);
header("Location:/background/public/backgroudinterface/tables.php");
mysqli_close($con); 
?>
