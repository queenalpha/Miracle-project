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
<?php include('../components/js.php'); ?>
<main>


    <!-- Home donation -->
    <section class="open-donation md-5">
        <!-- TODO : Kasih kondisi jika page dari page home maka redirect ke home,
        jika page dari landing maka redirect ke landing -->
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

            <div class="row my-5">
            <!-- Sidebar -->
            <div class="col col-12 col-md-3">
            <div class="accordion">
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-one"
                    aria-expanded="true" aria-controls="panel-one">
                    Filter By
                    </button>
                </h2>
                <div id="panel-one" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox1" checked>
                        <label class="form-check-label" for="checkbox1">
                        Bencana
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox2" checked>
                        <label class="form-check-label" for="checkbox2">
                        Sosial
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox3" checked>
                        <label class="form-check-label" for="checkbox3">
                        Pendidikan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox4" checked>
                        <label class="form-check-label" for="checkbox4">
                        Kesehatan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox5" checked>
                        <label class="form-check-label" for="checkbox5">
                        Olahraga
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox6" checked>
                        <label class="form-check-label" for="checkbox6">
                        Kerohanian
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox7" checked>
                        <label class="form-check-label" for="checkbox7">
                        Kebudayaan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox8" checked>
                        <label class="form-check-label" for="checkbox8">
                        Lingkungan
                        </label>
                    </div>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panel-two" aria-expanded="false" aria-controls="panel-two">
                    Sort By
                    </button>
                </h2>
                <div id="panel-two" class="accordion-collapse collapse show">
                    <div class="accordion-body row g-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="akanBerakhir" id="checkRadio1">
                        <label class="form-check-label" for="checkRadio1">
                        Akan berakhir
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="terbaru" id="checkRadio2" checked>
                        <label class="form-check-label" for="checkRadio2">
                        Terbaru
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="terlama" id="checkRadio3">
                        <label class="form-check-label" for="checkRadio3">
                        Terlama
                        </label>
                    </div>
                    </div>
                </div>
                </div>
                <input class="w-100 btn btn-primary btn-donasi my-4" type="submit" value="Terapkan">
            </div>
            </div>
            <!-- Campaigns Card -->
            <div class="col col-12 col-md-9">
                <div class="row g-4">
                    <?php while ($row = mysqli_fetch_assoc($result_camp)): ?>
                    <div class=" col-12 col-md-6 col-lg-4">
                        <div class="card">
                        <img src="<?= $row['campaign_thumbnail'] ?>" class="card-img-top object-fit-cover" width="100%"
                            height="201px" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                            <?= $row['campaign_name'] ?>
                            </h5>
                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100">
                            <div class="progress-bar" style="width: 25%"></div>
                            </div>
                            <small class="card-text">Membutuhkan Rp.
                            <?= number_format($row['campaign_target']) ?>
                            </small>
                            <div class="row mt-3">
                            <div class="col">
                            <button type="button" class="btn-donasi" data-bs-toggle="modal" data-bs-target="#modalDonasi">
                                Donate
                            </button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Modal Data Donatur -->
            <div class="modal fade" id="modalDonasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Ayo berdonasi
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="#">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Nama</label>
                                    <div class="col-sm-20">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="judul"
                                            placeholder="Masukan nama">
                                    </div>
                                    <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Email</label>
                                    <div class="col-sm-20">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="harga"
                                            placeholder="Masukan Email">
                                    </div>
                                    <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Telphone</label>
                                    <div class="col-sm-20 mb-2">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="harga"
                                            placeholder="Masukan Telephone">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#transaksi" data-bs-toggle="modal">
                                        <button type="submit" class="btn-donasi" name="add-donatur">Save</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
            <!-- Modal Transaksi -->
            <div class="modal fade" id="transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Ayo berdonasi
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="#">
                                <div class="payment">
                                    <button class="btn-pay">15.000</button>
                                    <button class="btn-pay">20.000</button>
                                    <button class="btn-pay">25.000</button>
                                    <button class="btn-pay mb-3">30.000</button>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-20 mb-3">
                                        <input type="text" class="form-control form-control-sm pay-input" id="colFormLabelSm" name="judul"
                                            placeholder="Masukan Donasi Anda">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn-donasi mt-3" data-bs-toggle="modal" data-bs-target="#transaksi"
                                        value="Donate">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>          
    </section>

    <?php include('../components/footer.php'); ?> 
</main>


