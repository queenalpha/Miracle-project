<!-- Konfigurasi -->
<?php
$title = "Miracle - Donation History";
$prevent = 'guest';
include('../server/connection.php');
?>
<!-- Logic -->
<?php

?>
<!-- Logic -->
<?php include('../components/header.php'); ?>
<nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
</nav>

<div class="side-bar">
    <div class="side-text">
        <ul>
            <li>
                <a href="`../pages/profile.php">Profile</a>
            </li>
            <li>
                <a href="">Riwayat Donasi</a>
            </li>
            <li>
                <a href="campaign.php">Program Campaign</a>
            </li>
        </ul>

        <div class="link-bottom">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="profilePage.php?logout=1">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="intro-judul">
        <h3>Riwayat Donasi Anda</h3>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Campaign</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nominal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Nama kegiatan</td>
                <td>keterangannya</td>
                <td>11-12-2023</td>
                <td>10,0000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Nama kegiatan</td>
                <td>keterangannya</td>
                <td>11-12-2023</td>
                <td>10,0000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Nama kegiatan</td>
                <td>keterangannya</td>
                <td>11-12-2023</td>
                <td>10,0000</td>
            </tr>
        </tbody>
    </table>
</div>


<?php include('../components/js.php'); ?>
<?php include('../components/footer.php'); ?>
<?php include('../components/close.php'); ?>