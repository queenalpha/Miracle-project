<?php
if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
    ?>
    <!-- Navbar Admin -->
    <header>
        <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
            <img src="../assets/icon/typograph.png" class="ms-5" width="100px" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center me-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managecampaign.php">Campaign</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayatDonasi.php">Riwayat Donasi</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav me-5">
                <li class="nav-but dropdown">
                    <a class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        href="#">
                        <img src="Assets/image/Login form img.jpg" class="object-fit-cover rounded-4" width="30px"
                            height="30px" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="profilePage.php">Profile</a>
                            <a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a>
                            <a class="dropdown-item" href="campaign.php">Buat Campaign</a>
                            <a class="dropdown-item" href="../server/logout.php"
                                onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-but">
                    <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
                </li>
            </ul>
        </nav>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="../assets/image/ds1.jpg" class="d-block w-100 c-img" alt="...">
                </div>
                <div class="carousel-item c-item">
                    <img src="../assets/image/pr1.jpg" class="d-block w-100 c-img" alt="...">
                </div>
            </div>
            <div class="intro carousel-caption d-md-inline text-start">
                <h5>Do Something Special <br> To Help Others</h5>
                <p>Make a miracle with your charity</p>
                <a href="donation.php">
                    <button class="btn-donate-intro btn-second">Donation</button>
                </a>
            </div>
        </div>
    </header>
    <?php
} else if (isset($_SESSION['level']) && $_SESSION['level'] == 'fundraiser') {
    ?>
        <!-- Navbar Fundraiser  -->
        <header>
            <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
                <img src="../assets/icon/typograph.png" class="ms-5" width="100px" alt="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center me-5" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Donasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="managecampaign.php">Campaign</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwayatDonasi.php">Riwayat Donasi</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-5">
                    <li class="nav-but dropdown">
                        <a class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            href="#">
                            <img src="Assets/image/Login form img.jpg" class="object-fit-cover rounded-4" width="30px"
                                height="30px" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="profilePage.php">Profile</a>
                                <a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a>
                                <a class="dropdown-item" href="campaign.php">Buat Campaign</a>
                                <a class="dropdown-item" href="../server/logout.php"
                                    onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-but">
                        <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
                    </li>
                </ul>
            </nav>

            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active c-item">
                        <img src="../assets/image/ds1.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                    <div class="carousel-item c-item">
                        <img src="../assets/image/pr1.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                </div>
                <div class="intro carousel-caption d-md-inline text-start">
                    <h5>Do Something Special <br> To Help Others</h5>
                    <p>Make a miracle with your charity</p>
                    <a href="donation.php">
                        <button class="btn-donate-intro btn-second">Donation</button>
                    </a>
                </div>
            </div>
        </header>
    <?php
} else {
    ?>
        <!-- Navbar Belum Login  -->
        <header>
            <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
                <img src="../assets/icon/typograph.png" class="ms-5" width="100px" alt="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center me-5" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#donasi">Donation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                    </ul>
                </div>
                <a href="login.php">
                    <button type="button" class="btn btn-yellow  rounded-1 me-5">Masuk</button>
                </a>

            </nav>
            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active c-item">
                        <img src="../assets/image/ds1.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                    <div class="carousel-item c-item">
                        <img src="../assets/image/pr1.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                </div>
                <div class="intro carousel-caption d-md-inline text-start">
                    <h5>Do Somehting Special <br> To Help Others</h5>
                    <p>Make a miracle with your charity</p>
                    <a href="donasiPage.php">
                        <button class="btn-donate-intro btn-second">Donation</button>
                    </a>
                </div>
            </div>
        </header>
    <?php
}
?>