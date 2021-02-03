<?php

$email = $_POST['txt1'];
$password = $_POST['txt2'];

echo "E-mail is : $email and password is : $password";

$database_connection = mysqli_connect("localhost","root","","vidhi_php_project");

$query = mysqli_query($database_connection, "insert into tbl_admin(admin_id,admin_email,adm_password) values('1','$email','$password')") or die("error". mysqli_error($database_connection));

if($query)
{
    echo "<script>alert('Record Added');</script>";
}

?>