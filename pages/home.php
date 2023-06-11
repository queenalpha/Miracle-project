<!-- Konfigurasi -->
<?php
$title = "Miracle - Home";
$prevent = 'guest';
include('../server/connection.php');
var_dump($_SESSION);
die();
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);
?>
<link rel="stylesheet" href="../Assets/css/testt.css">
<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<?php include('../components/carousel.php'); ?>
<!-- Modal Data Donatur -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<main>
  <section class="container">
    <div class="text-center my-5">
      <h2>Open Donation</h2>
      <small class="text-muted fst-italic">Be a miracle foreach others</small>
    </div>
    <div class="row align-items-center" id="donasi">
      <?php while ($row = mysqli_fetch_assoc($result_camp)): ?>
        <div class="col-12 col-md-12 col-lg-4 mb-5">
          <div class="card p-1 h-100">
            <img src="<?= $row['campaign_thumbnail'] ?>" class="card-img-top object-fit-cover" width="100%" height="201px"
              alt="thumbnail campaign">
            <div class="card-body">
              <h5 class="card-tittle">
                <?= $row['campaign_name'] ?>
              </h5>
              <p class="card-text">
                <?= $row['campaign_description'] ?>
              </p>
              <div class="progress my-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 15%"></div>
              </div>
              <p class="card-text">Membutuhkan Rp
                <?= number_format($row['campaign_target']) ?>
              </p>
              <button type="button" class="btn-donasi" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Donate
              </button>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
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
    <a href="campaign.php" type="button" class="btn btn-outline-light">
      Buat Campaign
    </a>
  </div>
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
</script>
<?php include('../components/close.php'); ?>