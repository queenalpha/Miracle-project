<!-- Model -->
<?php
$title = "Miracle - Admin Dashboard";
$prevent = 'user';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
$query1 = "SELECT * FROM campaigns WHERE campaign_approval IS NULL ORDER BY campaign_id desc";
$result1 = mysqli_query($conn, $query1);
$query2 = "SELECT * FROM accounts ORDER BY account_id desc";
$result2 = mysqli_query($conn, $query2);
$query3 = "SELECT * FROM donations ORDER BY donation_id desc";
$result3 = mysqli_query($conn, $query3);
?>
<!-- View -->
<?php include('../components/header.php'); ?>
<main id="dt-container">
    <?php include('../components/admin/topbar.php'); ?>
    <div class="d-flex">
        <aside class="flex-shrink-1">
            <?php include('../components/admin/sidebar.php'); ?>
        </aside>
        <article id="dt-content" class="w-100">

            <?php include('../components/admin/footer.php'); ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<?php include('../components/close.php'); ?>