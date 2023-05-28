<?php
include('server/connection.php');

if (isset($_POST['btn_register'])) {
    $nama = $_POST['nama_akun'];
    $email = $_POST['email_akun'];
    $pass = $_POST['pass_akun'];
    $telp = $_POST['Telephone'];

    $query = "INSERT INTO akun (nama_akun, email_akun, pass_akun, Telephone)values ('','$nama','$email','$pass','$telp','')";
    mysqli_query($conn, $query);

    header("Location:Register.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/bootstrap-5.3.0-alpha3-dist/js/style.js">
    <link rel="icon" type="image/png" href="Assets/icon/icon.png">
    <title>Gabung - Miracle</title>
</head>
<body>

    <div class="container login-form m">
        <img src="Assets/image/Login form img.jpg" class="form-img" alt="">
        <div class="form-content">
            <div class="form-text register">
            <h3>Register to Miracle</h3>
            <form methode="POST" action="Register.php" class="form-login">
                <div>
                    <input type="username" name="nama_akun" value="" placeholder="Masukan Nama">
                </div>
                <div>
                    <input type="email" name="email_akun" value="" placeholder="Masukan Email">
                </div>
                <div>
                    <input type="password" name="pass_akun" value="" placeholder="Masukan Password">
                </div>
                <div>
                    <input type="tel" name="Telephone" value="" placeholder="Masukan Telephone">
                </div>
                <div>
                    <input type="submit" name="btn_register" value="Register">
                </div>
                Sudah punyak akun? <a href="login.php" class=""> Login</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>