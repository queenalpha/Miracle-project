<div class="sticky-top">
    <div id="dt-sidebar">
        <div class="d-flex flex-column flex-shrink-0 h-100 p-2">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li class="nav-item">
                    <a href="../pages/admin.php" class="nav-link py-3
                <?php if (!isset($_GET['manage'])) {
                    echo "active";
                } ?> ">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li>
                    <a href="../pages/manage.php?manage=accounts" class="nav-link py-3
                        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'accounts') {
                            echo "active";
                        } ?> ">
                        <i class="fa-solid fa-users"></i>
                    </a>
                </li>
                <li>
                    <a href="../pages/manage.php?manage=campaigns" class="nav-link py-3
                        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'campaigns') {
                            echo "active";
                        } ?> ">
                        <i class="fa-solid fa-hands-holding-child"></i>
                    </a>
                </li>
                <li>
                    <a href="../pages/manage.php?manage=donations" class="nav-link py-3
                        <?php if (isset($_GET['manage']) && $_GET['manage'] == 'donations') {
                            echo "active";
                        } ?> ">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>