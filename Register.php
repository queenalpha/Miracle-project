<?php
// session_start();
include 'server/connection.php';

// if (isset($_SESSION['logged_in'])) {
//     if ($_SESSION['status'] == 'admin') {
//         header('location: managemen.php');
//         exit;
//     } else if ($_SESSION['status'] == 'user') {
//         header('location: profilePage.php');
//         exit;
//     }
// }

if(isset($_POST['btn_regist'])){
    $nama_akun = $_POST['nama_akun'];
    $email_akun = $_POST['email_akun'];
    $pass_akun = $_POST['pass_akun'];
    $telepon = $_POST['Telephone'];
    
    $query = "INSERT INTO akun (nama_akun, email_akun, pass_akun,Telephone)
    values ('$nama_akun','$email_akun','$pass_akun','$telepon')";
    mysqli_query($conn, $query);

    header("location:Register.php");
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
            <form method="POST" action="actionRegister.php" class="form-login">
                <div>
                    <input type="text" name="nama_akun"  placeholder="Masukan Nama">
                </div>
                <div>
                    <input type="text" name="email_akun" placeholder="Masukan Email">
                </div>
                <div>
                    <input type="password" name="pass_akun" placeholder="Masukan Password">
                </div>
                <div>
                    <input type="text" name="telepon" placeholder="Masukan Telephone">
                </div>
                <div>
                    <input type="submit"  value="Login">
                </div>
                Sudah punyak akun? <a href="login.php" class=""> Login</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>