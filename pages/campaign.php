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
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>

<?php include('../components/sidebar.php');?>

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
        <div class="d-flex">
            <h3>Daftar Campaign Kamu</h3>
            <button class="btn-campaign" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Campaign</button>
        </div>
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
    <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Campaign</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Akhir</th>
                    <th scope="col">Target</th>
                    <th scope="col">Terkumpul</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO : LIMIT 4 BARIS AJA -->
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>11-12-2023</td>
                    <td>30-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                    <td>Process</td>
                    <!-- <td>Approved</td> -->
                    <td colspan="2" class="col-2 text-center">
                        <div class="action">
                            <a href="" class="a-edit text-decoration-none">
                            Edit
                            </a>
                            <a href="" class="a-hapus text-decoration-none">
                            Hapus
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
    </table>

    <nav aria-label="Page navigation example" class="nav-pag">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
    </nav>

</div>



    
    

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>