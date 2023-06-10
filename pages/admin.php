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
            </div>
            <?php include('../components/admin/footer.php'); ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>