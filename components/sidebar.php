<header class="web-header-content fixed-top container-fluid mt-2">
<a href="home.php" class="side-brand mt-2">
                <img src="../Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
            </a>
    <div class="web-sidebar">
        <div class="web-side-content">
            <div class="main-content">
                <ul class="list-unstyled px-2">
                    <li class="li-hov">
                        <a href="profile.php" class="text-decoration-none a-style <?php if ($pages == 'profile.php') echo 'click'; ?>">
                            <i class="fa-solid fa-user"></i><span class="ms-2">Profile</span>
                        </a>
                    </li>
                    <li class="li-hov">
                        <a href="campaign.php" class="text-decoration-none a-style <?php if ($pages == 'campaign.php') echo 'click'; ?>">
                            <i class="fa-solid fa-hand-holding-heart"></i><span class="ms-2">Campagins</span>
                        </a>
                    </li>
                    <li class="li-hov">
                        <a href="campaignDonatur.php" class="text-decoration-none a-style <?php if ($pages == 'campaignDonatur.php') echo 'click'; ?>">
                            <img src="../Assets/icon/charity.png" alt="icon-charity" width="20px"><span class="ms-2">Daftar Donatur</span>
                        </a>
                    </li>
                    <li class="li-hov">
                        <a href="history.php" class="text-decoration-none a-style <?php if ($pages == 'history.php') echo 'click'; ?>">
                            <i class="fa-solid fa-clock-rotate-left"></i><span class="ms-2">Riwayat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-content">
                <nav class="footer-nav">
                <ul class="list-unstyled px-2">
                    <li class="li-hov">
                        <a href="home.php" class="text-decoration-none a-style">
                            <i class="fa-solid fa-house"></i><span class="ms-2">Home</span>
                        
                        </a>
                    </li>    
                    <li class="li-hov">
                        <a href="../server/logout.php" class="text-decoration-none a-style">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i><span class="ms-2">Log Out</span>
                        </a>
                    </li>
                </ul>
                </nav>
                
            </div>
        </div>
    </div>
</header>