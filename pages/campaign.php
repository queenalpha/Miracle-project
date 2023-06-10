<!-- Konfigurasi -->
<?php
$title = "Miracle - Create Campaign";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$tampil_campaign = "SELECT * FROM campaigns";
$result_campaign = mysqli_query($conn, $tampil_campaign);
if (isset($_POST['btn-campaign'])) {
    $campaign_name = $_POST['campaign_name'];
    $keterangan = $_POST['campaign_description'];
    $target_donasi = $_POST['campaign_target'];
    $path = "../assets/image/" . basename($_FILES['foto']['name']);
    $foto_campaign = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $path);
    $buat_campaign = "INSERT INTO campaign Values (null,'$campaign_name','$keterangan','$foto_campaign','$target_donasi')";
    if (mysqli_query($conn, $buat_campaign)) {
        $success = true;
    } else {
        $success = false;
    }
    header("location: campaign.php?created=$success");
}
?>
<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/testt.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php');?>
<nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <img src="../assets/icon/typograph.png" class="ms-5" width="100px" alt="">
</nav>

<!-- alert -->
<?php
if (isset($_GET["created"]) && $_GET["created"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show mt-3 " role="alert">
        Yeay! Campaign kamu berhasil dibuat!
        <a href="campaign.php" class="btn-close"></a>
    </div>
<?php } else if (isset($_GET["created"]) && $_GET["created"] == false) { ?>
        <div id="alert" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            Yah, Campaign kamu gagal ditambahkan..
            <a href="campaign.php" class="btn-close"></a>
        </div>
<?php }
?>


<!-- Bikin campaign disini -->
<div class="container">
    <div class="intro-judul">
        <h3>Daftar Campaign</h3>
        <button class="btn-campaign" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Campaign</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Buat
                            Campaignmu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="campaign.php">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Nama
                                    Campaign</label>
                                <div class="col-sm-20">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="campaign_name" placeholder="Masukan Nama Campaign">
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
</div>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Campaign</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Target</th>
                    <th scope="col">Terkumpul</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="col-1">1</th>
                    <td class="col-2">Nama kegiatan</td>
                    <td>11-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                    <td class="col-1">Process</td>
                    <!-- <td>Approved</td> -->
                    <td colspan="2" class="col-2">
                        <button>Hapus</button>
                        <button>Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

   

    

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>