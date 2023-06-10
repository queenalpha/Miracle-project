<!-- Model -->
<?php
$title = "Miracle - Admin Dashboard";
$prevent = 'user';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
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
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card dt-card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-hands-holding-child dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Total Kampanye</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = "SELECT count(campaign_id) FROM `campaigns`";
                                        $result = mysqli_query($conn, $query);
                                        $total = mysqli_fetch_array($result);
                                        echo number_format($total[0]) . " Kampanye";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card dt-card-hover p-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-users dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Member Berdonasi</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = "SELECT sum(donation_amount) FROM `donations` WHERE `donation_account` != 2";
                                        $result = mysqli_query($conn, $query);
                                        $total = mysqli_fetch_array($result);
                                        echo
                                            "Rp." .
                                            number_format($total[0])
                                            . ",-";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card dt-card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-user-secret dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Anonim Berdonasi</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = "SELECT sum(donation_amount) FROM `donations` WHERE `donation_account` = 2";
                                        $result = mysqli_query($conn, $query);
                                        $total = mysqli_fetch_array($result);
                                        echo
                                            "Rp." .
                                            number_format($total[0])
                                            . ",-";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card dt-card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-money-bill-wave dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Total Donasi</h5>
                                    <p class="card-text">
                                        <?php
                                        $query = "SELECT SUM(donation_amount) FROM `donations`";
                                        $result = mysqli_query($conn, $query);
                                        $total = mysqli_fetch_array($result);
                                        echo
                                            "Rp." .
                                            number_format($total[0])
                                            . ",-";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 g-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col col-12 col-md-6">
                                    <h5 class="card-title m-0 fw-bold">Approval Kampanye</h5>
                                </div>
                                <div class="col col-12 col-md-6 d-flex justify-content-end">
                                    <a class="btn btn-primary" href="../pages/manage.php?manage=campaigns">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dt-card-limit">
                            <div class="col col-12">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr class="align-middle">
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
                                                <td class="dt-thumbnail">
                                                    <a target="_blank"
                                                        href="<?= "../assets/image/" . $row['campaign_thumbnail'] ?>">
                                                        <img src="<?= "../assets/image/" . $row['campaign_thumbnail'] ?>"
                                                            class="img-thumbnail object-fit-cover"
                                                            alt="<?= $row['campaign_thumbnail'] ?>">
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
                    </div>
                </div>
                <div class="col col-12  col-lg-6 g-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col col-12 col-md-6">
                                    <h5 class="card-title m-0 fw-bold">Pengguna</h5>
                                </div>
                                <div class="col col-12 col-md-6 d-flex justify-content-end">
                                    <a class="btn btn-primary" href="../pages/manage.php?manage=accounts">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dt-card-limit">
                            <div class="col col-12">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr class="align-middle">
                                            <th scope="col">#</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result2)):
                                            $i++; ?>
                                            <tr class="align-middle">
                                                <th scope="row">
                                                    <?= $i ?>
                                                </th>
                                                <td>
                                                    <a class="ratio ratio-1x1" target="_blank"
                                                        href="<?= "../assets/image/" . $row['account_avatar'] ?>">
                                                        <img src="<?= "../assets/image/" . $row['account_avatar'] ?>"
                                                            class="img-thumbnail object-fit-cover "
                                                            alt="<?= $row['account_avatar'] ?>" width="42px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $row['account_name'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['account_email'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['account_phone'] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-secondary w-100" href="#">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-lg-6 g-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col col-12 col-md-6">
                                    <h5 class="card-title m-0 fw-bold">Donasi Terkini</h5>
                                </div>
                                <div class="col col-12 col-md-6 d-flex justify-content-end">
                                    <a class="btn btn-primary" href="../pages/manage.php?manage=donations">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dt-card-limit">
                            <div class="col col-12">
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
                    </div>
                </div>
            </div>
            <?php include('../components/admin/footer.php'); ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>