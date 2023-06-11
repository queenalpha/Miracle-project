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

if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_FILES['avatar']['name'];
    $temp = explode(".", $avatar);
    $storename = preg_replace('/\s+/', '_', $id . '_' . $name) . '.' . end($temp);
    $query = "UPDATE `accounts` SET `account_name` = '$name', `account_email` = '$email', `account_password` = '$password', `account_phone` = '$phone', `account_avatar` = '$storename', `account_level` = '$level' WHERE `accounts`.`account_id` = $id";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../assets/image/profile/" . $storename);
        header('Location: ../pages/profile.php?account=' . $id);
    }
}
?>
<!-- UI -->
<link rel="stylesheet" href="../assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php'); ?>

<div class="container profile">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="profile-content d-flex">
            <div>
                <img id="preview" src="<?php if (!empty($row['account_avatar'])) {
                    echo "../assets/image/profile/" . $row['account_avatar'];
                } else {
                    echo "../assets/image/profile/placeholder.png";
                }
                ?>" class="profile-img object-fit-cover" width="120px" height="120px">
            </div>
            <div class="bio">
                <h4>
                    <?= $row['account_name'] ?>
                </h4>
                <h6>
                    <?= $row['account_phone'] ?>
                </h6>
                <p>#temanbaik #BeMiracle</p>
            </div>
        </div>
        <!-- edit profile -->
        <div class="form-profile">
            <form method="post" enctype="multipart/form-data">
                <input required type="hidden" name="id" value="<?= $row['account_id']; ?>">
                <div class="form-row">
                    <div class="d-flex px-3 col-5">
                        <input required type="text" class="form-control" name="name" value="<?= $row['account_name']; ?>"
                            placeholder="Masukan Nama">
                    </div>
                    <div class="d-flex px-3 col-5">
                        <input required type="email" class="form-control" name="email" value="<?= $row['account_email']; ?>"
                            placeholder="Masukan Email">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="d-flex px-3 col-5">
                        <input required type="tel" class="form-control" name="phone" value="<?= $row['account_phone']; ?>"
                            placeholder="Masukan Telephone">
                    </div>
                    <div class="px-3 mt-2 col-5">
                        <input id="uploadPicture" required type="file" class="form-control" name="avatar"
                            placeholder="Masukan Photo">
                    </div>
                </div>
                <button class="edit-btn" name="edit">Edit Profile</button>
            </form>
        </div>
    <?php endwhile; ?>
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
<script>
    uploadPicture.onchange = evt => {
        const [file] = uploadPicture.files
        if (file) {
            $("#preview").show();
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
<?php include('../components/close.php'); ?>