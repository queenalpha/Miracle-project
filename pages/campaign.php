<!-- Konfigurasi -->
<?php
$title = "Miracle - Create Campaign";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php

// $id_creator =  $_POST['campaign_creator'];
// $daftar_campaign = "SELECT * FROM campaigns where campaign_creator = '$id_creator' desc LIMIT 4";
// $result_list = mysqli_query($conn, $daftar_campaign);
$daftar_campaign = "SELECT * FROM campaigns order by campaign_id desc LIMIT 4";
$result_list = mysqli_query($conn, $daftar_campaign);
if (isset($_POST['btn-campaign'])) {
    $campaign_name = $_POST['name'];
    $keterangan = $_POST['description'];
    $event_start = $_POST['start'];
    $event_end = $_POST['end'];
    $target_donasi = $_POST['target'];
    $path = "../assets/image" . basename($_FILES['thumbnail']['name']);
    $foto_campaign = $_FILES['thumbnail']['name'];
    $me = $_SESSION['id'];
    move_uploaded_file($_FILES['campaign_thumbnail']['tmp_name'], $path);

    $buat_campaign = "INSERT INTO campaigns
                    Values (null,'$campaign_name','$keterangan','$event_start','$event_end','$foto_campaign','$target_donasi','$me',null)";
    if (mysqli_query($conn, $buat_campaign)) {
        $success = true;
    } else {
        $success = false;
    }

    header("Location: campaign.php?created=$success");
}
?>
<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php'); ?>

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
                        <form method="POST" enctype="multipart/form-data" action="">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Nama
                                    Campaign</label>
                                <div class="col-sm-20">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="name" placeholder="Masukan Nama Campaign">
                                </div>
                                <label for="colFormLabelSm"
                                    class="col-sm-20 col-form-label col-form-label-sm">Keterangan</label>
                                <div class="col-sm-20">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="description" placeholder="Keterangan Campaign">
                                </div>
                                <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                                    dimulai</label>
                                <div class="col-sm-20">
                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="start" placeholder="Keterangan Campaign">
                                </div>
                                <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                                    berakhir</label>
                                <div class="col-sm-20">
                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="end" placeholder="Keterangan Campaign">
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
                                        name="thumbnail">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn-donasi mt-3" name="btn-campaign" value="Buat campaign">
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
                <th scope="col">#</th>
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
            <?php $i = 0;
            while ($row = mysqli_fetch_assoc($result_list)):
                $i++; ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td class="table-campaign">
                        <?= $row['campaign_name']; ?>
                    </td>
                    <td class="table-campaign">
                        <?= $row['campaign_start']; ?>
                    </td>
                    <td class="table-campaign">
                        <?= $row['campaign_end']; ?>
                    </td>
                    <td class="table-campaign">
                        <?= 'Rp. ' . number_format($row['campaign_target']) . ',-'; ?>
                    </td>
                    <td class="table-campaign">
                        <?php
                        $target = $row['campaign_id'];
                        $sum = "SELECT sum(donation_amount) FROM `donations` WHERE donations.donation_campaign = $target";
                        $terkumpul = mysqli_fetch_array(mysqli_query($conn, $sum));
                        echo 'Rp. ' . number_format($terkumpul[0]) . ',-';
                        ?>
                    </td>
                    <td class="table-campaign">
                        <?php
                        if ($row['campaign_approval'] == 2) {
                            echo "Diselesaikan";
                        } else if ($row['campaign_approval'] == 1) {
                            echo "Disetujui";
                        } else {
                            echo "Belum Disetujui";
                        } ?>
                    </td>
                    <!-- <td>Approved</td> -->
                    <td colspan="2" class="col-2 text-center">
                        <div class="action">
                            <a href="" class="a-edit text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#updateModal">
                                Edit
                            </a>
                            <a href="" class="a-hapus text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- edit modal campaign -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Campaign Kamu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Nama
                                Campaign</label>
                            <div class="col-sm-20">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="name"
                                    placeholder="Masukan Nama Campaign" value="">
                            </div>
                            <label for="colFormLabelSm"
                                class="col-sm-20 col-form-label col-form-label-sm">Keterangan</label>
                            <div class="col-sm-20">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="description" placeholder="Keterangan Campaign" value="">
                            </div>
                            <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                                dimulai</label>
                            <div class="col-sm-20">
                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm" name="start"
                                    placeholder="Keterangan Campaign" value="">
                            </div>
                            <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                                berakhir</label>
                            <div class="col-sm-20">
                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm" name="end"
                                    placeholder="Keterangan Campaign" value="">
                            </div>
                            <label for="colFormLabelSm"
                                class="col-sm-20 col-form-label col-form-label-sm">Target</label>
                            <div class="col-sm-20 mb-2">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="target" placeholder="Target Campaign" value="">
                            </div>
                            <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Foto</label>
                            <div class="col-sm-20 mb-2">
                                <input type="file" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="thumbnail" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn-donasi mt-3" name="btn-campaign" value="Buat campaign">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mau hapus campaign ini?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="submit" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

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

<!-- alert -->
<?php
if (isset($_GET["created"]) && $_GET["created"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        Yeay! Campaign kamu berhasil dibuat!
        <a href="campaign.php" class="btn-close"></a>
    </div>
<?php } else if (isset($_GET["created"]) && $_GET["created"] == false) { ?>
        <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            Yah, Campaign kamu gagal ditambahkan..
            <a href="campaign.php" class="btn-close"></a>
        </div>
<?php }

if (isset($_GET["updated"]) && $_GET["updated"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Campaign kamu berhasil di update!
        <a href="index.php" class="btn-close"></a>
    </div>
<?php } else if (isset($_GET["updated"]) && $_GET["updated"] == false) { ?>
        <div id="alert" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            Gagal memperbarui campaign kamu..
            <a href="index.php" class="btn-close"></a>
        </div>
<?php }
if (isset($_GET["deleted"]) && $_GET["deleted"] == true) {
    ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Campaign berhasil dihapus!!
        <a href="index.php" class="btn-close"></a>
    </div>
<?php } else if (isset($_GET["deleted"]) && $_GET["deleted"] == false) { ?>
        <div id="alert" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            Campaign kamu gagal dihapus...
            <a href="index.php" class="btn-close"></a>
        </div>
<?php }
?>


</div>

<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>