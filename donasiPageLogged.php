
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/donasiPage.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="../CSS/bootstrap-5.3.0-alpha3-dis/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="icon" type="image/png" href="Assets/icon/icon.png">
    <title>Document</title>
</head>
<body>
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
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#donasi">Donasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="campaign.php">Fundraiser</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="riwayatDonasi.php">Riwayat Donasi</a>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav me-5">
            <li class="nav-but dropdown">
            <a class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              <img src="Assets/image/Login form img.jpg" class="object-fit-cover rounded-4" width="30px" height="30px" alt="">
            </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="profilePage.php">Profile</a>
                  <a class="dropdown-item" href="#">Edit profile</a>
                  <a class="dropdown-item" href="#">Dasbord</a>
                  <a class="dropdown-item" href="index.php?logout=1" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                </li>
              </ul>
            </li>
              <li class="nav-but">
                  <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
              </li>
            </ul>
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
              <div class="col-12 col-md-12 col-lg-4 mb-5">
                <div class="card p-1 h-100">
                  <img src="Assets/image/cancer.jpg"class="card-img-top object-fit-cover" width="100%" height="201px" alt="">
                  <div class="card-body">
                    <h5 class="card-tittle">Donasi untuk ariel</h5>
                    <p class="card-text">Ariel, gadis kecil 12 tahun sedang berjuang untuk kesembuhannya</p>
                    <p class="card-text">Membutuhkan Rp500,000</p>
                    <button class="btn-donasi">Donate</button>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 mb-5">
                <div class="card p-1 h-100">
                  <img src="Assets/image/cancer.jpg"class="card-img-top object-fit-cover" width="100%" height="201px" alt="">
                  <div class="card-body">
                    <h5 class="card-tittle">Donasi untuk ariel</h5>
                    <p class="card-text">Ariel, gadis kecil 12 tahun sedang berjuang untuk kesembuhannya</p>
                    <p class="card-text">Membutuhkan Rp500,000</p>
                    <button class="btn-donasi">Donate</button>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 mb-5">
                <div class="card p-1 h-100">
                  <img src="Assets/image/cancer.jpg"class="card-img-top object-fit-cover" width="100%" height="201px" alt="">
                  <div class="card-body">
                    <h5 class="card-tittle">Donasi untuk ariel</h5>
                    <p class="card-text">Ariel, gadis kecil 12 tahun sedang berjuang untuk kesembuhannya</p>
                    <p class="card-text">Membutuhkan Rp500,000</p>
                    <button class="btn-donasi">Donate</button>
                  </div>
                </div>
              </div>
          </div>
    </div>
    </section>
  
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>