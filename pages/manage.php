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
if (isset($_GET['manage']) && isset($_POST['campaign'])) {
    $target = $_POST['campaign'];
    $query1 = "SELECT *  FROM `campaigns` WHERE `campaign_name` LIKE '%$target%' OR `campaign_description` LIKE '%$target%' OR `campaign_start` LIKE '%$target%' OR `campaign_end` LIKE '%$target%' ORDER BY campaign_id desc";
    $result1 = mysqli_query($conn, $query1);
} else {
    $query1 = "SELECT * FROM campaigns WHERE campaign_approval IS NULL ORDER BY campaign_id desc";
    $result1 = mysqli_query($conn, $query1);
}

if (isset($_GET['manage']) && isset($_POST['account'])) {
    $target = $_POST['account'];
    $query2 = "SELECT *  FROM `accounts` WHERE `account_id` != 1 AND `account_id` != 2 AND (`account_name` LIKE '%$target%' OR `account_email` LIKE '%$target%' OR `account_phone` LIKE '%$target%') ORDER BY account_id desc";
    $result2 = mysqli_query($conn, $query2);
} else {
    $query2 = "SELECT * FROM accounts WHERE `account_id` != 1 AND `account_id` != 2 ORDER BY account_name asc";
    $result2 = mysqli_query($conn, $query2);
}

if (isset($_GET['manage']) && isset($_POST['donation'])) {
    $target = $_POST['donation'];
    $query3 = "SELECT donations.donation_date, accounts.account_name, accounts.account_avatar, campaigns.campaign_name, campaigns.campaign_thumbnail, donations.donation_amount
    FROM donations
    JOIN accounts ON accounts.account_id = donations.donation_account
    JOIN campaigns ON campaigns.campaign_id = donations.donation_campaign
    WHERE accounts.account_name LIKE '%$target%' OR campaigns.campaign_name LIKE '%$target%'
    ORDER BY donations.donation_date DESC";
    $result3 = mysqli_query($conn, $query3);
} else {
    $query3 = "SELECT donations.donation_id, donations.donation_date, accounts.account_name, accounts.account_avatar, campaigns.campaign_name, campaigns.campaign_thumbnail, donations.donation_amount
    FROM donations
    JOIN accounts ON accounts.account_id=donations.donation_account
    JOIN campaigns ON campaigns.campaign_id=donations.donation_campaign
    ORDER BY donations.donation_date desc";
    $result3 = mysqli_query($conn, $query3);
}

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
            <!-- Accounts Edit -->
            <?php if (isset($_GET['manage']) && $_GET['manage'] == 'accounts') { ?>
                <div class="card">
                    <div class="card-header sticky-top bg-white">
                        <form class="row gy-2" action="" method="post">
                            <div class="col col-12 col-md-12 col-lg-8">
                                <input name="account" class="form-control" type="text" placeholder="Cari dan tekan enter..."
                                    value="<?php if (isset($_POST['account'])) {
                                        echo $_POST['account'];
                                    } ?>">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <input class="btn btn-primary w-100" type="submit" value="Search">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <a class="btn btn-secondary w-100" href="../pages/manage.php?manage=accounts">Reset</a>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col" class="ps-5">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col" class="pe-5">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result2)):
                                $i++; ?>
                                <tr class="align-middle">
                                    <th class="align-item-center ps-5" scope="row">
                                        <?= $i ?>
                                    </th>
                                    <td class="col align-item-center">
                                        <a target="_blank" href="<?= "../assets/image/profile" . $row['account_avatar'] ?>">
                                            <img src="<?= "../assets/image/profile/" . $row['account_avatar'] ?>"
                                                class="img-thumbnail object-fit-cover dt-thumbnail "
                                                alt="<?= $row['account_avatar'] ?>">
                                        </a>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= $row['account_name'] ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= $row['account_email'] ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= $row['account_phone'] ?>
                                    </td>
                                    <td class="col align-item-center pe-5">
                                        <a class="btn btn-secondary w-100"
                                            href="../pages/view.php?account=<?= $row['account_id'] ?>">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <!-- Campaign Edit -->
            <?php if (isset($_GET['manage']) && $_GET['manage'] == 'campaigns') { ?>
                <div class="card">
                    <div class="card-header sticky-top bg-white sticky-top bg-white">
                        <form class="row gy-2" action="" method="post">
                            <div class="col col-12 col-md-12 col-lg-8">
                                <input name="campaign" class="form-control" type="text"
                                    placeholder="Cari dan tekan enter..." value="<?php if (isset($_POST['campaign'])) {
                                        echo $_POST['campaign'];
                                    } ?>">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <input class="btn btn-primary w-100" type="submit" value="Search">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <a class="btn btn-secondary w-100" href="../pages/manage.php?manage=campaigns">Reset</a>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col" class="ps-5">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Target Capai</th>
                                <th scope="col">Target Donasi</th>
                                <th scope="col" class="pe-5">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result1)):
                                $i++; ?>
                                <tr class="align-middle">
                                    <th class="align-item-center ps-5" scope="row">
                                        <?= $i ?>
                                    </th>
                                    <td class="col align-item-center">
                                        <a target="_blank"
                                            href="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>">
                                            <img src="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>"
                                                class="img-thumbnail object-fit-cover dt-thumbnail"
                                                alt="<?= $row['campaign_name'] ?>">
                                        </a>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= $row['campaign_name'] ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= $row['campaign_description'] ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= date("d F Y", strtotime($row['campaign_start'])); ?>
                                        -
                                        <?= date("d F Y", strtotime($row['campaign_end'])); ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <strong>
                                            <?php
                                            $datetime1 = new DateTime($row['campaign_start']);
                                            $datetime2 = new DateTime($row['campaign_end']);
                                            $difference = $datetime1->diff($datetime2);
                                            echo $difference->d . " Hari";
                                            ?>
                                        </strong>
                                    </td>
                                    <td class="col align-item-center">
                                        <?= "Rp." .
                                            number_format($row['campaign_target'])
                                            . ",-" ?>
                                    </td>
                                    <td class="col align-item-center pe-5">
                                        <div class="row">
                                            <div class="col col-12 col-xl-6">
                                                <a id="approve" class="btn btn-primary my-1 w-100"
                                                    href="../pages/view.php?campaign=<?= $row['campaign_id'] ?>&approve=true">
                                                    Approve
                                                </a>
                                            </div>
                                            <div class="col col-12 col-xl-6">
                                                <a class="btn btn-secondary my-1 w-100"
                                                    href="../pages/view.php?campaign=<?= $row['campaign_id'] ?>">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <!-- Donation Edit -->
            <?php if (isset($_GET['manage']) && $_GET['manage'] == 'donations') { ?>
                <div class="card">
                    <div class="card-header sticky-top bg-white">
                        <form class="row gy-2" action="" method="post">
                            <div class="col col-12 col-md-12 col-lg-8">
                                <input name="donation" class="form-control" type="text"
                                    placeholder="Cari dan tekan enter..." value="<?php if (isset($_POST['donation'])) {
                                        echo $_POST['donation'];
                                    } ?>">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <input class="btn btn-primary w-100" type="submit" value="Search">
                            </div>
                            <div class="col col-12 col-md-6 col-lg-2">
                                <a class="btn btn-secondary w-100" href="../pages/manage.php?manage=donations">Reset</a>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col" class="ps-5">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Dari</th>
                                <th scope="col">Untuk</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col" class="pe-5">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result3)):
                                $i++; ?>
                                <tr class="align-middle">
                                    <th class="align-item-center ps-5" scope="row">
                                        <?= $i ?>
                                    </th>
                                    <td class="col align-item-center">
                                        <?= date("d F Y", strtotime($row['donation_date'])); ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <a class="me-3 text-decoration-none" target="_blank"
                                            href="<?= "../assets/image/profile/" . $row['account_avatar'] ?>">
                                            <img src="<?= "../assets/image/profile/" . $row['account_avatar'] ?>"
                                                class="img-thumbnail object-fit-cover dt-thumbnail"
                                                alt="<?= $row['account_name'] ?>">
                                        </a>
                                        <?= $row['account_name']; ?>
                                    </td>
                                    <td class="col align-item-center">
                                        <a class="me-3 text-decoration-none" target="_blank"
                                            href="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>">
                                            <img src="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>"
                                                class="img-thumbnail object-fit-cover dt-thumbnail"
                                                alt="<?= $row['campaign_name'] ?>">
                                        </a>
                                        <?= $row['campaign_name']; ?>
                                    </td>
                                    <td class="col align-item-center">
                                        Rp.
                                        <?= number_format($row['donation_amount']) ?>
                                        ,-
                                    </td>
                                    <td class="col align-item-center pe-5">
                                        <a class="btn btn-primary my-1 w-100"
                                            href="../pages/view.php?donation=<?= $row['donation_id'] ?>">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php include('../components/admin/footer.php'); ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<script>
    $("#approve").click(function () {
        alert("The paragraph was clicked.");
    });
</script>
<?php include('../components/close.php'); ?>