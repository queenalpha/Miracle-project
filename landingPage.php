<!-- <?php
session_start();
include 'server/connection.php';

$from_campaign = "SELECT * FROM campaign ORDER BY ID_campaign desc LIMIT 3";
$result_camp = mysqli_query($conn, $from_campaign);

if(isset($_SESSION['logged_in'])){
  header('location: index.php');
  exit;
}
// session_start();
// if (isset($_SESSION['logged_in'])) {
//     $email_akun = $_SESSION['email_akun'];
//     $query = "SELECT * FROM akun WHERE email_akun = '$email_akun'";
//     $result = mysqli_query($conn, $query);
// }


// if (!isset($_SESSION['logged_in'])) {
//     header('location: login.php');
//     exit;
// }


// if (isset($_GET['logout'])) {
//     if (isset($_SESSION['logged_in'])) {
//         unset($_SESSION['logged_in']);
//         unset($_SESSION['email_akun']);
//         header('location: login.php');
//         exit;
//     } else {
//         echo "Session logged_in tidak ditemukan.";
//     }
// }


?> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/main.css">
  <link rel="stylesheet" href="CSS/bootstrap-5.3.0-alpha3-dist/js/style.js">
  <link rel="icon" type="image/png" href="Assets/icon/icon.png">
  <title>Miracle - Menjadi orang baik</title>
</head>

<body>
 
  <!-- NavBar section -->
  <header>
    <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
      <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center me-5" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#donasi">Donation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
        </ul>
      </div>
      <a href="login.php">
        <button type="button" class="btn btn-yellow  rounded-1 me-5">Masuk</button>
      </a>
      
    </nav>
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
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
        <h5>Do Somehting Special <br> To Help Others</h5>
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
              <img src="Assets/image/<?php echo $row['foto']?>"class="card-img-top object-fit-cover" width="100%" height="201px" alt="">
              <div class="card-body">
                <h5 class="card-tittle"><?php echo $row['nama_campaign']?></h5>
                <p class="card-text"><?php echo $row['deskripsi']?></p>
                <p class="card-text">Membutuhkan Rp.<?php echo number_format($row['target']) ?></p>
                <button class="btn-donasi">Donate</button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> 
  <script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function(){
    if(window.pageYOffset > 100){
        nav.classList.add('bg-white', 'shadow');
    } else{
        nav.classList.remove('bg-white', 'shadow');
    } 
    })
  </script>
</body>

</html>
