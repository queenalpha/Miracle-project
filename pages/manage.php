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
        <!-- Accounts Edit -->
        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'accounts') { ?>
            <article class="w-100">
                <div class="row g-0 p-4">
                    <div class="col col-12 g-4">
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
                    </div>
                </div>
                <?php include('../components/admin/footer.php'); ?>
            </article>
        <?php } ?>
        <!-- Campaigns Edit -->
        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'campaigns') { ?>
            <article class="w-100">
                <div class="row g-0 p-4">
                    <div class="col col-12 g-4">
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
                        </div>
                    </div>
                </div>
                <?php include('../components/admin/footer.php'); ?>
            </article>
        <?php } ?>
        <!-- Donations Edit -->
        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'donations') { ?>
            <article class="w-100">
                <div class="row g-0 p-4">
                    <div class="col col-12 g-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col col-12 col-md-6">
                                        <h5 class="card-title m-0 fw-bold">Donations Management</h5>
                                    </div>
                                    <div class="col col-12 col-md-6">
                                        <input class="form-control" type="text" placeholder="Cari..."
                                            aria-label="search user">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('../components/admin/footer.php'); ?>
            </article>
        <?php } ?>
    </div>
</main>
<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>