<?php
//require './database_connection.php';
require './class/database_connection.php';


if(isset($_GET['did']))
{
    mysqli_query($database_connection, "delete from tbl_appointment where appointment_id='{$_GET['did']}'") or die(mysqli_error($database_connection));
    //echo "YES";
}
$query = mysqli_query($database_connection, "select * from tbl_appointment") or die(mysqli_error($database_connection));
echo "<h3><p align='center'>APPOINTMENT  TABLE</p></h3>";
echo "<table border='1' bgcolor='#F9E79F'>";
echo "<tr>";
echo "<td>Id</td><td>Patient Id</td><td>Doctor Id</td><td>Appointment Time</td><td>Appointment Date</td><td>Appointment Status</td><td>Option</td>";
echo "</tr>";
while($row = mysqli_fetch_array($query))
{
    echo "<tr>";
    //echo "<td>Id</td><td>Patient Id</td><td>Doctor Id</td><td>Appointment Time</td><td>Appointment Date</td><td>Appointment Status</td>";
    echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
    echo "<td><a href='display_appointment_data.php?did=$row[0]'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
