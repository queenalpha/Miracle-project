<?php
include('server/connection.php');

if(isset($_POST['btn_campaign'])){
    $nama_campaign = $_POST['nama_campaign'];
    $keterangan = $_POST['deskripspi'];
    $target_donasi = $_POST['target'];
    $foto_campaign = $_POST['foto']['name'];

    $buat_campaign = "INSERT INTO campaign Values (null,'$nama_campaign','$keterangan','$target_donasi','$foto_campaign')";
    mysqli_query($conn, $buat_campaign);

    if (mysqli_query($conn, $q)) {
        $success = true;
    } else {
        $success = false;
    }

    header('location: campaign.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
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
                    <a href="riwayatDonasi.php">Riwayat Donasi</a>
                </li>
                <li>
                    <a href="#">Program Campaign</a>
                </li>
            </ul>

            <div class="link-bottom">
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

    <!-- alert -->
    <?php
  if (isset($_GET["created"]) && $_GET["created"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show mt-3 " role="alert">
      Yeay! portofolio kamu berhasil ditambahkan!
      <a href="campaign.php" class="btn-close"></a>
    </div>
  <?php } else if (isset($_GET["created"]) && $_GET["created"] == false) { ?>
      <div id="alert" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        Yah, Portofolio kamu gagal ditambahkan..
        <a href="campaign.php" class="btn-close"></a>
      </div>
    <?php }
    ?>

    <div class="container">
        <div class="intro-judul">
            <h3>Daftar Campaign</h3>
            <button class="btn-campaign" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Campaign</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Buat Campaignmu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="#">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-20 col-form-label col-form-label-sm">Nama Campaign</label>
                                    <div class="col-sm-20">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="nama_campaign" placeholder="Masukan Nama Campaign">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-20 col-form-label col-form-label-sm">Keterangan</label>
                                    <div class="col-sm-20">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="deskripsi" placeholder="Keterangan Campaign">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-20 col-form-label col-form-label-sm">Target</label>
                                    <div class="col-sm-20 mb-2">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="target" placeholder="Target Campaign">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-20 col-form-label col-form-label-sm">Foto</label>
                                    <div class="col-sm-20 mb-2">
                                        <input type="file" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="foto" placeholder="Target Campaign">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn-donasi mt-3" name="btn-campaign" value="buat campaign">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Campaign</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Target</th>
                    <th scope="col">Terkumpul</th>
                    <th scope="col">Hapus Campaign</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>11-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                    <td><button>Hapus</button></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>11-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                    <td><button>Hapus</button></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>11-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                    <td><button>Hapus</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>