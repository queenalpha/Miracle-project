<!-- Konfigurasi -->
<?php
$title = "Miracle - Home";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc LIMIT 16";
$result_camp = mysqli_query($conn, $from_campaign);
?>


<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<?php include('../components/carousel.php'); ?>
<main class="container">
  <div class="text-center my-5">
    <h2>Give Your Charity For Donation</h2>
    <small class="text-muted fst-italic">Be a miracle foreach others</small>
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
        <input class="w-100 btn btn-primary my-4" type="submit" value="Terapkan">
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
                <span class="badge text-bg-primary mb-3">Kategori</span>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                  aria-valuemax="100">
                  <div class="progress-bar" style="width: 25%"></div>
                </div>
                <small class="card-text">Membutuhkan Rp.
                  <?= number_format($row['campaign_target']) ?>
                </small>
                <div class="row mt-3">
                  <div class="col">
                    <a class="w-100 btn btn-secondary" href="#">Detail</a>
                  </div>
                  <div class="col">
                    <a class="w-100 btn btn-primary" href="#">Donate</a>
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
    </div>
  </section>

</main>
<?php include('../components/footer.php'); ?>
<?php include('../components/js.php'); ?>
<script>
  var nav = document.querySelector(' nav'); window.addEventListener('scroll', function () {
    if (window.pageYOffset >
      100) {
      nav.classList.add('bg-white', 'shadow');
    } else {
      nav.classList.remove('bg-white', 'shadow');
    }
  })
</script>
<?php include('../components/close.php'); ?>