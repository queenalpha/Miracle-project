<!-- Konfigurasi -->
<?php
$title = "Miracle - Register";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
if (isset($_POST['btn_regist'])) {
    $nama_akun = $_POST['nama_akun'];
    $email_akun = $_POST['email_akun'];
    $pass_akun = $_POST['pass_akun'];
    $telepon = $_POST['Telephone'];

    $query = "INSERT INTO `accounts` (`account_name`, `account_email`, `account_password`, `account_phone`, `account_avatar`, `account_level`)
    values ('$nama_akun','$email_akun','$pass_akun','$telepon',null,null)";
    if (mysqli_query($conn, $query)) {
        header("location:login.php?alert=Akun berhasil dibuat Silahkan login");
    } else {
        header("location:Register.php?alert=Akun gagal dibuat, coba lagi!");
    }

}
?>
<!-- Logic -->
<?php include('../components/header.php'); ?>

<div class="container login-form m">
    <img src="../assets/image/Login form img.jpg" class="form-img" alt="">
    <div class="form-content">
        <div class="form-text register">
            <h3>Register to Miracle</h3>
            <form method="POST" action="Register.php" class="form-login">
                <div>
                    <input type="username" name="nama_akun" value="" placeholder="Masukan Nama" required>
                </div>
                <div>
                    <input type="email" name="email_akun" value="" placeholder="Masukan Email" required>
                </div>
                <div>
                    <input type="password" name="pass_akun" value="" placeholder="Masukan Password" required>
                </div>
                <div>
                    <input type="tel" name="Telephone" value="" placeholder="Masukan Telephone">
                </div>
                <div>
                    <?php if (isset($_GET['alert'])) {
                        echo $_GET['alert'];
                    }
                    ?>
                    <input type="submit" name="btn_regist" value="Register">
                </div>
                Sudah punyak akun? <a href="login.php" class=""> Login</a>
            </form>
        </div>
    </div>
</div>
</body>

</html>