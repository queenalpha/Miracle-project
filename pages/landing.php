<!-- Konfigurasi -->
<?php
$title = "Miracle - Landing Page";
$prevent = 'authenticated';
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);
?>
<!-- Logic -->
<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<?php include('../components/carousel.php'); ?>
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
                            <img src="<?php echo $row['campaign_thumbnail'] ?>" class="card-img-top object-fit-cover"
                                width="100%" height="201px" alt="">
                            <div class="card-body">
                                <h5 class="card-tittle">
                                    <?php echo $row['campaign_name'] ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $row['campaign_description'] ?>
                                </p>
                                <p class="card-text">Membutuhkan Rp
                                    <?php echo number_format($row['campaign_target']) ?>
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


    <!-- Lead/Inviting -->
    <div class="container-fluid py-5 text-center" style="background-color: #e5ba73;">
        <div class="my-5">
            <h4>Make your life useful to others</h4>
            <p>Create a miracle for someone who still wants to keep fighting</p>
            <a class="btn btn-primary" href="#">Donation</a>
            <a class="btn btn-primary" href="#">Buat Campaign</a>
        </div>
    </div>
    <!-- Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="card py-4">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-users user" style="font-size:48px;color: #e5ba73;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">(Kuantitas User)</h5>
                                <p class="card-text"><small class="text-body-secondary">#temanbaik telah
                                        berdonasi</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card py-4">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-money-check user" style="font-size:48px;color: #e4b673;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">(Kuantitas Rp)</h5>
                                <p class="card-text"><small class="text-body-secondary">Dana terkumpul dari
                                        #temanbaik</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('../components/footer.php'); ?>
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
<?php include('../components/close.php'); ?>