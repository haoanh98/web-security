<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';
$con = mysqli_connect($hostname,$username,$password,$dbname);

if (mysqli_connect_errno())
{
echo "Kết nối thất bại: " . mysqli_connect_error();
}
?>

