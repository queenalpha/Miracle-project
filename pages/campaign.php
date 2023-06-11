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
$me = $_SESSION['id'];
$daftar_campaign = "SELECT * FROM campaigns WHERE `campaign_creator` = '$me' ORDER BY campaign_end desc";
$result_list = mysqli_query($conn, $daftar_campaign);

if (isset($_POST['btn-campaign'])) {
    $me = $_SESSION['id'];
    $campaign_name = $_POST['name'];
    $keterangan = $_POST['description'];
    $event_start = $_POST['start'];
    $event_end = $_POST['end'];
    $target_donasi = $_POST['target'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $temp = explode(".", $thumbnail);
    $storename = preg_replace('/\s+/', '_', $me . '_' . $campaign_name) . '.' . end($temp);
    $buat_campaign = "INSERT INTO campaigns
                    Values (null,'$campaign_name','$keterangan','$event_start','$event_end','$storename','$target_donasi','$me',null)";
    if (mysqli_query($conn, $buat_campaign)) {
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../assets/image/campaign/" . $storename);
        $success = true;
    } else {
        $success = false;
    }

    header("Location: campaign.php?created=$success");
}
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $campaign_name = $_POST['name'];
    $keterangan = $_POST['description'];
    $event_start = $_POST['start'];
    $event_end = $_POST['end'];
    $target_donasi = $_POST['target'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $temp = explode(".", $thumbnail);
    $storename = preg_replace('/\s+/', '_', $id . '_' . $campaign_name) . '.' . end($temp);
    $query = "UPDATE `campaigns` SET `campaign_name` = '$campaign_name', `campaign_description` = '$keterangan', `campaign_start` = '$event_start', `campaign_end` = '$event_end', `campaign_thumbnail` = '$storename', `campaign_target` = '$target_donasi' WHERE `campaigns`.`campaign_id` = $id";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../assets/image/campaign/" . $storename);
        header('Location: ../pages/campaign.php');
    }
}
if (isset($_GET['finish'])) {
    $target = $_GET['finish'];
    $query = "UPDATE `campaigns` SET `campaign_approval` = '2' WHERE `campaigns`.`campaign_id` = $target";
    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/campaign.php');
        exit();
    }
}
?>
<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php'); ?>
<!-- add modal campaign -->
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
                            <input required type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                name="name" placeholder="Masukan Nama Campaign">
                        </div>
                        <label for="colFormLabelSm"
                            class="col-sm-20 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="col-sm-20">
                            <input required type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                name="description" placeholder="Keterangan Campaign">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                            dimulai</label>
                        <div class="col-sm-20">
                            <input required type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                name="start" placeholder="Keterangan Campaign">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                            berakhir</label>
                        <div class="col-sm-20">
                            <input required type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                name="end" placeholder="Keterangan Campaign">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Target</label>
                        <div class="col-sm-20 mb-2">
                            <input required type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                name="target" placeholder="Target Campaign">
                        </div>
                        <div class="ratio ratio-1x1">
                            <img class="img-thumbnail object-fit-cover"
                                src="<?= "../assets/image/campaign/" . $row['account_avatar'] ?>" alt="Campaign Preview"
                                id="preview">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Foto</label>
                        <div class="col-sm-20 mb-2">
                            <input required id="uploadPicture" type="file" class="form-control form-control-sm"
                                id="colFormLabelSm" name="thumbnail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input required type="submit" class="btn-donasi mt-3" name="btn-campaign" value="Buat campaign">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                    <input required id="campaignEditID" type="hidden" name="id" value="">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Nama
                            Campaign</label>
                        <div class="col-sm-20">
                            <input required id="campaignEditName" type="text" class="form-control form-control-sm"
                                id="colFormLabelSm" name="name" placeholder="Masukan Nama Campaign" value="">
                        </div>
                        <label for="colFormLabelSm"
                            class="col-sm-20 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="col-sm-20">
                            <input required id="campaignEditDescription" type="text"
                                class="form-control form-control-sm" id="colFormLabelSm" name="description"
                                placeholder="Keterangan Campaign" value="">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                            dimulai</label>
                        <div class="col-sm-20">
                            <input required id="campaignEditStart" type="date" class="form-control form-control-sm"
                                id="colFormLabelSm" name="start" placeholder="Keterangan Campaign" value="">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Event
                            berakhir</label>
                        <div class="col-sm-20">
                            <input required id="campaignEditEnd" type="date" class="form-control form-control-sm"
                                id="colFormLabelSm" name="end" placeholder="Keterangan Campaign" value="">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Target</label>
                        <div class="col-sm-20 mb-2">
                            <input required id="campaignEditTarget" type="text" class="form-control form-control-sm"
                                id="colFormLabelSm" name="target" placeholder="Target Campaign" value="">
                        </div>
                        <div class="ratio ratio-1x1">
                            <img class="img-thumbnail object-fit-cover"
                                src="<?= "../assets/image/campaign/" . $row['account_avatar'] ?>" alt="Campaign Preview"
                                id="previewEdit">
                        </div>
                        <label for="colFormLabelSm" class="col-sm-20 col-form-label col-form-label-sm">Foto</label>
                        <div class="col-sm-20 mb-2">
                            <input required id="campaignEditThumbnail" type="file" class="form-control form-control-sm"
                                id="colFormLabelSm" name="thumbnail" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input required type="submit" class="btn-donasi mt-3" name="edit" value="Simpan Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="finishCampaign" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Selesaikan campaign ini?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a id="finishBtn" type="submit" class="btn btn-primary" href="#">Selesaikan</a>
            </div>
        </div>
    </div>
</div>

<!-- Bikin campaign disini -->
<div class="container">
    <div class="intro-judul">
        <div class="d-flex">
            <h3>Daftar Campaign Kamu</h3>
            <button class="btn-campaign" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Campaign</button>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal</th>
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
                        <a target="_blank" href="<?= "../assets/image/campaign" . $row['campaign_thumbnail'] ?>">
                            <img src="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>"
                                class="img-thumbnail object-fit-cover" alt="<?= $row['campaign_thumbnail'] ?>"
                                style="width:42px;height:42px;">
                        </a>
                    </td>
                    <td class="table-campaign text-wrap">
                        <?= $row['campaign_name']; ?>
                    </td>
                    <td class="table-campaign text-wrap">
                        <?= $row['campaign_description']; ?>
                    </td>
                    <td class="table-campaign text-wrap">
                        <?= date("d F Y", strtotime($row['campaign_start'])); ?>
                        -
                        <?= date("d F Y", strtotime($row['campaign_end'])); ?>
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
                    <td class="table-campaign text-wrap">
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
                    <td class="col text-center">
                        <div class="action">
                            <?php if (empty($row['campaign_approval'])) { ?>
                                <a href="#" class="a-edit text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#updateModal" data-id="<?= $row['campaign_id'] ?>"
                                    data-thumbnail="<?= $row['campaign_thumbnail'] ?>" data-name="<?= $row['campaign_name'] ?>"
                                    data-description="<?= $row['campaign_description'] ?>"
                                    data-start="<?= $row['campaign_start'] ?>" data-end="<?= $row['campaign_end'] ?>"
                                    data-target="<?= $row['campaign_target'] ?>">
                                    Edit
                                </a>
                            <?php } else if ($row['campaign_approval'] != '2') { ?>
                                    <a href="#" class="a-hapus text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#finishCampaign" data-campaign="<?= $row['campaign_id'] ?>">
                                        Selesaikan
                                    </a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
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
<script>
    $("#preview").hide();
    uploadPicture.onchange = evt => {
        const [file] = uploadPicture.files
        if (file) {
            $("#preview").show();
            preview.src = URL.createObjectURL(file)
        }
    }
    campaignEditThumbnail.onchange = evt => {
        const [file] = campaignEditThumbnail.files
        if (file) {
            previewEdit.src = URL.createObjectURL(file)
        }
    }
    $(".a-hapus").on("click", function () {
        $("#finishBtn").attr("href", "../pages/campaign.php?finish=" + $(this).data('campaign'));
    });
    $(".a-edit").on("click", function () {
        $("#campaignEditID").val($(this).data('id'));
        $("#campaignEditName").val($(this).data('name'));
        $("#campaignEditDescription").val($(this).data('description'));
        $("#campaignEditStart").val($(this).data('start'));
        $("#campaignEditEnd").val($(this).data('end'));
        $("#campaignEditTarget").val($(this).data('target'));
        $("#previewEdit").attr("src", "../assets/image/campaign/" + $(this).data('thumbnail'))
    });
</script>
<?php include('../components/close.php'); ?>