<!-- Konfigurasi -->
<?php
$title = "Miracle - Landing Page";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php

?>
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
        <form>
            <div class="form-row">
                <div class="d-flex px-3 col-5">
                    <input type="email" class="form-control" name="email" placeholder="Masukan Nama">
                </div>
                <div class="d-flex px-3 col-5">
                    <input type="password" class="form-control"  name="password" placeholder="Masukan Email">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="d-flex px-3 col-5">
                    <input type="password" class="form-control" name="password" placeholder="Masukan Telephone">
                </div>
                <div class="px-3 mt-2 col-5">
                <input type="file" class="form-control" name="email" placeholder="Masukan Photo">
                </div>
            </div>
            <div class="form-row mt-3">
                
            </div>
        </form>
       <button class="edit-btn">Edit Profile</button>
    </div>
</div>

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>