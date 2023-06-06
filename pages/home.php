<?php $title = "Miracle - Donasi"; ?>
<?php include('../server/connection.php');

$from_campaign = "SELECT * FROM campaign ORDER BY campaign_id desc";
$result_camp = mysqli_query($conn, $from_campaign);
?>
<?php include('../components/header.php'); ?>
<?php include('../components/navbar.php'); ?>
<header>
  <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <a href="landingPage.php">
      <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</header>


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
              <?php echo $row['nama_campaign'] ?>
            </h5>
            <p class="card-text">
              <?php echo $row['deskripsi'] ?>
            </p>
            <p class="card-text">Membutuhkan Rp
              <?php echo number_format($row['target']) ?>
            </p>
            <button type="button" class="btn-donasi">Donate</button>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>


<?php include('../components/js.php'); ?>
<?php include('../components/footer.php'); ?>