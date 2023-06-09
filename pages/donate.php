<!-- Konfigurasi -->
<?php
$title = "Miracle - Detail";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns";
$result_camp = mysqli_query($conn, $from_campaign);
?>

<?php include('../components/header.php'); ?>

    
    <!-- Home donation -->
    <section class="open-donation md-5">
        <!-- TODO : Kasih kondisi jika page dari page home back ke home,
        jika page dari landing back ke landing -->
        <a href="landing.php"  class="ms-5 p-5">
            <img src="../assets/icon/back_arrow.png" width="30px" alt="">
        </a>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>Open Donation</h2>
                    <p>Sesuatu yang kecil bagi kita. <br> adalah sesuatu yang besar bagi mereka.</p>
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
                                                        <a href="">
                                                            <button>Save</button>
                                                        </a>
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
    </section
    <?php include('../components/js.php'); ?>
    <?php include('../components/footer.php'); ?>   
