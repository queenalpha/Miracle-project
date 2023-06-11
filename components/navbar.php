 <nav class="fixed-top navbar navnav navbar-expand-lg  px-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../assets/icon/typograph.png" alt="Brand Image" height="30" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donate.php">Donation</a>
                    </li>
                <?php
                if (!isset($_SESSION['logged_in'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Campaign</a>
                    </li>
                <?php
                } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="campaign.php">Campaign</a>
                    </li>
                <?php }?>

                <?php
                if (!isset($_SESSION['logged_in'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutUs">About us</a>
                    </li>
                <?php
                } else {?>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Riwayat Donasi</a>
                    </li>
                <?php }?>
                </ul>
                </div>
                <?php
                if (!isset($_SESSION['logged_in'])) {
                ?>
                <a href="../pages/login.php"  id="navbarNavDropdown">
                    <button type="button" class="btn btn-yellow  rounded-1 me-5">Masuk</button>
                </a>
                <?php
                } else {
                ?>
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/icon/avatar.jpg" class="object-fit-cover rounded-circle" alt="Avatar"
                            width="32px" height="32px" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="history.php">Riwayat Donasi</a></li>
                        <li><a class="dropdown-item" href="campaign.php">Buat Campaign</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item text-danger" href="../server/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            } ?>
        </div>
</nav>