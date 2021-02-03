<?php
//require './class/database_connection.php';
require './class/database_connection.php';

if(isset($_GET['did']))
{
    mysqli_query($database_connection, "delete from tbl_admin where admin_id='{$_GET['did']}'") or die(mysqli_error($database_connection));
    //echo "YES";
}
$query = mysqli_query($database_connection, "select * from tbl_admin") or die(mysqli_error($database_connection));

echo "<h3><p align='center'>ADMIN  TABLE</p></h3>";
echo "<table border='1' bgcolor='#F9E79F'>";
echo "<tr>";
echo "<td>Id</td><td>E-mail Id</td><td>password</td><td>Option</td>";
echo "</tr>";
while($row = mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>";
    echo "<td><a href='display_admin_data.php?did=$row[0]'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";