<nav id="dt-topbar" class="d-flex justify-content-between align-items-center p-4">
    <h1 id="header-title" class="m-0">
        <?= $title ?>
    </h1>
    <div class="dropdown">
        <button id="avatar" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/image/ds1.jpg" class="object-fit-cover rounded-circle" alt="Avatar" width="42px"
                height="42px" />
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item text-danger" href="../server/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>