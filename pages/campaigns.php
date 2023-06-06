<?php $title = "Miracle - Landing Page"; ?>
<?php include('../server/connection.php');

?>
<?php include('../components/header.php'); ?>
<!-- NavBar section -->
<header>


    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="Assets/image/ds1.jpg" class="d-block w-100 c-img" alt="...">
            </div>
            <div class="carousel-item c-item">
                <img src="Assets/image/pr1.jpg" class="d-block w-100 c-img" alt="...">
            </div>
        </div>
        <div class="intro carousel-caption d-md-inline text-start">
            <h5>Do Something Special <br> To Help Others</h5>
            <p>Make a miracle with your charity</p>
            <a href="donasiPage.php">
                <button class="btn-donate-intro btn-second">Donation</button>
            </a>
        </div>
    </div>
</header>


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
                            <img src="Assets/image/<?php echo $row['foto'] ?>" class="card-img-top object-fit-cover"
                                width="100%" height="201px" alt="">
                            <div class="card-body">
                                <h5 class="card-tittle">
                                    <?php echo $row['nama_campaign'] ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $row['deskripsi'] ?>
                                </p>
                                <p class="card-text">Membutuhkan Rp
                                    <?php echo number_format($row['target']) ?>
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
                <source src="Assets/videoAdvertise.mov" type="video/mp4">
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

<!-- footer -->
<footer>
    <div class="footer-copy">
        <i class="fa-sharp fa-regular fa-copyright"></i> Copryright 2023
    </div>
</footer>

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


<?php include('../components/js.php'); ?>
<?php include('../components/footer.php'); ?>