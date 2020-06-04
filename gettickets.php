<?php
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

 
if(empty($q)) {
    echo 'please choose a route';
    exit;
}
 
$con = mysqli_connect("localhost", "f9e99cfdf1f0", "15c5606b20cc8382","l5k1e");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"test");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
 
$sql="SELECT * FROM route_tickets WHERE RT_id = '".$q."'";
 
$result = mysqli_query($con,$sql);
 
echo "<table border='1'>
<tr>
<th>money</th>
<th>count</th>
</tr>";
 
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['RT_money'] . "</td>";
    echo "<td>" . $row['RT_count'] . "</td>";
    echo "</tr>";
}
echo "</table>";
 
mysqli_close($con);
?>