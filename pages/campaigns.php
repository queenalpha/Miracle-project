<!-- Konfigurasi -->
<?php
$title = "Miracle - Detail";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$query = "SELECT * FROM campaigns order by campaign_id LIMIT 12";
$result = mysqli_query($conn, $query);

if (isset($_POST['donate'])) {
    $account = $_POST['account'];
    $campaign = $_POST['campaign'];
    if (empty($_POST['amount'])) {
        $amount = $_POST['customdigit'];
    } else {
        $amount = $_POST['amount'];
    }
    $payment = $_POST['payment'];
    $query = "INSERT INTO `donations` (`donation_account`, `donation_campaign`, `donation_date`, `donation_amount`, `donation_payment`) VALUES ('$account', '$campaign', now(), '$amount', '$payment')";
    if (mysqli_query($conn, $query)) {
        if (isset($_SESSION['logged_in'])) {
            header('Location: ../pages/home.php');
        } else {
            header('Location: ../pages/landing.php');
        }
        exit();
    }
}

?>
<?php include('../components/header.php'); ?>
<?php include('../components/js.php'); ?>
<!-- Modal Data Donatur -->
<form method="POST" action="">
    <input id="account" type="hidden" name="account" value="">
    <input id="campaign" type="hidden" name="campaign" value="">
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">
                        Jendela Donasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($_SESSION['logged_in'])) { ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="row gy-2">
                                        <div>
                                            <input type="radio" class="btn-check" name="amount" id="o-1" value="10000"
                                                autocomplete="off" checked>
                                            <label class="btn btn-secondary w-100" for="o-1">Rp. 10.000,-</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="btn-check" name="amount" id="o-2" value="25000"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="o-2">Rp. 25.000,-</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="btn-check" name="amount" id="o-3" value="50000"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="o-3">Rp. 50.000,-</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="btn-check" name="amount" id="o-4" value="75000"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="o-4">Rp. 75.000,-</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="btn-check" name="amount" id="o-5" value="100000"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="o-5">Rp. 100.000,-</label>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input name="customdigit" id="custom" type="number" class="form-control"
                                                placeholder="Jumlah kustom...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row gy-2">
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-1" value="GoPay"
                                                autocomplete="off" checked>
                                            <label class="btn btn-secondary w-100" for="p-1">GoPay</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-2" value="Shopeepay"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-2">LinkAja</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-3" value="DANA"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-3">DANA</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-4" value="OVO"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-4">OVO</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-5" value="BCA"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-5">BCA</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-6" value="Mandiri"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-6">Mandiri</label>
                                        </div>
                                        <div class="col col-md-12 col-lg-6">
                                            <input type="radio" class="btn-check" name="payment" id="p-7" value="Jago"
                                                autocomplete="off">
                                            <label class="btn btn-secondary w-100" for="p-7">Jago</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else { ?>
                        <div class="form-group">
                            <div class="row gy-2">
                                <div>
                                    <input type="radio" class="btn-check" name="amount" id="o-1" value="10000"
                                        autocomplete="off" checked>
                                    <label class="btn btn-secondary w-100" for="o-1">Rp. 10.000,-</label>
                                </div>
                                <div>
                                    <input type="radio" class="btn-check" name="amount" id="o-2" value="25000"
                                        autocomplete="off">
                                    <label class="btn btn-secondary w-100" for="o-2">Rp. 25.000,-</label>
                                </div>
                                <div>
                                    <input type="radio" class="btn-check" name="amount" id="o-3" value="50000"
                                        autocomplete="off">
                                    <label class="btn btn-secondary w-100" for="o-3">Rp. 50.000,-</label>
                                </div>
                                <div>
                                    <input type="radio" class="btn-check" name="amount" id="o-4" value="75000"
                                        autocomplete="off">
                                    <label class="btn btn-secondary w-100" for="o-4">Rp. 75.000,-</label>
                                </div>
                                <div>
                                    <input type="radio" class="btn-check" name="amount" id="o-5" value="100000"
                                        autocomplete="off">
                                    <label class="btn btn-secondary w-100" for="o-5">Rp. 100.000,-</label>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="donate" value="Donasikan">
                </div>
            </div>
        </div>
    </div>
</form>
<main>
    <!-- Home donation -->
    <section class="open-donation md-5">
        <!-- TODO : Kasih kondisi jika page dari page home maka redirect ke home,
        jika page dari landing maka redirect ke landing -->
        <a href="landing.php" class="ms-5 p-5">
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
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panel-one" aria-expanded="true" aria-controls="panel-one">
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
                                        <input class="form-check-input" type="radio" name="akanBerakhir"
                                            id="checkRadio1">
                                        <label class="form-check-label" for="checkRadio1">
                                            Akan berakhir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="terbaru" id="checkRadio2"
                                            checked>
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
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class=" col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img src="<?= '../assets/image/campaign/' . $row['campaign_thumbnail'] ?>"
                                        class="card-img-top object-fit-cover" width="100%" height="201px" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $row['campaign_name'] ?>
                                        </h5>
                                        <div class="progress" role="progressbar">
                                            <div class="progress-bar" style="width:<?php
                                            $target = $row['campaign_id'];
                                            $sum = "SELECT sum(donation_amount) FROM `donations` WHERE donations.donation_campaign = $target";
                                            $terkumpul = mysqli_fetch_array(mysqli_query($conn, $sum));
                                            $persentase = ($terkumpul[0] / $row['campaign_target']) * 100;
                                            echo round($persentase, 2);
                                            ?>%"></div>
                                        </div>
                                        <div class="row my-3">
                                            <small class="fst-italic">Terkumpul
                                                <strong>
                                                    Rp.
                                                    <?= number_format($terkumpul[0]) ?>
                                                    ,-
                                                </strong>
                                            </small>
                                            <small class="fst-italic">Membutuhkan
                                                <strong>
                                                    Rp.
                                                    <?= number_format($row['campaign_target']) ?>
                                                    ,-
                                                </strong>
                                            </small>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="donate btn-donasi" data-bs-toggle="modal"
                                                    data-bs-target="#modal" data-campaign="<?= $row['campaign_id'] ?>"
                                                    data-account="<?php
                                                    if (isset($_SESSION['logged_in'])) {
                                                        echo $_SESSION['id'];
                                                    } else {
                                                        echo '2';
                                                    } ?>">
                                                    Kirim Donasi
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
            </div>
        </div>

    </section>
    <nav aria-label="Page navigation example" class="nav-pag">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php include('../components/footer.php'); ?>
    <script>
        $('#custom').on('input', function (e) {
            $('input[name=amount]').prop('checked', false);
        })
        $('input[name=amount]').change(function () {
            $('#custom').val('');
        })
        $(".donate").on("click", function () {
            $('#account').val($(this).data('account'));
            $('#campaign').val($(this).data('campaign'));
        });
    </script>
    <?php include('../components/close.php'); ?>
</main>