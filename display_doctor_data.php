<?php
//require './database_connection.php';
require './class/database_connection.php';


if(isset($_GET['did']))
{
    mysqli_query($database_connection, "delete from tbl_doctor where doctor_id='{$_GET['did']}'") or die(mysqli_error($database_connection));
    //echo "YES";
}
$query = mysqli_query($database_connection, "select * from tbl_doctor") or die(mysqli_error($database_connection));
echo "<h3><p align='center'>DOCTOR  TABLE</p></h3>";
echo "<table border='1' bgcolor='#F9E79F'>";
echo "<tr>";
echo "<td>Doctor Id</td><td>Doctor Name</td><td>E-mail</td><td>Password</td><td>Start Time</td><td>End Time</td><td>Fees</td><td>Degree</td><td>Experience</td><td>Phone No</td><td>Speciality Id</td><td>Option</td>";
echo "</tr>";
while($row = mysqli_fetch_array($query))
{
    echo "<tr>";
    //echo "<td>Id</td><td>Patient Id</td><td>Doctor Id</td><td>Appointment Time</td><td>Appointment Date</td><td>Appointment Status</td>";
    echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td>";
    echo "<td><a href='display_doctor_data.php?did=$row[0]'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
