<!-- Konfigurasi -->
<?php
$title = "Miracle - Login";
$prevent = 'authenticated';
include('../server/connection.php');
?>
<!-- Logic -->
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `accounts` WHERE `account_email` = '$email' AND `account_password` = '$password' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['account_id'];
            $_SESSION['level'] = $row['account_level'];
            $_SESSION['logged_in'] = true;
        }
        header('Location: ../pages/home.php');
        exit();
    } else {
        header('Location: ../pages/login.php?error=Akun salah atau tidak ditemukan!');
    }
}
?>
<!-- Logic -->
<?php include('../components/header.php'); ?>

<div class="container login-form">
    <img src="../assets/image/Login form img.jpg" class="form-img" alt="">
    <div class="form-content">
        <form method="post" action="" id="form-login" class="row gy-3 py-4 w-50">
            <h3 class="pb-3 mb-4">Login to Miracle</h3>
            <div>
                <input class="form-control" type="email" name="email" placeholder="Masukan email">
            </div>
            <div>
                <input class="form-control" type="password" name="password" placeholder="Masukan password">
            </div>
            <?php if (isset($_GET['error'])) {
                echo $_GET['error'];
            }
            ?>
            <div>
                <input class="form-control" type="submit" name="login" value="Login">
            </div>
            <div>
                Belum punya akun? <a href="Register.php" class=""> Register</a>
            </div>
        </form>
    </div>
</div>

<?php include('../components/js.php'); ?>