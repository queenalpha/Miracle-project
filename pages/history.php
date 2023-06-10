<!-- Konfigurasi -->
<?php
$title = "Miracle - Donation History";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->
<?php

?>
<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php');?>


<div class="container">
    <div class="intro-judul">
        <h3>Riwayat Donasi Anda</h3>
    </div>
    <table class="table table-history table-hover">
        <thead>
            <!-- TODO: LIMIT 4 BARIS AJA -->
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