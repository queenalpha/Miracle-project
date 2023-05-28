<?php 
    // session_start();
    // include('server/connection.php');

    // if(isset($_SESSION['logged_in'])){
    //     header('location: profilePage .php');
    //     exit;
    // }

    // if(isset($_POST['login_btn'])){
    //     $email_akun = $_POST['email_akun'];
    //     $pass_akun = ($_POST['pass_akun']);

    //     $query = "SELECT id_akun, nama_akun, email_akun, pass_akun, pict_akun FROM akun 
    //     WHERE email_akun = ? AND pass_akun = ? LIMIT 1";

    //     $stmt_login = $conn->prepare($query);
    //     $stmt_login->bind_param('ss', $email_akun, $pass_akun);

    //     if($stmt_login->execute()){
    //         $stmt_login->bind_result($id_akun, $nama_akun, $email_akun, $pass_akun,
    //         $pict_akun);
    //         $stmt_login->store_result();

    //         if($stmt_login->num_rows() == 1){
    //             $stmt_login->fetch();

    //             $_SESSION['id_akun'] = $id_akun;
    //             $_SESSION['nama_akun'] = $nama_akun;
    //             $_SESSION['email_akun'] = $email_akun;
    //             $_SESSION['pict_akun'] = $pict_akun;
    //             $_SESSION['logged_in'] = true;

    //             header('location: profilePage.php?messege=Logged in successfully');
    //         } else {
    //             header('location: login.php?error=Could no verify your account');
    //         }
    //     } else{
    //         //error
    //         header('location: login.php?error=Something went wrong!');
    //     }
    // }
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

    <div class="container login-form">
        <img src="Assets/image/Login form img.jpg" class="form-img" alt="">
        <div class="form-content">
            <div class="form-text">
            <h3>Login to Miracle</h3>
            <form methode="post" action="login.php" id="form-login">
                <div class="alert" role="alert">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                        }
                    ?>
                </div>
                <div>
                    <input type="email" name="email_akun" placeholder="Masukan email">
                </div>
                <div>
                    <input type="password" name="pass_akun" placeholder="Masukan password">
                </div>
                <div>
                    <input type="submit" name="login_btn" value="Login">
                </div>
                Belum punya akun? <a href="Register.php" class=""> Register</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>