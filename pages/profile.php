<!-- Konfigurasi -->
<?php
$title = "Miracle - Landing Page";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php
    // masih ERROR
//     if (isset($_POST['up'])) {

//     $account_id = $_POST['account_id'];
    
//     $nama_akun = $_POST['account_name'];
//     $email_akun = $_POST['account_email'];
//     $Telephone = $_POST['account_phone'];
//     $path = "../Assets/images/" . basename($_FILES['account_pict']['name']);
//     $image = $_FILES['account_pict']['name'];
    
//     move_uploaded_file($_FILES['pict_akun']['name'], $path);
    
//     $query = "UPDATE accounts SET account_name = '$nama_akun', account_email = '$email_akun', account_phone = '$Telephone', account_avatar = '$image' WHERE ID_akun = '$account_id'";
//     $edit_profile = mysqli_query($conn, $query);
    
// }

// $info_akun = "SELECT * FROM accounts";
// $result_info = mysqli_query($conn, $info_akun);
// $row = mysqli_fetch_assoc($result_info);
// ?>
<!-- UI -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php');?>

<div class="container profile">
    <div class="profile-content d-flex">
        <div>
        <img src="../Assets/image/profile/team-2.jpg" class="profile-img object-fit-cover" width="120px" height="120px" alt="">    
        </div>
        
        <div class="bio">
            <h4>Fahri aqila putra</h4>
            <h6>0859321324</h6>
            <p>#temanbaik #BeMiracle</p>
        </div>
    </div>

    <div class="form-profile">
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="account_id" value="<?php echo $_SESSION['account_id']; ?>">
            <div class="form-row">
                <div class="d-flex px-3 col-5">
                    <input type="username" class="form-control" name="nama_akun" value="<?php echo $row['account_name']; ?>" placeholder="Masukan Nama">
                </div>
                <div class="d-flex px-3 col-5">
                    <input type="password" class="form-control"  name="email_akun" placeholder="Masukan Email">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="d-flex px-3 col-5">
                    <input type="password" class="form-control" name="Telephone" placeholder="Masukan Telephone">
                </div>
                <div class="px-3 mt-2 col-5">
                <input type="file" class="form-control" name="pict_akun" placeholder="Masukan Photo">
                </div>
            </div>
            <button class="edit-btn" name="up">Edit Profile</button>
        </form>
    </div>

        <!-- alert -->
    <?php
    if (isset($_GET["updated"]) && $_GET["updated"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil mengubah profile kamu!
        <a href="campaign.php" class="btn-close"></a>
    </div>
    <?php } else if (isset($_GET["updated"]) && $_GET["updated"] == false) { ?>
        <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal mengubah profile kamu..
            <a href="campaign.php" class="btn-close"></a>
        </div>
    <?php }
    ?>

</div>

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>