<!-- Model -->
<?php
$title = "Miracle - Admin Manage";
$prevent = 'user';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
if (!isset($_GET['manage'])) {
    header('Location: ../pages/admin.php');
    exit();
}
$query1 = "SELECT * FROM campaigns WHERE campaign_approval IS NULL ORDER BY campaign_id desc";
$result1 = mysqli_query($conn, $query1);
$query2 = "SELECT * FROM accounts ORDER BY account_id desc";
$result2 = mysqli_query($conn, $query2);
$query3 = "SELECT * FROM donations ORDER BY donation_id desc";
$result3 = mysqli_query($conn, $query3);
?>
<!-- View -->
<?php include('../components/header.php'); ?>
<main id="dt-container">
    <?php include('../components/admin/topbar.php'); ?>
    <div class="d-flex">
        <aside class="flex-shrink-1">
            <?php include('../components/admin/sidebar.php'); ?>
        </aside>
        <article id="dt-content" class="w-100">
            <div class="row g-0 p-4">
                <div class="col col-12 g-4">
                    <!-- Accounts Edit -->
                    <?php if (isset($_GET['manage']) && $_GET['manage'] == 'accounts') { ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col col-12 col-md-6">
                                        <h5 class="card-title m-0 fw-bold">Account Management</h5>
                                    </div>
                                    <div class="col col-12 col-md-6">
                                        <input class="form-control" type="text" placeholder="Cari..."
                                            aria-label="search user">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include('../components/admin/footer.php'); ?>
                    <?php } ?>
                    <!-- Campaigns Edit -->
                    <?php if (isset($_GET['manage']) && $_GET['manage'] == 'campaigns') { ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col col-12 col-md-6">
                                        <h5 class="card-title m-0 fw-bold">Campaign Management</h5>
                                    </div>
                                    <div class="col col-12 col-md-6">
                                        <input class="form-control" type="text" placeholder="Cari..."
                                            aria-label="search user">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr class="align-middle sticky-top bg-white dt-shadow-bottom">
                                            <th scope="col">#</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Tanggal Berakhir</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result1)):
                                            $i++; ?>
                                            <tr class="align-middle">
                                                <th scope="row">
                                                    <?= $i ?>
                                                </th>
                                                <td>
                                                    <a target="_blank" href="<?= $row['campaign_thumbnail'] ?>">
                                                        <img src="<?= $row['campaign_thumbnail'] ?>" class="img-thumbnail"
                                                            alt="<?= $row['campaign_name'] ?>" width="42px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $row['campaign_name'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['campaign_description'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['campaign_start'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['campaign_end'] ?>
                                                </td>
                                                <td>
                                                    <?= "Rp." .
                                                        number_format($row['campaign_target'])
                                                        . ",-" ?>
                                                </td>
                                                <td>
                                                    <a class="my-2 btn btn-primary" href="#">
                                                        Approve
                                                    </a>
                                                    <a class="my-2 btn btn-danger" href="#">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php include('../components/admin/footer.php'); ?>
            </article>
        <?php } ?>
        <!-- Donations Edit -->
        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'donations') { ?>
            <article class="w-100">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col col-12 col-md-6">
                                <h5 class="card-title m-0 fw-bold">Donations Management</h5>
                            </div>
                            <div class="col col-12 col-md-6">
                                <input class="form-control" type="text" placeholder="Cari..." aria-label="search user">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr class="align-middle">
                                    <th scope="col">#</th>
                                    <th scope="col">Dari</th>
                                    <th scope="col">Untuk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result3)):
                                    $i++; ?>
                                    <tr class="align-middle">
                                        <th scope="row">
                                            <?= $i ?>
                                        </th>
                                        <td>
                                            <?php
                                            $target = $row['donation_account'];
                                            $query = "SELECT account_name FROM `accounts` WHERE `account_id` = $target";
                                            $result = mysqli_query($conn, $query);
                                            $name = mysqli_fetch_object($result);
                                            echo $name->account_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $target = $row['donation_campaign'];
                                            $query = "SELECT campaign_name FROM `campaigns` WHERE `campaign_id` = $target";
                                            $result = mysqli_query($conn, $query);
                                            $name = mysqli_fetch_object($result);
                                            echo $name->campaign_name;
                                            ?>
                                        </td>
                                        <td>
                                            Rp.
                                            <?= number_format($row['donation_amount']) ?>
                                            ,-
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary w-100" href="#">Detail</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include('../components/admin/footer.php'); ?>
            <?php } ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>