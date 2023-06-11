<!-- Konfigurasi -->
<?php
$title = "Miracle - Create Campaign";
$prevent = 'guest';
$pages = basename($_SERVER['PHP_SELF']);
include('../server/connection.php');
?>
<!-- Logic -->

<!-- Logic -->
<link rel="stylesheet" href="../Assets/css/profile.css">
<?php include('../components/header.php'); ?>
<?php include('../components/sidebar.php');?>

<div class="container">
    <div class="intro-judul">
        <div class="d-flex">
            <h3>Daftar Donatur kamu</h3>
        </div>
    </div>
    <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Campaign</th>
                    <th scope="col">Nama Donatur</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Akhir</th>
                    <th scope="col">Target</th>
                    <th scope="col">Terkumpul</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO : LIMIT 4 BARIS AJA -->
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>Nama Donatur</td>
                    <td>11-12-2023</td>
                    <td>30-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>Nama Donatur</td>
                    <td>11-12-2023</td>
                    <td>30-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Nama kegiatan</td>
                    <td>Nama Donatur</td>
                    <td>11-12-2023</td>
                    <td>30-12-2023</td>
                    <td>Rp1,000,000</td>
                    <td>Rp50,000</td>
                </tr>
            </tbody>
    </table>


    <!-- ini biarin static aja -->
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