<!-- Model -->
<?php
$title = "Miracle - Landing Page";
$prevent = 'authenticated';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_end desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);

if (isset($_POST['donate'])) {
    $account = $_POST['account'];
    $campaign = $_POST['campaign'];
    if (empty($_POST['amount'])) {
        $amount = $_POST['customdigit'];
    } else {
        $amount = $_POST['amount'];
    }
    $payment = $_POST['payment'];
    $queryDonate = "INSERT INTO `donations` (`donation_account`, `donation_campaign`, `donation_date`, `donation_amount`, `donation_payment`) VALUES ('$account', '$campaign', now(), '$amount', '$payment')";
    if (mysqli_query($conn, $queryDonate)) {
        if (isset($_SESSION['logged_in'])) {
            header('Location: ../pages/home.php');
        } else {
            header('Location: ../pages/landing.php');
        }
        exit();
    }
}
?>
<!-- View -->
<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<?php include('../components/carousel.php'); ?>
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
    <section class="container">
        <div class="text-center my-5">
            <h2>Open Donation</h2>
            <small class="text-muted fst-italic">Be a miracle foreach others</small>
        </div>
        <div class="row align-items-center mt-5" id="donasi">
            <?php while ($row = mysqli_fetch_assoc($result_camp)): ?>
                <div class="col-12 col-md-12 col-lg-4 mb-5">
                    <div class="card p-1 h-100">
                        <img src="<?= '../assets/image/campaign/' . $row['campaign_thumbnail'] ?>"
                            class="card-img-top object-fit-cover" width="100%" height="201px" alt="thumbnail campaign">
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
                                    </small></p>
                                <button type="button" class="btn-donasi" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Donate
                                </button>
                            </div>
                            <button type="button" class="donate btn-donasi" data-bs-toggle="modal" data-bs-target="#modal"
                                data-campaign="<?= $row['campaign_id'] ?>" data-account="<?php
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
            <?php endwhile; ?>
            <a class="btn btn-primary" href="../pages/campaigns.php" role="button">Tampilkan Semua</a>
        </div>
        </div>
    </section>
    <section class="container">
        <video class="w-100 rounded-4 my-5" autoplay="true" loop="true">
            <source src="../assets/videoAdvertise.mov" type="video/mp4">
        </video>
    </section>
    <div class="inviting">
        <h3>
            Make your life useful to others
        </h3>
        <p>
            Create a miracle for someone who still wants to keep fighting
        </p>
        <a href="donate.php" type="button" class="btn btn-outline-light">
            Donation
        </a>
        <a href="login.php" type="button" class="btn btn-outline-light">
            Buat Campaign
        </a>
    </div>
    <!-- quantity of user and donatur -->
    <section class="container my-5">
        <div class="row">
            <div class="col">
                <div class="card py-4">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-users user" style="font-size:48px;color: #e5ba73;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                                    $query = "SELECT count(donation_id) FROM `donations`";
                                    $result = mysqli_query($conn, $query);
                                    $total = mysqli_fetch_array($result);
                                    echo $total[0] . " donasi";
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <small class="text-body-secondary">
                                        Telah kami bantu jembatani di Miracle!
                                    </small>
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
                                <h5 class="card-title">
                                    <?php
                                    $query = "SELECT SUM(donation_amount) FROM `donations`";
                                    $result = mysqli_query($conn, $query);
                                    $total = mysqli_fetch_array($result);
                                    echo
                                        "Rp." .
                                        number_format($total[0])
                                        . ",-";
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <small class="text-body-secondary">
                                        Dana terkumpul dari <a class="text-decoration-none" href="#">#TemanBaik</a>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php include('../components/footer.php'); ?>
<?php include('../components/js.php'); ?>
<script>
    var nav = document.querySelector('nav'); window.addEventListener('scroll', function () {
        if (window.pageYOffset >
            100) {
            nav.classList.add('bg-white', 'shadow');
        } else {
            nav.classList.remove('bg-white', 'shadow', 'text-dark');
        }
    })
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