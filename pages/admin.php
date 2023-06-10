<?php
//TODO: ADMIN, SETTINGS, MANAGE (ASIGNEE: DETE)
?>
<!-- Model -->
<?php
$title = "Miracle - Admin Dashboard";
$prevent = 'guest';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
$query = "SELECT * FROM campaigns ORDER BY campaign_id desc";
$result = mysqli_query($conn, $query);
?>
<!-- View -->
<?php include('../components/header.php'); ?>
<main id="dt-container">
    <?php include('../components/admin/topbar.php'); ?>
    <div class="d-flex">
        <aside class="flex-shrink-1">
            <?php include('../components/admin/sidebar.php'); ?>
        </aside>
        <article class="w-100">
            <div class="row g-0 p-4">
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card card-hover p-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-users dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">User Terdaftar</h5>
                                    <p class="card-text">
                                        Rp. 10.000,-
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-user-secret dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Anonim Berdonasi</h5>
                                    <p class="card-text">
                                        Rp. 10.000,-
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-hands-holding-child dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Total Kampanye</h5>
                                    <p class="card-text">
                                        Rp. 10.000,-
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 g-4">
                    <div class="card card-hover py-4">
                        <div class="row g-0">
                            <div class="col col-md-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-money-bill-wave dt-icon"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Total Donasi</h5>
                                    <p class="card-text">
                                        Rp. 10.000,-
                                    </p>
                                </div>
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
                                    <a class="btn btn-primary" href="#">Manage</a>
                                </div>
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
                                    <a class="btn btn-primary" href="#">Manage</a>
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
                                    <h5 class="card-title m-0 fw-bold">Donasi Terkini</h5>
                                </div>
                                <div class="col col-12 col-md-6 d-flex justify-content-end">
                                    <a class="btn btn-primary" href="#">Manage</a>
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