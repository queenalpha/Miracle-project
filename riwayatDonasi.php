<!-- <?php
session_start();
include ('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: profilePage.php');
    exit;   
} 

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email_akun']);
        header('location: login.php');
        exit;
    } else {
        echo "Session logged_in tidak ditemukan.";
    }
  exit;
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/user.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="CSS/bootstrap-5.3.0-alpha3-dis/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="icon" type="image/png" href="Assets/icon/icon.png">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
        <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
    </nav>
    
    <div class="side-bar">
        <div class="side-text">
            <ul>
                <li>
                    <a href="profilePage.php">Profile</a>
                </li>
                <li>
                    <a href="">Riwayat Donasi</a>
                </li>
                <li>
                    <a href="campaign.php">Program Campaign</a>
                </li>
            </ul>

            <div  class="link-bottom">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="profilePage.php?logout=1">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   
    <div class="container">
        <div class="intro-judul">
            <h3>Riwayat Donasi Anda</h3>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Campaign</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nominal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Nama kegiatan</td>
                  <td>keterangannya</td>
                  <td>11-12-2023</td>
                  <td>10,0000</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Nama kegiatan</td>
                  <td>keterangannya</td>
                  <td>11-12-2023</td>
                  <td>10,0000</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Nama kegiatan</td>
                  <td>keterangannya</td>
                  <td>11-12-2023</td>
                  <td>10,0000</td>
                </tr>
              </tbody>
        </table>
    </div>
</body>
</html>