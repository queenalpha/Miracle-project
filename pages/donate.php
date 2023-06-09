<!-- Konfigurasi -->
<?php
$title = "Miracle - Detail";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);
?>
<!-- Logic -->
<?php include('../components/header.php'); ?>

<nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <img src="../assets/icon/typograph.png" class="ms-5" width="100px" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center me-5" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php">Donasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="managecampaign.php">Campaign</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="riwayatDonasi.php">Riwayat Donasi</a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav me-5">
        <li class="nav-but dropdown">
            <a class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                href="#">
                <img src="../assets/image/Login form img.jpg" class="object-fit-cover rounded-4 " width="30px"
                    height="30px" alt="">
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="profilePage.php">Profile</a>
                    <a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a>
                    <a class="dropdown-item" href="campaign.php">Buat Campaign</a>
                    <a class="dropdown-item" href="../server/logout.php"
                        onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                </li>
            </ul>
        </li>
        <li class="nav-but">
            <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
        </li>
    </ul>
</nav>


<main>

    <!-- Home donation -->
    <section class="open-donation md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Open Donation</h2>
                    <p>Be a miracle foreach others</p>
                </div>
            </div>

            <div class="row align-items-center ms-4" id="donasi">
                <?php while ($row = mysqli_fetch_assoc($result_camp)): ?>
                    <div class="col-12 col-md-12 col-lg-4 mb-5">
                        <div class="card p-1 h-100">
                            <img src="Assets/image/<?= $row['foto'] ?>" class="card-img-top object-fit-cover" width="100%"
                                height="201px" alt="">
                            <div class="card-body">
                                <h5 class="card-tittle">
                                    <?= $row['campaign_name'] ?>
                                </h5>
                                <p class="card-text">
                                    <?= $row['campaign_description'] ?>
                                </p>
                                <p class="card-text">Membutuhkan Rp
                                    <?= number_format($row['campaign_target']) ?>
                                </p>
                                <button type="button" class="btn-donasi" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Donate
                                </button>

                                <!-- Modal Donate Data Donatur -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center justify-content-center"
                                                    id="exampleModalLabel">Ayo berdonasi
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data" action="#">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-20 col-form-label col-form-label-sm">Nama</label>
                                                        <div class="col-sm-20">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" name="judul" placeholder="Masukan nama">
                                                        </div>
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-20 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-20">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" name="harga"
                                                                placeholder="Masukan Email">
                                                        </div>
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-20 col-form-label col-form-label-sm">Telphone</label>
                                                        <div class="col-sm-20 mb-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" name="harga"
                                                                placeholder="Masukan Telephone">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn-donasi mt-3" data-bs-toggle="modal"
                                                            data-bs-target="#transaksi" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
    </section>

    <!-- advertise -->
    <section class="advertise">
        <div class="container">
            <video width="100%" class="video rounded-4" autoplay="true" loop="true">
                <source src="../assets/videoAdvertise.mov" type="video/mp4">
            </video>
        </div>
    </section>


    <!-- inviting -->
    <div class="inviting">
        <h3>
            Make your life useful to others
        </h3>
        <p>
            Create a miracle for someone who still wants to keep fighting
        </p>
        <a href="donasiPage.php" type="button" class="btn btn-outline-light">
            Donation
        </a>
        <a href="campaign.php" type="button" class="btn btn-outline-light">
            Buat Campaign
        </a>
    </div>

    <!-- Information donatur dan dana terkumpul -->
    <div class="container ">
        <section class="left-content">
            <i class="fa-solid fa-users user" style="color: #e5ba73;"></i>
            <div class="left-text">
                <h5>10.000</h5>
                <p>#temanbaik telah berdonasi</p>
            </div>
        </section>
        <section class="right-content">
            <i class="fa-solid fa-money-check user" style="color: #e4b673;"></i>
            <div class="left-text">
                <h5>Rp10.000.000.00</h5>
                <p>Dana terkumpul dari #temanbaik</p>
            </div>
        </section>
    </div>

</main>


<?php include('../components/js.php'); ?>

<script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-white', 'shadow');
        } else {
            nav.classList.remove('bg-white', 'shadow');
        }
    })
</script>
<?php include('../components/footer.php'); ?>
<?php include('../components/close.php'); ?>