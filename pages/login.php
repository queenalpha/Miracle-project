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
    } else {
        header('Location: ../pages/login.php?error=1');
    }
}
?>
<!-- Logic -->
<?php include('../components/header.php'); ?>

<div class="container login-form">
    <img src="../assets/image/Login form img.jpg" class="form-img" alt="">
    <div class="form-content">
        <div class="form-text">
            <h3>Login to Miracle</h3>
            <form method="post" action="" id="form-login">
                <div>
                    <input type="email" name="email" placeholder="Masukan email">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Masukan password">
                </div>
                <?php if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
                <div>
                    <input type="submit" name="login" value="Login">
                </div>
                Belum punya akun? <a href="Register.php" class=""> Register</a>
            </form>
        </div>
    </div>
</div>

<?php include('../components/js.php'); ?>