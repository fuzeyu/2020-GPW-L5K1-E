<?php
$t_id = $_POST['t_id'];
$route = $_POST['route'];
$seat_type = $_POST['seat_type'];
$customer = $_POST['customer'];

$con = new mysqli("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");

$delete = "DELETE FROM ticket WHERE t_id='$t_id'";
$do = mysqli_query($con, $delete);

if(empty($customer))
{
    if(strcmp($seat_type,"economy")==0)
    {
        $delete1 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness=0)";
        $do1 = mysqli_query($con, $delete1);
    }
    else
    {
        $delete2 = "UPDATE route_tickets SET RT_count=RT_count-1 where(RT_name LIKE '$route%' AND IsBusiness=1)";
        $do2 = mysqli_query($con, $delete2);
    }
}

header("Location:/background/public/backgroudinterface/tables.php");
mysqli_close($con);
?>
