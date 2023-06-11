<!-- Konfigurasi -->
<?php
$title = "Miracle - Donation History";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php
$target = $_SESSION['id'];
$query3 = "SELECT donations.donation_id, donations.donation_date, accounts.account_name, accounts.account_avatar, campaigns.campaign_name, campaigns.campaign_thumbnail, donations.donation_amount
    FROM donations
    JOIN accounts ON accounts.account_id=donations.donation_account
    JOIN campaigns ON campaigns.campaign_id=donations.donation_campaign
    WHERE donations.donation_account = '$target '
    ORDER BY donations.donation_date desc";
$result3 = mysqli_query($conn, $query3);
?>
<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php'); ?>


<div class="container">
    <div class="intro-judul">
        <h3>Riwayat Donasi Anda</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="align-middle">
                <th scope="col" class="ps-5">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Dari</th>
                <th scope="col">Untuk</th>
                <th scope="col" class="pe-5">Jumlah</th>
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
                                class="img-thumbnail object-fit-cover dt-thumbnail" alt="<?= $row['account_name'] ?>"
                                style="width:42px;height:42px;">
                        </a>
                        <?= $row['account_name']; ?>
                    </td>
                    <td class="col align-item-center">
                        <a class="me-3 text-decoration-none" target="_blank"
                            href="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>">
                            <img src="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>"
                                class="img-thumbnail object-fit-cover dt-thumbnail" alt="<?= $row['campaign_name'] ?>"
                                style="width:42px;height:42px;">
                        </a>
                        <?= $row['campaign_name']; ?>
                    </td>
                    <td class="col align-item-center">
                        Rp.
                        <?= number_format($row['donation_amount']) ?>
                        ,-
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
</div>


<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>