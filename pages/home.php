<!-- Konfigurasi -->
<?php
$title = "Miracle - Home";
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$from_campaign = "SELECT * FROM campaigns ORDER BY campaign_id desc";
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