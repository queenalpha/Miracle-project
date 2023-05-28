<?php
include 'server/connection.php';

$nama_akun = $_POST['nama_akun'];
$email_akun = $_POST['email_akun'];
$pass_akun = $_POST['pass_akun'];
$telp_akun = $_POST['Telephone'];
$pict_akun = $_POST['pict_akun'];


$query = "INSERT INTO akun values ('','$nama_akun','$email_akun','$pass_akun','$telp_akun','$pict_akun')";

mysqli_query($conn, $query);
header("location:Register.php");
die();
?>

<?php
    include 'server/connection.php';

    $username = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = ($_POST['user_password']);
    $address = $_POST['user_address'];

    $query = "INSERT into users values ('','$username','$email','$password','','$address','','')";

    mysqli_query($conn, $query);

    header("location:register.html");
    die();
?>
