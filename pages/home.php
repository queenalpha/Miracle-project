<!-- Konfigurasi -->
<?php
$title = "Miracle - Home";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);
?>


<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<?php include('../components/carousel.php'); ?>

<main>
  <div class="container">
    <div class="row">
      <div class="text-center my-4 mb-5">
        <h2>Give Your Charity For Donation</h2>
        <p>Be a miracle foreach others</p>
      </div>
    </div>

    <div class="row align-items-center" id="donasi">
      <?php while ($row = mysqli_fetch_assoc($result_camp)): ?>
        <div class="col-12 col-md-12 col-lg-4 mb-5">
          <div class="card p-1 h-100">
            <img src="../assets/image/<?php echo $row['foto'] ?>" class="card-img-top object-fit-cover" width="100%"
              height="201px" alt="">
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
              <button type="button" class="btn-donasi">Donate</button>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
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