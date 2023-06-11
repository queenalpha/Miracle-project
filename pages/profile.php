<!-- Konfigurasi -->
<?php
$title = "Miracle - Your profile";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$target = $_SESSION['id'];
$query = "SELECT * FROM accounts WHERE account_id = $target";
$result = mysqli_query($conn, $query);

if (isset($_POST['edit-profile'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_FILES['avatar']['name'];
    $temp = explode(".", $avatar);
    $storename = preg_replace('/\s+/', '_', $id . '_' . $name) . '.' . end($temp);

    $query = "UPDATE `accounts` SET `account_name` = '$name', `account_email` = '$email',  `account_phone` = '$phone', `account_avatar` = '$storename', 
    WHERE `accounts`.`account_id` = $id";

    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../assets/image/profile/" . $storename);
        if (mysqli_query($conn, $query)) {
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "../assets/image/profile/" . $storename);
            header('Location: ../pages/profile.php?account=' . $id);
        }

    }
}
// if (isset($_POST['edit-profile'])) {

// $id_akun = $_POST['id'];
// $nama_akun = $_POST['name'];
// $email_akun = $_POST['email'];
// $Telephone = $_POST['phone'];
// $path = "../Assets/images/" . basename($_FILES['avatar']['name']);
// $image = $_FILES['avatar']['name'];

// move_uploaded_file($_FILES['avatar']['name'], $path);

// $query = "UPDATE accounts SET account_name = '$nama_akun', account_email = '$email_akun', account_phone = '$Telephone', account_avatar = '$image' WHERE account_id = '$id_akun'";
// if (mysqli_query($conn, $query)) {
//     $success = true;
// } else {
//     $success = false;
// }
// header("Location: profile.php?updated=$success");
// }
?>
<!-- UI -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php'); ?>

<div class="container profile">
    <div class="profile-content d-flex">
        <div>
            <img src="../Assets/image/profile/team-2.jpg" class="profile-img object-fit-cover" width="120px"
                height="120px" alt="">
        </div>

        <div class="bio">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <h4>
                    <?php echo $row['account_name'] ?>
                </h4>
                <h6>
                    <?php echo $row['account_phone'] ?>
                </h6>


                <p>#temanbaik #BeMiracle</p>
            </div>
        </div>

        <!-- edit profile -->
        <div class="form-profile">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['account_id']; ?>">
                <div class="form-row">
                    <div class="d-flex px-3 col-5">
                        <input type="username" class="form-control" name="name" value="<?php echo $row['account_name']; ?>"
                            placeholder="Masukan Nama">
                    </div>
                    <div class="d-flex px-3 col-5">
                        <input type="email" class="form-control" name="email" value="<?php echo $row['account_email']; ?>"
                            placeholder="Masukan Email">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="d-flex px-3 col-5">
                        <input type="tel" class="form-control" name="phone" value="<?php echo $row['account_phone']; ?>"
                            placeholder="Masukan Telephone">
                    </div>
                    <div class="px-3 mt-2 col-5">
                        <input type="file" class="form-control" name="avatar" placeholder="Masukan Photo">
                    </div>
                </div>
            <?php endwhile; ?>
            <button class="edit-btn" name="edit-profile">Edit Profile</button>
        </form>
    </div>

    <!-- alert -->

    <?php
    if (isset($_GET["updated"]) && $_GET["updated"] == true) {
        ?>
        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil mengubah profile kamu!
            <a href="profile.php" class="btn-close"></a>
        </div>
    <?php } else if (isset($_GET["updated"]) && $_GET["updated"] == false) { ?>
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal mengubah profile kamu..
                <a href="profile.php" class="btn-close"></a>
            </div>
    <?php }
    ?>

</div>

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>