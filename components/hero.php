<!-- NavBar section -->
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