<?php
include 'server/connection.php';

$nama_akun = $_POST['nama_akun'];
$email_akun = $_POST['email_akun'];
$pass_akun = $_POST['pass_akun'];
$telepon = $_POST['telepon'];

$query = "INSERT INTO akun (nama_akun, email_akun, pass_akun,telepon)
 values ('$nama_akun','$email_akun','$pass_akun','$telepon')";

mysqli_query($conn, $query);
header("location: Register.php");
?>