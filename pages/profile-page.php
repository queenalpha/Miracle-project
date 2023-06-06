<?php $title = "Miracle - Landing Page"; ?>
<?php include('../server/connection.php');
include('../components/auth.php');
?>
<?php include('../components/header.php'); ?>
<nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
</nav>

<div class="side-bar">
    <div class="side-text">
        <ul>
            <li>
                <a href="">Profile</a>
            </li>
            <li>
                <a href="riwayatDonasi.php">Riwayat Donasi</a>
            </li>
            <li>
                <a href="campaign.php">Program Campaign</a>
            </li>
        </ul>

        <div class="link-bottom">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="profilePage.php?logout=1">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container profile">
    <div class="profile-content d-flex">
        <img src="Assets/image/profile/team-2.jpg" class="profile-img" width="120px" height="120px" alt="">
        <div class="bio">
            <h4>Fahri aqila putra</h4>
            <h6>0859321324</h6>
            <p>#temanbaik #BeMiracle</p>
        </div>
    </div>

    <div class="container">
        <form>
            <div class="form-row my-3 ">
                <div class="col-4">
                    <label for="Email">Name</label>
                    <input type="username" class="form-control" placeholder="Name">
                </div>
                <div class="form-email col-4 ms-5">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-tel col-4">
                    <label for="tel">Telephone</label>
                    <input type="tel" class="form-control" placeholder="Telephone">
                </div>
                <div class="form-photo col-4 ms-5">
                    <label for="Email">Photo</label>
                    <input type="file" class="form-control" placeholder="Email">
                </div>
            </div>
        </form>
        <button class="edit-btn btn-second">Edit Profile</button>
    </div>
</div>


<?php include('../components/js.php'); ?>
<?php include('../components/footer.php'); ?>