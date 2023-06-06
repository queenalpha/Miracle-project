<nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
    <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
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
                <a class="nav-link" href="donasiPage.php">Donasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="campaign.php">Campaign</a>
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
                <img src="Assets/image/Login form img.jpg" class="object-fit-cover rounded-4" width="30px" height="30px"
                    alt="">
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="profilePage.php">Profile</a>
                    <a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a>
                    <a class="dropdown-item" href="campaign.php">Buat Campaign</a>
                    <a class="dropdown-item" href="index.php?logout=1"
                        onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                </li>
            </ul>
        </li>
        <li class="nav-but">
            <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
        </li>
    </ul>
</nav>