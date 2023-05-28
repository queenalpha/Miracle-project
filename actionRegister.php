<?php
include 'server/connection.php';

$nama_akun = $_POST['nama_akun'];
$email_akun = $_POST['email_akun'];
$pass_akun = $_POST['pass_akun'];
$pict_akun = $_POST['pict_akun'];


$query = "INSERT INTO akun values ('','$nama_akun','$email_akun','$pass_akun','$pict_akun')";

mysqli_query($conn, $query);
header("location: register.php");
?>